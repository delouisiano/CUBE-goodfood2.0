<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql="SELECT price FROM `articles` where id =".$_POST['id'];
  $result = $bdd->query($sql);
  $res = $result->fetch(PDO::FETCH_ASSOC);
  $prix_art = $res['price'];

  $sql = "INSERT INTO `lignes_paniers` (`id`,id_article,`prix`,quantite,`id_panier`) VALUES (NULL,'".$_POST['id']."',".$prix_art.",1, ".$_SESSION['panier']['id'].");";
  $result = $bdd->query($sql);

?>