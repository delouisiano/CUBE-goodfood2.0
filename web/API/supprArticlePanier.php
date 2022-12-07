<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "DELETE FROM lignes_paniers where id ='".$_POST['id']."';";
  echo($sql);
  echo "location.href='http:/panier.php';";
  $result = $bdd->query($sql);

?>