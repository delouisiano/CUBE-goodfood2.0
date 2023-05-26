function getsitebycity(){

	let str_rech = document.querySelector('#ville').value

        var xhr = new XMLHttpRequest();
	    var res;
	
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "API/affSite.php", true);

		//Force le type de réponse en JSON
		xhr.responseType = "json";

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhr.send("str_rech="+str_rech);
				
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				res = this.response;
				let div_aff ="";	
				let model_div ="";
			
				for(let i=0;i<res.length;i++){
		
					let id_site 	= res[i]['id_site'];
					let nom 		= res[i]['nom'];
					let description = res[i]['description'];
					let image 		= res[i]['image'];
					let ville 		= res[i]['ville'];
					
					model_div ='<div class="col-1">'
					model_div +='<div class="card border-secondary mb-3" style="max-width: 18rem;">'
            		model_div +='<div class="card-header text-center">'
                	model_div +=nom
            		model_div +='</div>'
            		model_div +='<img src= "'+image+'" class="card-img-top" alt="">'
            		model_div +='<div class="card-body text-center">'
                	model_div +=ville
                	model_div +='<BR>'            
                	model_div +=description
                	model_div +='<BR><BR>'
                	model_div +='<button type="submit" onclick="getsite('+id_site+');" class="btn btn-primary">Séléctonner</button>'
            		model_div +='</div>'
        			model_div +='</div>'
					model_div +='</div>'
					
					div_aff += model_div
					
				}
			
				document.querySelector('#div_Site').innerHTML = div_aff;

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