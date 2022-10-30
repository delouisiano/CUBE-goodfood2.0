 <?php
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "INSERT INTO `user` (`id`, `pseudo`, `mail`, `mdp`, `langue`, `type`) VALUES (NULL, '" . $_POST['pseudo'] . "', '" . $_POST['mail'] . "', '" . $_POST['mdp'] . "', '2', '2')";

  $result = $bdd->query($sql);

?>