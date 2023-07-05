function addArticlePanier(id){
	
    if(id>0){
        var xhr = new XMLHttpRequest();
	    var res;
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/addArticlePanier.php", true);

		//Force le type de réponse en JSON
		xhr.responseType = "json";

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		//EVOIE DES DONNÉES
		xhr.send("id="+id);
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	}
	
	return false;

}

function getCompositionArt(id){

if(id>0){
	var xhr = new XMLHttpRequest();
	var res;

	console.log("blibli")

	xhr.open("POST", "API/getCompositionArt.php", true);

	xhr.responseType = "json";

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xhr.send("id="+id);
	
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			let div_aff ="";
			
			for(let i=0;i<res.length;i++){
	
				let libelle = res[i]['libelle']
				let model_div = "";
				let id_declinaisons = res[i]['id_declinaisons']

				if(i==0){
					model_div ="<h4>Composants</h4>"
				}

				model_div +='<div class="form-check form-switch" style="text-align:center">'
				model_div +='<input class="form-check-input composition" id_declinaisons="'+id_declinaisons+'" type="checkbox" checked="">'
				model_div +='<label class="form-check-label">'+libelle+'</label>'
				model_div +='</div>'

				div_aff += model_div
				
			}
			
			document.querySelector('#div_composants').innerHTML = div_aff;

		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
}

return false;

}

function getSupplementsArt(id){

	if(id>0){
		var xhr = new XMLHttpRequest();
		var res;
	
		xhr.open("POST", "API/getSupplementsArt.php", true);
	
		xhr.responseType = "json";
	
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		xhr.send("id="+id);
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				let div_aff ="";	
				res = this.response;
	
				for(let i=0;i<res.length;i++){
		
					let model_div = ""
					let libelle = res[i]['libelle'];
					let prix = res[i]['prix'];
					let id_declinaisons = res[i]['id_declinaisons'];
					let prix_art = document.querySelector('#prix').innerHTML.split(" ")[0];
					
					if(i==0){
						model_div ="<h4>Suppléments</h4>"
					}

					model_div +='<div class="form-check form-switch" style="text-align:center">';
					model_div +='<input onclick="mod_compo()" class="form-check-input supplements" id_declinaisons="'+id_declinaisons+'" prix_art="'+prix_art+'" value="'+prix+'" type="checkbox">';
					model_div +='<label class="form-check-label">'+libelle+' (+'+prix+' €)</label>';
					model_div +='</div>';
	
					div_aff += model_div;
					
				}
				
				document.querySelector('#div_supplements').innerHTML = div_aff;
	
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	}
	
	return false;
	
}

function getPrixArt(id){

	if(id>0){
		var xhr = new XMLHttpRequest();
		var res;
		
		xhr.open("POST", "API/getPrixArt.php", true);
		xhr.responseType = "json";
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send("id="+id);
	
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				let prix = res[0]['price']+" €"
				let id_art = res[0]['price']+" €"

				document.querySelector('#prix').innerHTML = prix;
				document.querySelector('#prix').setAttribute('id_art',id);
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	}

	return false;
}

async function mod_compo(){

	let prix_global_supplements = 0;

	let prix_art = parseFloat(document.querySelector(".supplements").getAttribute('prix_art'));

	let liste_int_supp = document.querySelectorAll(".supplements");
	for(let i = 0; i< liste_int_supp.length;i++){
		if(liste_int_supp[i].checked == true){
			prix_global_supplements += parseFloat(liste_int_supp[i].value);
		}
	}

	prix_tt = prix_art + prix_global_supplements;

	let prix_aff = prix_tt.toString()

	if(prix_aff.includes(".")){

		let nb_deci = prix_aff.split('.')[1].length

		if(nb_deci == 1 ){
			document.querySelector("#prix").innerHTML = prix_tt + "0 €"
		}
		else{
			document.querySelector("#prix").innerHTML = prix_tt + " €"
		}

	}
	else{
		document.querySelector("#prix").innerHTML = prix_tt + " €"
	}
	
}

function addCompositionPanier(){
	
	id_art = document.querySelector('#prix').getAttribute('id_art');

	let table_compo = []
	let liste_int_compo = document.querySelectorAll(".composition");

	for(let j = 0; j< liste_int_compo.length;j++){
		if(liste_int_compo[j].checked == false){
			let id_declinaisons = liste_int_compo[j].getAttribute('id_declinaisons');
			table_compo[table_compo.length] = id_declinaisons
		}
	}

	let table_supp = []
	let liste_int_supp = document.querySelectorAll(".supplements");

	for(let i = 0; i< liste_int_supp.length;i++){
		if(liste_int_supp[i].checked == true){
			let id_declinaisons = liste_int_supp[i].getAttribute('id_declinaisons');
			table_supp[table_supp.length] = id_declinaisons
		}
	}
	
    var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/addCompositionPanier.php", true);

	//Force le type de réponse en JSON
	//xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send("id_art="+id_art+"&table_compo="+table_compo+"&table_supp="+table_supp);
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};

	
	return false;

}

function majcardpanier(){

	var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/getcardpanier.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send();
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;

			let qt = res[0]
			let prix =res[1]

			document.querySelector('#prix_panier').innerHTML = prix+" €";
			document.querySelector('#qt_panier').innerHTML = qt;

		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};

	
	return false;

}

function select_menu(id){

	var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/getMenu.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send("id_menu="+id);
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;

			document.querySelector('#modal_body').innerHTML = res
			
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
	
	return false;

}

function selectoptionmenu(type,id){

	let liste_card = document.querySelectorAll('.cardtype'+type)
	let id_menu = document.querySelector('#prix_menu').getAttribute("id_menu");

	for(let h = 0 ;h<liste_card.length;h++){
		liste_card[h].style.border ="0px solid black"
	}

	document.getElementById(id).style.border = "2px solid red"

	if(type == 2){

		var xhr = new XMLHttpRequest();
		var res;
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/Maj_menu_compo.php", true);
	
		//Force le type de réponse en JSON
		xhr.responseType = "json";
	
		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
		//EVOIE DES DONNÉES
		xhr.send("id_art="+id+"&id_menu="+id_menu);
			
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				document.querySelector('#div_compo').innerHTML = res
				majCardTarif(id)
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
		
		return false;

	}

}

function majCardTarif(id){
	let id_menu = document.querySelector('#prix_menu').getAttribute("id_menu");

	var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/majCardTarif.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send("id_art="+id+"&id_menu="+id_menu);
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			document.querySelector('#tarif').innerHTML = res
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
	
	return false;

}

function mod_compo_menu(){

	let prix_art = parseFloat(document.querySelector(".supplements").getAttribute('prix_art'));

	let prix_global_supplements = 0
	let liste_int_supp = document.querySelectorAll(".supplements");

	for(let i = 0; i< liste_int_supp.length;i++){
		if(liste_int_supp[i].checked == true){
			prix_global_supplements += parseFloat(liste_int_supp[i].value);
		}
	}

	prix_tt = prix_art + prix_global_supplements;
	let prix_aff = prix_tt.toString()

	if(prix_aff.includes(".")){

		let nb_deci = prix_aff.split('.')[1].length

		if(nb_deci == 1 ){
			document.querySelector("#prix").innerHTML = "Prix : "+prix_tt + "0 €"
		}
		else{
			document.querySelector("#prix").innerHTML = "Prix : "+prix_tt + " €"
		}

	}
	else{
		document.querySelector("#prix").innerHTML = "Prix : "+prix_tt + " €"
	}

}


function selectMenu(){

	let z = 0;
	let listecard = document.querySelectorAll('.cardmenu')

	let table_compo =[];
	let table_supp =[];
	liste_art = [];
	let id_art =0
	let id_menu = document.querySelector('#prix_menu').getAttribute('id_menu')

	for(let o=0;o<listecard.length;o++ ){
		if(listecard[o].style.border=="2px solid red"){
			console.log(listecard[o])

			let type = listecard[o].getAttribute('type')
			console.log("type"+type)
			if(type == 2){

				id_art = listecard[o].id




				let liste_int_comp = document.querySelectorAll('.composition')
				console.log(liste_int_comp)
				nb_decli = 0
				for(let i = 0; i< liste_int_comp.length;i++){
					if(liste_int_comp[i].checked == false){
						table_compo[nb_decli]=liste_int_comp[i].getAttribute('id_declinaisons')
						nb_decli++
					}
				}

				let liste_int_supp = document.querySelectorAll(".supplements");
				console.log(liste_int_supp)
				nb_supp = 0 
				for(let i = 0; i< liste_int_supp.length;i++){
					if(liste_int_supp[i].checked == true){
						table_supp[nb_supp ]=liste_int_supp[i].getAttribute('id_declinaisons')
						nb_supp++
					}
				}

				console.log("table compo ", table_compo)
				console.log("table supp ",table_supp)

			}
			else{
				liste_art[z] = listecard[o].id
			}

			z++
			console.log("table art",liste_art);

		}
	}


	var xhr = new XMLHttpRequest();
		var res;
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/addMenuPanier.php", true);
	
		//Force le type de réponse en JSON
		//xhr.responseType = "json";
	
		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
		//EVOIE DES DONNÉES
		xhr.send("table_art="+liste_art+"&table_compo="+table_compo+"&table_supp="+table_supp+"&id_art="+id_art+"&id_menu="+id_menu);
			
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				console.log(res)

			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
		
		return false;









}