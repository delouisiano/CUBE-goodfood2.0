<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
  
  $id = $_POST['id_site'];
  
  $sql = "SELECT id_site,nom,pays,adresse,numero_telephone,code_postal,image,description from sites where id_site=".$id.";";
  $result1 = $bdd->query($sql);
  $site = $result1->fetchAll(PDO::FETCH_ASSOC);

  if ($site) {
    $_SESSION['site']=$site[0];
    selectpanier($bdd);
  } 

  function selectpanier($bdd){
    $sql = "SELECT id from paniers where id_user=".$_SESSION['Compte']['id']." and id_site=".$_SESSION['site']['id_site'].";";
    $result2 = $bdd->query($sql);
    $panier = $result2->fetchAll(PDO::FETCH_ASSOC);
    if ($panier) {
      $_SESSION['panier']=$panier[0];
    }
    else{
      $sql = "insert into paniers (id_user,id_site) value (".$_SESSION['Compte']['id'].",".$_SESSION['site']['id_site'].");";
      $result3 = $bdd->query($sql);
      selectpanier($bdd);
    }
  }

?>