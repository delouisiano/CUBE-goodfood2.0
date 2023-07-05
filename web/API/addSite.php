<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $rep = "../assets/img_";
  $nom_image = com_create_guid ().".png";
  $chemin_image = $rep.$nom_image;

  $nom_tt = "assets/"."img_".$nom_image;

  $img = $_POST['img_B64'];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  file_put_contents($chemin_image, $data);

  $sql = "INSERT INTO `sites` (`id_site`, `nom`, `description`, `pays`, `adresse`, `ville`, `numero_telephone`, `code_postal`, `image`) VALUES (NULL, '".$_POST['nom']."', '".$_POST['description']."', '".$_POST['pays']."', '".$_POST['adresse']."', '".$_POST['ville']."', '".$_POST['tel']."', '".$_POST['cp']."', '".$nom_tt."');";
  $result = $bdd->query($sql);

?>