function getAdressUser(){
	
        var xhr = new XMLHttpRequest();
	    var res;
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/getAdressUser.php", true);

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