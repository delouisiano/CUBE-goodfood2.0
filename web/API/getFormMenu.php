<?php
	session_start();

	$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");


	$div_aff = "";

	$sql = "SELECT id_site,nom FROM `sites`;";
	$result = $bdd->query($sql);
	$liste_sites = $result->fetchAll(PDO::FETCH_ASSOC);


	$div_aff='
	<form class="text-center align-self-center" style="width:500px;border:2px solid black;margin:auto;">

	<div class="mb-3">
		<label for="disabledSelect" class="form-label">Site</label>
		<select id="SelectSite" class="form-select">';


	$sql = "SELECT id_site,nom FROM `sites`;";
	$result = $bdd->query($sql);
	$liste_sites = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach($liste_sites as $value){
		$div_aff .= '<option class="option_site" value="'.$value['id_site'].'">'.$value['nom'].'</option>';
	}

	$div_aff .='</select></div>
 

        <div class="mb-3">
          <label class="form-label">Titre</label>
          <input type="txt" class="form-control" id="titre">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

		<div class="mb-3">
          <label class="form-label">contenu</label>
          <input type="txt" class="form-control" id="contenu">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Prix</label>
          <input type="txt" class="form-control" id="prix">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>
        
        <BR>

        <div class="mb-3">
            <label class="form-label">Image</label>
          <input class="form-control" type="file" id="formFile3">
          <div class="help" id="ficHelp" style="color:red;" class="form-text"></div>
        </div>';

		$sql = "SELECT id,libelle FROM `category_art`;";
		$result = $bdd->query($sql);
		$liste_category = $result->fetchAll(PDO::FETCH_ASSOC);
		$i=1;
		foreach($liste_category as $value){
			if($i==1){
				$div_aff.='<div><label>Catégorie</label></div><br>';
			}
			$div_aff .='<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input checkcat" id="vegan">
				<label class="form-check-label checkcatval" value="'.$value['id'].'" for="vegan">'.$value['libelle'].'</label>
			</div>';
			$i++;
		}

		$div_aff.='
        <button type="button" onclick="addMenu();" class="btn btn-success">Envoyer</button>
      </form>
	';

	echo(json_encode($div_aff));

?>
