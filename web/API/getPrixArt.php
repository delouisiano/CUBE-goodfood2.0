<?php
session_start();

	$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
	
	$sql = "SELECT price FROM `articles` where id = ". $_POST['id'];

	$result = $bdd->query($sql);
	$prix = $result->fetchAll(PDO::FETCH_ASSOC);
	
    if ($prix) {
		echo json_encode($prix);
    }
	else{
		echo json_encode("");
	}

?>
