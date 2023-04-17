function getsitebycity(city){

	let ville = document.querySelector('#ville').value
	console.log(ville);

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