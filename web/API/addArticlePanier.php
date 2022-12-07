<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "SELECT `id` FROM `paniers` where id_site = 1 and id_user = ".$_SESSION['Compte']['id'].";";

  $result = $bdd->query($sql);
  $panier = $result->fetchAll(PDO::FETCH_ASSOC);

  if ($panier) {
    $id_panier = $panier['0']['id'];
    $sql = "INSERT INTO `lignes_paniers` (`id`,id_article,quantite,`id_panier`) VALUES (NULL,'".$_POST['id']."',1, ".$id_panier.");";
    $result = $bdd->query($sql);
  } 

?>