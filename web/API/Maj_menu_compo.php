<?php
session_start();

	$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
	
	$sql = "select libelle,prix,id_declinaisons from declinaisons where id_article =".$_POST['id_art']." and type = 1";
	$result = $bdd->query($sql);
	$decli = $result->fetchAll(PDO::FETCH_ASSOC);

	$div_aff="";

	$id_menu = $_POST['id_menu'];
	$sql = "SELECT price FROM `menus` where id=".$id_menu.";";
	$result = $bdd->query($sql);
	$res_prix_menu = $result->fetchAll(PDO::FETCH_ASSOC);
	$prix_menu = $res_prix_menu[0]['price'];

	if($decli){

		$div_aff .= 
			'<div id="div_composants">
				<h4>Composants</h4>';

				foreach($decli as $value){
							
					$div_aff .='
						<div class="form-check form-switch" style="text-align:center"><input class="form-check-input composition" id_declinaisons="'.$value['id_declinaisons'].'" type="checkbox" checked="">
							<label class="form-check-label">'.$value['libelle'].'</label>
						</div>';

				}

				$div_aff.='	
			</div>
			<br>';

	}

	$sql = "select libelle,prix,id_declinaisons from declinaisons where id_article =".$_POST['id_art']." and type = 2";
	$result = $bdd->query($sql);
	$supplement = $result->fetchAll(PDO::FETCH_ASSOC);

	if($supplement){

		$div_aff .= '<div id="div_supplements">
			<h4>Suppléments</h4>';

		foreach($supplement as $value){

			$div_aff .= '
				<div class="form-check form-switch" style="text-align:center">
					<input onclick="mod_compo_menu()" class="form-check-input supplements" id_declinaisons="'.$value['id_declinaisons'].'" prix_art="'.$prix_menu.'" value="'.$value['prix'].'" type="checkbox">
					<label class="form-check-label">'.$value['libelle'].' (+'.$value['prix'].' €)</label>
				</div>';

		}
						
		$div_aff .= '</div>
					<br>
					</div>';
					
	}

	$res = $div_aff;
	echo json_encode($res);
?>
