<?php
session_start();

	$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
	
	$sql = "select price from menus where id =".$_POST['id_menu'];
	$result = $bdd->query($sql);
	$prix = $result->fetchAll(PDO::FETCH_ASSOC);

	$sql = "select id_category from category_menu where id_menu =".$_POST['id_menu'];

	$result = $bdd->query($sql);
	$categorie = $result->fetchAll(PDO::FETCH_ASSOC);

	$res = [];
	$i = 0; 
	$j = 0;
	$div_aff = "";

	if ($categorie) {
		forEach($categorie as $value) {
			$i++;
			
			$sql 	 = "select libelle from category_art where id =".$value['id_category'];
			$result  = $bdd->query($sql);
			$libelle = $result->fetchAll(PDO::FETCH_ASSOC);
			$lib = $libelle[0]['libelle'];

			if($i==1){
				$div_aff .='<br><h4>'.$lib.'</h4><div class="row row-cols-1 row-cols-md-3 g-4 hidden_scrollbar" style="scrollbar-width: none;-ms-overflow-style: none;overflow-x: hidden; overflow-y: auto; height:200px; width: 470px;margin-left:0px;margin-top:37px;">';
			}
			else{
				$div_aff .='</div>
				<br><h4>'.$lib.'</h4><div class="row row-cols-1 row-cols-md-3 g-4 hidden_scrollbar" style="scrollbar-width: none;-ms-overflow-style: none;overflow-x: hidden; overflow-y: auto; height:200px; width: 470px;margin-left:0px;margin-top:37px;">';
			}

			$sql = "select id,title,picture,price from articles where category =".$value['id_category']." and id_site =".$_SESSION['site']['id_site'];
			$result = $bdd->query($sql);
			$art = $result->fetchAll(PDO::FETCH_ASSOC);

			if($art){
				forEach($art as $valart){
					$j++;
					if($j==1){
						$id_art1 = $valart['id'];
						$div_aff .= '<div class="col-1">
							<div class="card cardmenu cardtype'.$i.'" id="'.$valart['id'].'" type="'.$i.'" onclick="selectoptionmenu('.$i.','.$valart['id'].')" style="width:115px;height:150px;border-radius: 5px;border: 2px solid red;">
								<div class="card-body text-center">
									<img src="'.$valart['picture'].'" style="width:94px;height:94px;margin-left:-4px;">
									<h6 style="text-overflow: ellipsis;text-align: center;">'.$valart['title'].'</h6>
								</div>
							</div>
						</div>';
					}
					else{
						$div_aff .= '<div class="col-1">
							<div class="card cardmenu cardtype'.$i.'" id="'.$valart['id'].'" type="'.$i.'" onclick="selectoptionmenu('.$i.','.$valart['id'].')" style="width:115px;height:150px;border-radius: 5px;border: hidden;">
								<div class="card-body text-center">
									<img src="'.$valart['picture'].'" style="width:94px;height:94px;margin-left:-4px;">
									<h6 style="text-overflow: ellipsis;text-align: center;">'.$valart['title'].'</h6>
								</div>
							</div>
						</div>';
					}
				}
				$j=0;
			}
			if($value['id_category'] == 1){
				

					$sql = "select libelle,prix,id_declinaisons from declinaisons where id_article =".$id_art1." and type = 1";
					$result = $bdd->query($sql);
					$decli = $result->fetchAll(PDO::FETCH_ASSOC);

					if($decli){

						$div_aff .= '</div><div id="div_compo">
							<div id="div_composants">
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

					$sql = "select libelle,prix,id_declinaisons from declinaisons where id_article =".$id_art1." and type = 2";
					$result = $bdd->query($sql);
					$supplement = $result->fetchAll(PDO::FETCH_ASSOC);

					if($supplement){

						$div_aff .= '<div id="div_supplements">
						<h4>Suppléments</h4>';

						foreach($supplement as $value){

							$div_aff .= '
							<div class="form-check form-switch" style="text-align:center">
								<input onclick="mod_compo_menu()" class="form-check-input supplements" id_declinaisons="'.$value['id_declinaisons'].'" prix_art="'.$prix[0]['price'].'" value="'.$value['prix'].'" type="checkbox">
								<label class="form-check-label">'.$value['libelle'].' (+'.$value['prix'].' €)</label>
							</div>';

						}
						
						$div_aff .= '</div>
						<br>
						</div>';
					
					}
			}
		}
		
	} 
	$div_aff .= '</div><div id="tarif"><h4 id="prix">Prix : '.$prix[0]['price'].' €</h4>
				<h4 id_menu="'.$_POST['id_menu'].'" id="prix_menu"></h4></div>';
	$res = $div_aff;
	echo json_encode($res);
?>
