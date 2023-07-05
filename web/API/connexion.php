<?php
session_start();

$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

$sql = "SELECT id,pseudo,mail,langue,type,droit FROM `users` where mail = '" . $_POST['mail'] . "' and mdp ='" . $_POST['mdp'] . "'";

	$result = $bdd->query($sql);
	$compte = $result->fetch(PDO::FETCH_ASSOC);
    if ($compte) {
		
		if($compte['droit']==1){

			$_SESSION['Compte'] = $compte;
			echo(json_encode("2"));

		}
		else{

			$_SESSION['Compte'] = $compte;
			echo(json_encode("1"));

		}
     	

    }
	else
	{
		echo(json_encode("0"));
	}

?>
