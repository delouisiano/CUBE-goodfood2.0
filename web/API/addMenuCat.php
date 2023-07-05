<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $id_menu = $_POST["id_menu"];
  $liste_cat = explode(",",$_POST["listeligne"]);

  foreach($liste_cat as $value){

    $sql = "INSERT INTO `category_menu` (`id_menu`, `id_category`) VALUES ('".$id_menu."', '".$value."');";
    $result = $bdd->query($sql);

  }

?>