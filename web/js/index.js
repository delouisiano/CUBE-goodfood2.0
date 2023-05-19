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

console.log("click btn")
console.log(id)

if(id>0){
	var xhr = new XMLHttpRequest();
	var res;

	xhr.open("POST", "API/getCompositionArt.php", true);

	xhr.responseType = "json";

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xhr.send("id="+id);
	
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let div_aff ="";	
			res = this.response;

			for(let i=0;i<res.length;i++){
	
				let libelle = res[i]['libelle']

				let model_div ='<div class="form-check form-switch" style="text-align:center">'
				model_div +='<input class="form-check-input" type="checkbox" checked="">'
				model_div +='<label class="form-check-label">'+libelle+'</label>'
				model_div +='</div>'

				console.log(model_div);
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
		
					let libelle = res[i]['libelle'];
					let prix = res[i]['prix'];
					let prix_art = document.querySelector('#prix').innerHTML.split(" ")[0];
					let model_div ='<div class="form-check form-switch" style="text-align:center">';
					model_div +='<input onclick="mod_compo()" class="form-check-input supplements" prix_art="'+prix_art+'" value="'+prix+'" type="checkbox">';
					model_div +='<label class="form-check-label">'+libelle+' (+'+prix+' €)</label>';
					model_div +='</div>';
	
					console.log(model_div);
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

async function getPrixArt(id){
	console.log("get prix")
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
				document.querySelector('#prix').innerHTML = prix;
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	}

	return false;
}

async function mod_compo(){

	console.log('mod')

	let prix_global_supplements = 0;

	let prix_art = parseFloat(document.querySelector(".supplements").getAttribute('prix_art'));

	let liste_int_supp = document.querySelectorAll(".supplements");
	for(let i = 0; i< liste_int_supp.length;i++){
		if(liste_int_supp[i].checked == true){
			prix_global_supplements += parseFloat(liste_int_supp[i].value);
		}
	}

	prix_tt = prix_art + prix_global_supplements;

	//let prix_aff = prix_tt + " "
	//let nb_deci = prix_aff.split('.')[1].length

	//if(nb_deci == 1 ){
	//	document.querySelector("#prix").innerHTML = prix_tt + "0 €"

	//}
	//else{
		document.querySelector("#prix").innerHTML = prix_tt + " €"
	//}
	
}