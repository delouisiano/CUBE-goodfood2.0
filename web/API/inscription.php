 <?php
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "INSERT INTO `users` (`id`, `pseudo`, `mail`, `mdp`, `type`, `langue`) VALUES (NULL, '" . $_POST['pseudo'] . "', '" . $_POST['mail'] . "', '" . $_POST['mdp'] . "', '" . $_POST['Genre'] . "', " . $_POST['langue'] . ")";

  $result = $bdd->query($sql);

?>