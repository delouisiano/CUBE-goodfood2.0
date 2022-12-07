<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
  
  $id = $_SESSION['Compte']['id'];
  
  $sql = "INSERT INTO `commandes` (`id`, `id_site`, `id_adresse`, `date`,`id_user`) VALUES (NULL, '".$_SESSION['site']['id_site']."', ".$_POST['id_adress'].",NOW(),".$_SESSION['Compte']['id']."); ";
  $result = $bdd->query($sql);
  $id_cde =$bdd->lastInsertId();

  $sql = "SELECT * FROM lignes_paniers where id_panier = '".$_SESSION['panier']['id']."'";
  $result2 = $bdd->query($sql);
  $lignes = $result2->fetchAll(PDO::FETCH_ASSOC);

  if ($lignes) {

    forEach($lignes as $value) {

      $req_ins = "INSERT INTO `lignes_commandes` (`id`, `id_commande`, `id_site`, `id_article`, `quantite`, `id_user`) VALUES (NULL, '".$id_cde."', '1', '".$value['id_article']."', '1', '".$id."');";
      $result_ins = $bdd->query($req_ins);

    }

    $sql = "delete from `lignes_paniers` where id_panier = '".$_SESSION['panier']['id']."' ;";
    $result = $bdd->query($sql);

  } 
?>