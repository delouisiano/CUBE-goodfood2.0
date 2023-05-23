function getsitebycity(){

	let ville = document.querySelector('#ville').value
	console.log(ville);

        var xhr = new XMLHttpRequest();
	    var res;
	
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "assets/cDatabase.php" + "?funcname=cDatabase::affSite&ville='"+ville+"'", true);

		//Force le type de réponse en JSON
		xhr.responseType = "json";

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		xhr.send();
		
		xhr.onreadystatechange = function() {
			console.log('aaaa')
			if (this.readyState == 4 && this.status == 200) {

			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	return false;
}

function getsite(id){

	if(id){
        
		var xhr = new XMLHttpRequest();
	    var res;
		
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/getSite.php", true);

		//Force le type de réponse en JSON
		xhr.responseType = "json";

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		xhr.send("id_site="+id);
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				redirection('index.php');				
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	
	}

	return false;	

}