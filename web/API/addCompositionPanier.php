<?php
  session_start();

  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "INSERT INTO `compositions`(`id_produit`) VALUES (".$_POST['id_art'].") ";
  $result = $bdd->query($sql);

  $id_compo = $bdd->lastInsertId();

  $table_compo = explode(",",$_POST['table_compo']);
  $table_supp  = explode(",",$_POST['table_supp']);

  foreach ($table_compo as $value){
    $sql = "INSERT INTO `lignes_compositions`(`id_composition`, `id_declinaison`) VALUES (".$id_compo.",".$value.") ";
    $result = $bdd->query($sql);
    
  }

  foreach ($table_supp as $value){
    $sql = "INSERT INTO `lignes_compositions`(`id_composition`, `id_declinaison`) VALUES (".$id_compo.",".$value.") ";
    $result = $bdd->query($sql);
  }

  $prix = 0;
  $prix_tt_supp = 0;

  var_dump($table_supp);
  echo(empty($table_supp));

  if($table_supp[0] != ""){

    $sql="SELECT sum(prix) FROM `declinaisons` where id_declinaisons IN(".$_POST['table_supp'].");";
    $result = $bdd->query($sql);
    $tt_supp = $result->fetch(PDO::FETCH_ASSOC);
    $prix_tt_supp = $tt_supp['sum(prix)'];

  }

  $sql="SELECT price FROM `articles` where id =".$_POST['id_art'];
  $result = $bdd->query($sql);
  $res = $result->fetch(PDO::FETCH_ASSOC);
  var_dump($res);
  $prix_art = $res['price'];

  $prix = $prix_tt_supp + $prix_art;
  echo("prix compo : ".$prix);

  $sql = "INSERT INTO `lignes_paniers`(`id_panier`,`id_article`, `id_composition`,`prix`, `quantite`, `type`) VALUES (".$_SESSION['panier']['id'].",".$_POST['id_art'].",".$id_compo.",".$prix.",1,1)";
  $result = $bdd->query($sql);

?>