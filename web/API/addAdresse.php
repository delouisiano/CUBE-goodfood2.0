<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "INSERT INTO `adresses` (`id_adresse`, `ville`, `cp`, `rue`, `id_user`, `nom`) VALUES (NULL, '".$_POST['ville']."', '".$_POST['cp']."', '".$_POST['adresse']."', '".$_SESSION['Compte']['id']."', '".$_POST['nom']."');";
  $result = $bdd->query($sql);

?>