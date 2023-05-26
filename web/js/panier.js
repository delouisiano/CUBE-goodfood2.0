function supprArticlePanier(id){
	
    if(id>0){
        var xhr = new XMLHttpRequest();
	    var res;
		console.log('jiljh');
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/supprArticlePanier.php", true);

		//Force le type de réponse en JSON
		xhr.responseType = "json";

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		//EVOIE DES DONNÉES
		xhr.send("id="+id);
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				console.log('ok');
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	}
	return false;
}