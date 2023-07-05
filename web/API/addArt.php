<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  var_dump($_POST);

  $rep = "../assets/img_";
  $nom_image = com_create_guid ().".png";
  $chemin_image = $rep.$nom_image;

  $nom_tt = "assets/"."img_".$nom_image;

  $img = $_POST['img_B64'];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  file_put_contents($chemin_image, $data);

  $sql = "INSERT INTO `articles` (`id`, `id_site`, `title`, `price`, `content`, `picture`, `category`, `vegetarien`, `vegan`) VALUES (NULL,".$_POST['id_site'].", '".$_POST['titre']."', '".$_POST['prix']."','".$_POST['content']."', '".$nom_tt."', '".$_POST['id_cat']."', '".$_POST['Végétarien']."', '".$_POST['vegan']."');";
  $result = $bdd->query($sql);

?>