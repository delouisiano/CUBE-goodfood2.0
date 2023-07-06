function addSite(){
    let err=0
    var fReader = new FileReader();
    let src;
    var xhr = new XMLHttpRequest();

    let nom = document.querySelector("#nom").value
    let description = document.querySelector("#description").value
    let pays = document.querySelector("#pays").value
    let adresse = document.querySelector("#adresse").value
    let ville = document.querySelector("#ville").value
    let tel = document.querySelector("#tel").value
    let cp = document.querySelector("#cp").value


    var input = document.getElementById("formFile");
    document.querySelector('#ficHelp').innerHTML = "";
    if(input.files.length == 0){
      err = 1
      document.querySelector('#ficHelp').innerHTML = "Veillez séléctionner un fichier";
    }

    if(err == 0){

      fReader.readAsDataURL(input.files[0]);
      fReader.onloadend = function(event){

        src = event.target.result;
        
        //SÉLECTION DU FICHIER DE L'API
        xhr.open("POST", "API/addSite.php", true);

        //ENTETE DE LA REQUETE (EVITER PB CORPS)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        //EVOIE DES DONNÉES
        xhr.send("nom="+nom+"&description="+description+"&pays="+pays+"&adresse="+adresse+"&ville="+ville+"&tel="+tel+"&cp="+cp+"&img_B64="+src);
        
        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            res = this.response;
            console.log(res);
          } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
          }
        };

      }
    }






}


function loadAddArt(){


    var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/getListeSite.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send();
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			console.log(res)
            document.querySelector('#div_article').innerHTML = res
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
	
	return false;

}

function addArt(){
    
    let err=0
    var fReader = new FileReader();
    let src;
    var xhr = new XMLHttpRequest();

    selectSite = document.querySelector('#SelectSite').value
    selectCategory = document.querySelector('#SelectCat').value

    let titre = document.querySelector('#titre').value
    let prix = document.querySelector('#prix').value
    let content = document.querySelector('#contenu').value

    let vegan = document.querySelector('#vegan').checked
    if(vegan==true){
        vegan=1
    }
    else{
        vegan=0
    }

    let Végétarien = document.querySelector('#Végétarien').checked
    if(Végétarien==true){
        Végétarien = 1
    }
    else{
        Végétarien =0
    }

    var input = document.getElementById("formFile2");
    document.querySelector('#ficHelp').innerHTML = "";
    if(input.files.length == 0){
      err = 1
      document.querySelector('#ficHelp').innerHTML = "Veillez séléctionner un fichier";
    }
    console.log(err)
    if(err == 0){

      fReader.readAsDataURL(input.files[0]);
      fReader.onloadend = function(event){

        src = event.target.result;
        
        //SÉLECTION DU FICHIER DE L'API
        xhr.open("POST", "API/addArt.php", true);

        //ENTETE DE LA REQUETE (EVITER PB CORPS)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        //EVOIE DES DONNÉES
        xhr.send("id_site="+selectSite+"&content="+content+"&id_cat="+selectCategory+"&titre="+titre+"&prix="+prix+"&vegan="+vegan+"&Végétarien="+Végétarien+"&img_B64="+src);
        
        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            res = this.response;
            console.log(res);
          } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
          }
        };

      }
    }

}

function loadAddMenu(){

    var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/getFormMenu.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send();
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			console.log(res)
            document.querySelector('#div_menu').innerHTML = res
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
	
	return false;


}

function addMenu(){
    console.log("add_menu")
    let err=0
    var fReader = new FileReader();
    let src;
    var xhr = new XMLHttpRequest();

    selectSite = document.querySelector('#SelectSite').value

    let titre = document.querySelector('#titre').value
    let prix = document.querySelector('#prix').value
    let content = document.querySelector('#contenu').value

   // let Végétarien = document.querySelector('#Végétarien').checked


    var input = document.getElementById("formFile3");
    document.querySelector('#ficHelp').innerHTML = "";
    if(input.files.length == 0){
      err = 1
      document.querySelector('#ficHelp').innerHTML = "Veillez séléctionner un fichier";
    }
    console.log(err)
    if(err == 0){

      fReader.readAsDataURL(input.files[0]);
      fReader.onloadend = function(event){

        src = event.target.result;
        
        //SÉLECTION DU FICHIER DE L'API
        xhr.open("POST", "API/addMenu.php", true);

        //ENTETE DE LA REQUETE (EVITER PB CORPS)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        //EVOIE DES DONNÉES
        xhr.send("id_site="+selectSite+"&content="+content+"&titre="+titre+"&prix="+prix+"&img_B64="+src);
        
        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            res = this.response;
            console.log(res);
            addLignesMenu(res.split('"')[1])
          } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
          }
        };

      }
    }

    
}

function addLignesMenu(id_menu){

    let liste_check_cat = document.querySelectorAll(".checkcat")
    let liste_select_cat = document.querySelectorAll(".checkcatval")
    liste_cat_select = ""
    nb_cat = 0

    for(let i =0;i<liste_check_cat.length;i++){
        if(liste_check_cat[i].checked==true){
            if(nb_cat == 0){
                liste_cat_select+=liste_select_cat[i].getAttribute('value')
            }
            else{
                liste_cat_select+=","+liste_select_cat[i].getAttribute('value')
            }
            nb_cat++
        }
    }

    if(liste_cat_select){

        var xhr = new XMLHttpRequest();
        var res;
        //SÉLECTION DU FICHIER DE L'API
        xhr.open("POST", "API/addMenuCat.php", true);
    
        //Force le type de réponse en JSON
        xhr.responseType = "json";
    
        //ENTETE DE LA REQUETE (EVITER PB CORPS) 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
        //EVOIE DES DONNÉES
        xhr.send("id_menu="+id_menu+"&listeligne="+liste_cat_select);
            
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
}

function loadAddComposition(){

    console.log("loadAddComposition()");

    var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/getFormDecli.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send();
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
			console.log(res)
            document.querySelector('#div_decli').innerHTML = res
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
	
	return false;


}


function adddeclinaison(){


    let id_art = document.querySelector('#Select_art').value
    let type= 0
    let titre = document.querySelector('#titre').value
    let prix = document.querySelector('#prix').value

    let decli = document.querySelector('#decli').checked
    if(decli==true){
        type=1
        prix = "0.00"
    }
 
    let supp = document.querySelector('#supp').checked
    if(supp==true){
        type=2
    }
 
    test = "id_art="+id_art+"&titre="+titre+"&prix="+prix+"&decli="+decli+"&supp="+supp

    var xhr = new XMLHttpRequest();
	var res;
	//SÉLECTION DU FICHIER DE L'API
	xhr.open("POST", "API/addDecli.php", true);

	//Force le type de réponse en JSON
	xhr.responseType = "json";

	//ENTETE DE LA REQUETE (EVITER PB CORPS) 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	//EVOIE DES DONNÉES
	xhr.send("id_art="+id_art+"&titre="+titre+"&prix="+prix+"&type="+type);
		
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			res = this.response;
		} else if (this.readyState == 4) {
			alert("Une erreur est survenue...");
		}
	};
	
	return false;

}