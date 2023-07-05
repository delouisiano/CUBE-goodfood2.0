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

  $sql = "INSERT INTO `menus` (`id`, `id_site`, `picture`, `price`, `title`, `content`) VALUES (NULL, '".$_POST['id_site']."', '".$nom_tt."', '".$_POST['prix']."', '".$_POST['titre']."', '".$_POST['content']."');";
  $result = $bdd->query($sql);

  $id_menu = $bdd->lastInsertId();
  echo(json_encode($id_menu));



?>