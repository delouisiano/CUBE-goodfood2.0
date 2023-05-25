<?php
session_start();

	 $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

$sql = "SELECT * FROM `users`" . "'";

	$result = $bdd->query($sql);
	$compte = $result->fetch(PDO::FETCH_ASSOC);
    if ($compte) {
     	$_SESSION['Compte'] = $compte;
		echo(JSON_encode($compte));
    }

?>
