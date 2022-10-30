<?php
//$bdd =new PDO('mysql:host=localhost; dbname=u212966396_db_test; charset=utf8', 'u212966396_root', 'Urkqsrk1');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("sql511.main-hosting.eu", "u212966396_root", "Urkqsrk1", "u212966396_db_test");

$mysqli->query("INSERT INTO `user` (`id`, `pseudo`, `mail`, `mdp`, `langue`, `type`) VALUES (NULL, 'pseudotest', 'mail@mail.comtest', 'mdpmdp', '2', '2')");

?>