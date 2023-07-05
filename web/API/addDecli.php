<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "INSERT INTO `declinaisons` (`id_declinaisons`, `id_article`, `libelle`, `type`, `prix`) VALUES (NULL, '".$_POST['id_art']."', '".$_POST['titre']."', '".$_POST['type']."', '".$_POST['prix']."');";
  $result = $bdd->query($sql);

?>