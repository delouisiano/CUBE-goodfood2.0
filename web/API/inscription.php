 <?php
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $err = 0;

  $sql = "SELECT id,pseudo,mail,langue,type FROM `users` where pseudo = '" . $_POST['pseudo']."'";
  $result = $bdd->query($sql);
  $compte = $result->fetch(PDO::FETCH_ASSOC);

  if ($compte) {
    $err = 1;
  }

  $sql = "SELECT id,pseudo,mail,langue,type FROM `users` where mail = '" . $_POST['mail']."'";
  $result = $bdd->query($sql);
  $compte = $result->fetch(PDO::FETCH_ASSOC);

  if ($compte) {
    $err = 2;
  }

  if($err == 0){
    $sql = "INSERT INTO `users` (`id`, `pseudo`, `mail`, `mdp`, `type`, `langue`) VALUES (NULL, '" . $_POST['pseudo'] . "', '" . $_POST['mail'] . "', '" . $_POST['mdp'] . "', '" . $_POST['Genre'] . "', " . $_POST['langue'] . ")";
    $result = $bdd->query($sql);
  }

  echo(json_encode($err));


?>