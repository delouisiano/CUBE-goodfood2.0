<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
  
  $str_rech = $_POST['str_rech'];
  
  $sql = "SELECT id_site,nom,pays,adresse,numero_telephone,code_postal,image,description,ville from sites where ville LIKE '".$str_rech."%';";

  $result1 = $bdd->query($sql);
  $site = $result1->fetchAll(PDO::FETCH_ASSOC);

  if ($site) {
    echo(json_encode($site));
  } 

?>