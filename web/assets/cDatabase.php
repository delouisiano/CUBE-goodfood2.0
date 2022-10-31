<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class cDatabase {

    private static $host = "sql511.main-hosting.eu";
    private static $dbname = "u212966396_db_test";
    private static $username = "u212966396_root";
    private static $pwd = "Urkqsrk1";

    static function connectDb() {
        try {
            $bdd = new PDO('mysql:host=' . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4", self::$username , self::$pwd);
        } catch (PDOException $pe) {
            http_response_code(401);
            throw(json_encode(array('msg' => "Connexion à la base de données impossible",'code' => "0000")));
            //die("Could not connect to the database " . $dbname . " : " . $pe->getMessage());
        }
        return $bdd;
    }

    static function getBoisson() {
         $bdd = self::connectDb();
            $sql = "SELECT * FROM `articles` where category = 0 ";

            $result = $bdd->query($sql);
            $articles = $result->fetchAll(PDO::FETCH_ASSOC);

            if ($articles) {
                forEach($articles as $value) {
                    boisson($value['title'], $value['picture'],$value['price']);
                }

            }
    }

    static function getSandwich() {
        $bdd = self::connectDb();
            $sql = " SELECT * FROM `articles` where category = 1 ";

            $result = $bdd->query($sql);
            $sandwich = $result->fetchAll(PDO::FETCH_ASSOC);

            if ($sandwich) {
                forEach($sandwich as $value) {
                    sandwich($value['title'], $value['picture'],$value['price'],"",$value['vegetarien'],$value['vegan']);
                }
            }
    }

    static function getmenu() {
        $bdd = self::connectDb();
        $sql = " SELECT * FROM `articles` where category = 2 ";

        $result = $bdd->query($sql);
        $menu = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($menu) {
                forEach($menu as $value) {
                    menu($value['title'], $value['picture'],$value['price'],"");
                }
            }
    }

    static function getpanier() {
        $bdd = self::connectDb();
        $sql = " SELECT a.price,a.picture,a.title,p.id,p.quantite FROM panier p,articles a where a.id = p.id_article and p.id_user = " . $_SESSION['Compte']['id'] . " ";

        $result = $bdd->query($sql);
        $panier = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($panier) {
            forEach($panier as $value) {
                Article($value['title'],$value['picture'],$value['price'],$value['quantite']);
            }
        }
    }

    static function getSousTotal() {
        $bdd = self::connectDb();
        $sql = " SELECT sum(a.price*p.quantite) as price FROM panier p,articles a where a.id = p.id_article and p.id_user = " . $_SESSION['Compte']['id'] . " ";

        $result = $bdd->query($sql);
        $tt = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($tt) {
            forEach($tt as $value) {
                getSousTotal($value['price']);
            }
        } 
    }

    static function getTotal() {
        $bdd = self::connectDb();
        $sql = " SELECT sum(a.price*p.quantite) as price FROM panier p,articles a where a.id = p.id_article and p.id_user = " . $_SESSION['Compte']['id'] . " ";

        $result = $bdd->query($sql);
        $tt = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($tt) {
            forEach($tt as $value) {
                getTotal($value['price']+4.99);
            }
        } 
        }

    static function getcardpanier() {
        $bdd = self::connectDb();
        $sql = "select distinct 1,(SELECT sum(a.price*p.quantite) as price FROM panier p,articles a where a.id = p.id_article and p.id_user = " . $_SESSION['Compte']['id'] . ") as tt,(SELECT sum(p.quantite) as price FROM panier p,articles a where a.id = p.id_article and p.id_user = " . $_SESSION['Compte']['id'] . ") as quantite from panier where id_user = " . $_SESSION['Compte']['id'] . "";

        $result = $bdd->query($sql);
        $panier = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($panier) {
            forEach($panier as $value) {
                getPanier($value['quantite'],$value['tt']);
            }
        } 
    }
}