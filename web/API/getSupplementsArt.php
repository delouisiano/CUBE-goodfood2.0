<?php
session_start();

	$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
	
	$sql = "SELECT id_declinaisons,libelle,type,prix FROM `declinaisons` where id_article = ". $_POST['id'] ." and type = 2";

	$result = $bdd->query($sql);
	$decliaison = $result->fetchAll(PDO::FETCH_ASSOC);
	
    if ($decliaison) {
		echo json_encode($decliaison);
    }
	else{
		echo json_encode("");
	}

?>
