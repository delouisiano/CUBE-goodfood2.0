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

  selectpanier($bdd);

  function selectpanier($bdd){
    $sql = "SELECT id from paniers where id_user=95 and id_site=1;";
    $result2 = $bdd->query($sql);
    $panier = $result2->fetchAll(PDO::FETCH_ASSOC);
    if ($panier) {
      $_SESSION['panier']=$panier[0];
    }
    else{
      $sql = "insert into paniers (id_user,id_site) value (95,1);";
      $result3 = $bdd->query($sql);
      selectpanier($bdd);
    }
  }

  $sql = "INSERT INTO `lignes_paniers`(`id_panier`, `id_composition`, `quantite`, `type`) VALUES (".$_SESSION['panier']['id'].",".$id_compo.",1,1)";
  $result = $bdd->query($sql);

?>