<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "INSERT INTO `paniers` (`id`, `id_site`, `id_user`, `id_article`, `quantite`) VALUES (NULL, '1', '".$_SESSION['Compte']['id']."', '".$_POST['id']."', '1');";

  $result = $bdd->query($sql);

?>