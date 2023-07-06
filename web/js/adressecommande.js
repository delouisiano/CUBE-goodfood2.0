function getAdressUser(){
	
        var xhr = new XMLHttpRequest();
	    var res;
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("GET", "API/getAdressUser.php", true);

		//Force le type de réponse en JSON
		xhr.responseType = "json";

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		let table = (document.querySelectorAll('.form-check-input:checked'))

		if(table.length==1){

		let id = document.querySelectorAll('.form-check-input:checked')[0].value
		console.log(id)

		xhr.send("id_adress="+id);
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				location.href='http:/commande.php';
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	
		}
		else{
			let mes = "veuillez séléctioné une adresse de livraison..."
			console.log(mes)
		}

	return false;

}

function addAdresse(){

	let nom = document.querySelector('#nom').value
	let adresse =document.querySelector('#Adresse').value
	let ville =document.querySelector('#ville').value
	let cp =document.querySelector('#cp').value

	var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/addAdresse.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("nom="+nom+"&adresse="+adresse+"&ville="+ville+"&cp="+cp);
	
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			location.href='http:/adresseCommande.php';
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};

	return false;

}


function addCommande(){

	let id_adresse = 0
	let adresse = document.querySelectorAll(".form-check-input")
	console.log(adresse);

	for(let i = 0;i<adresse.length;i++){
		if(adresse[i].checked == true){
			id_adresse = adresse[i].getAttribute('value')
		}
	}

	var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/addCde.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");



	xhr.send("id_adresse="+id_adresse);
	
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			location.href='http:/commande.php';
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};

	return false;











}