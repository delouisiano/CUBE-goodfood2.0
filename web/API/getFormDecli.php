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
		<label for="disabledSelect" class="form-label">Article</label>
		<select id="Select_art" class="form-select">';

	$sql = "SELECT * FROM `articles` where `category` = 1;";
	$result = $bdd->query($sql);
	$liste_sites = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach($liste_sites as $value){
		$div_aff .= '<option class="option_art" value="'.$value['id'].'">'.$value['title'].'</option>';
	}

	$div_aff .='</select></div>
 
        <div class="mb-3">
          <label class="form-label">Titre</label>
          <input type="txt" class="form-control" id="titre">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Prix</label>
          <input type="txt" class="form-control" id="prix">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>
        
        <BR>

		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input checkcat" id="supp">
			<label class="form-check-label checkcatval" value="1" for="vegan">Supplément</label>
		</div>

		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="decli">
			<label class="form-check-label" value="1" for="vegan">Déclinaison</label>
		</div>'
		;

		$div_aff.='
        <button type="button" onclick="adddeclinaison();" class="btn btn-success">Envoyer</button>
      </form>
	';

	echo(json_encode($div_aff));

?>
