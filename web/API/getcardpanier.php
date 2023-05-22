<?php
session_start();

	$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
	
	$sql = "SELECT (select sum(prix*quantite) from lignes_paniers where id_panier =".$_SESSION['panier']['id']." ) as tt,(select sum(quantite) from lignes_paniers where id_panier =".$_SESSION['panier']['id']." ) as quantite;";

	$result = $bdd->query($sql);
	$panier = $result->fetchAll(PDO::FETCH_ASSOC);

	if ($panier) {
		forEach($panier as $value) {
			$qt = $value['quantite'];
			$tt = $value['tt'];

			if($qt==""){
				$qt="0";
			}
			if($tt==""){
				$tt="0.00";
			}
			$table_res = [$qt,$tt];

			echo json_encode($table_res);

		}
	} 
	

?>
