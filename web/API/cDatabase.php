<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo __FILE__;
if (!isset($_SESSION['panier']['id'])) { require_once('../API/getSite.php?id_site=1'); }

//var_dump($_GET);
/*
if (isset($_POST['funcname'])) {
    $funcname = $_POST['funcname'];
    unset($_POST['funcname']);
    try {
        http_response_code(200);
        exit(json_encode($funcname($_POST)));
    } catch (\exception $e) {
        http_response_code(403);
        $arr = explode('#', $e->getMessage());
        if (@$arr[1])
            exit(json_encode(array('code' => $arr[1], 'msg' => $arr[2])));
        else
            exit(json_encode(array('code'=>'99999', 'msg'=>$e->getMessage())));
    }
}
*/
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
        }
        return $bdd;
    }

    static function getBoisson() {
         $bdd = self::connectDb();
            $sql = "SELECT * FROM `articles` where category = 0 and id_site=".$_SESSION['site']['id_site'].";";

            $result = $bdd->query($sql);
            $articles = $result->fetchAll(PDO::FETCH_ASSOC);

            if ($articles) {
                forEach($articles as $value) {
                    boisson($value['title'], $value['picture'],$value['price'],$value['id']);
                }

            }
    }

    static function getSandwich() {
        $bdd = self::connectDb();
            $sql = " SELECT * FROM `articles` where category = 1 and id_site=".$_SESSION['site']['id_site']."; ";

            $result = $bdd->query($sql);
            $sandwich = $result->fetchAll(PDO::FETCH_ASSOC);

            if ($sandwich) {
                forEach($sandwich as $value) {
                    sandwich($value['id'],$value['title'], $value['picture'],$value['price'],"",$value['vegetarien'],$value['vegan']);
                }
            }
    }

    static function getmenu() {
        $bdd = self::connectDb();
        if (!isset($_SESSION['site']['id_site'])) $sql = " SELECT * FROM `articles` where category = 2 and id_site='1';";
        else $sql = " SELECT * FROM `articles` where category = 2 and id_site=".$_SESSION['site']['id_site'].";";
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
        $sql = " SELECT a.id,a.price,a.picture,a.title,p.id,p.quantite FROM lignes_paniers p,articles a where a.id = p.id_article and p.id_panier = ".$_SESSION['panier']['id']."; ";

        $result = $bdd->query($sql);
        $panier = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($panier) {
            forEach($panier as $value) {
                Article($value['id'],$value['title'],$value['picture'],$value['price'],$value['quantite']);
            }
        }
    }

    static function getlignescommandes($id_commande) {
        $bdd = self::connectDb();
        $sql = "SELECT * FROM lignes_commandes c , articles a where c.id_commande = " . $id_commande . " and a.id =c.id_article";

        $result = $bdd->query($sql);
        $lignescommandes = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($lignescommandes) {
            forEach($lignescommandes as $value) {
                getlignescommandes($value['title'],$value['picture'],$value['price']*$value['quantite'],$value['quantite']);
            }
        }
    }

    static function getSousTotal() {
        $bdd = self::connectDb();
        $sql = " SELECT sum(a.price*p.quantite) as price FROM lignes_paniers p,articles a where a.id = p.id_article and p.id_panier = ".$_SESSION['panier']['id']."; ";

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
        $sql = " SELECT sum(a.price*p.quantite) as price FROM lignes_paniers p,articles a where a.id = p.id_article and p.id_panier = ".$_SESSION['panier']['id']."; ";

        $result = $bdd->query($sql);
        $tt = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($tt) {
            forEach($tt as $value) {
                getTotal($value['price']+4.99);
            }
        } 
    }

    static function getSousTotalCommande($id_commande) {
        $bdd = self::connectDb();
        $sql = "SELECT sum(a.price*p.quantite) as price FROM lignes_commandes p,articles a where a.id = p.id_article and p.id_commande = " . $id_commande . "";
        $result = $bdd->query($sql);
        $tt = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($tt) {
            forEach($tt as $value) {
                getSousTotal($value['price']);
            }
        } 
    }

    static function getTotalCommande($id_commande) {
        $bdd = self::connectDb();
        $sql = " SELECT sum(a.price*p.quantite) as price FROM lignes_commandes  p,articles a where a.id = p.id_article and p.id_commande = " . $id_commande . " ";

        $result = $bdd->query($sql);
        $tt = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($tt) {
            forEach($tt as $value) {
                getTotal($value['price']+4.99);
            }
        } 
    }  

    static function getCommande() {
        $bdd = self::connectDb();
        $sql = " SELECT * FROM `commandes` where id_user = " . $_SESSION['Compte']['id'] . " ";

        $result = $bdd->query($sql);
        $commandes = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($commandes) {
            forEach($commandes as $value) {
                ?>
                <div class="container mb-4">
                    <div class="row">
                        <div class="col-14">
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"> </th>
                                            <th scope="col">Produit</th>
                                            <th scope="col" class="text-center">Quantité</th>
                                            <th scope="col" class="text-right">Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            cDatabase::getlignescommandes($value['id']);
                                            cDatabase::getSousTotalCommande($value['id']);
                                            getLivraison("4.99");
                                            cDatabase::getTotalCommande($value['id']);
                                        ?>
                                    </tbody>
                                </table>
                            </div>   
                        </div>
                    </div>
                </div>
                <br>
                <?php  
            }
        } 
    }    

    static function getcardpanier() {
        $bdd = self::connectDb();
        var_dump($_SESSION);
        if (!isset($_SESSION['site']['id_site'])) $_SESSION['site']['id_site'] = 1;
        $sql = "SELECT `id` FROM `paniers` where id_site = '".$_SESSION['site']['id_site']."' and id_user = '".$_SESSION['Compte']['id']."';";

        $result = $bdd->query($sql);
        $panier = $result->fetchAll(PDO::FETCH_ASSOC);
      
        if ($panier) {
          $id_panier = $panier['0']['id'];
        $sql = "SELECT (select sum(prix*quantite) from lignes_paniers where id_panier =".$_SESSION['panier']['id']." ) as tt,(select sum(quantite) from lignes_paniers where id_panier =".$_SESSION['panier']['id']." ) as quantite;";

        $result = $bdd->query($sql);
        $panier = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($panier) {
            forEach($panier as $value) {
                $qt = $value['quantite'];
                $tt = $value['tt'];

                if($qt==""){
                    $qt="0";
                }
                if($tt==""){
                    $tt="0.00";
                }
                
                getPanier($qt,$tt);
            }
        } 
        } 
    }

    static function getAdressUser() {
        $bdd = self::connectDb();
        $sql = "SELECT id_adresse,cp, ville, rue, id_user, nom FROM adresses WHERE id_user=" . $_SESSION['Compte']['id'] . ";";

        $result = $bdd->query($sql);
        $adress = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($adress) {
            forEach($adress as $value) {

                getAdresse($value['id_adresse'],$value['nom'],$value['rue'],$value['ville'],$value['cp']);

            }
        } 
    }


    static function affSite($data) {
        var_dump($data);
        $bdd = self::connectDb();
        
        $sql = "SELECT id_site,nom,pays,adresse,numero_telephone,code_postal,image,description from sites where ville = '". $data['ville'] ."'";
        echo($sql);
        $result = $bdd->query($sql);
        $sites = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($sites) {
            forEach($sites as $value) {
                sites($value['nom'],$value['image'],$value['description'],$value['id_site']);
            }
        } 

    }


    static function getSites() {

        $bdd = self::connectDb();

        $sql = "SELECT id_site,nom,pays,adresse,numero_telephone,code_postal,image,description from sites;";
                
        $result = $bdd->query($sql);
        $sites = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($sites) {
            forEach($sites as $value) {
                sites($value['nom'],$value['image'],$value['description'],$value['id_site']);
            }
        } 

    }
}