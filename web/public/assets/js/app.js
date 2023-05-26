
//ÉCOUTEUR SUR L'ACTION CLIC DU FORMULAIRE D'INSCRIPTION
document.getElementById("inscription").addEventListener("submit", function(e) {
	
	//0 rafraichissement
	e.preventDefault();
 
 	//INITIALISATION DES VARIABLES
 		//RÉCUPERATION DES DONNÉES DU FORMULAIRE SOUS FORME D'OBJET JS 
	var data = new FormData(this);
		// INSTANCIATION  D'UNE HTTP REQUEST
	var xhr = new XMLHttpRequest();
		//INITIALISATION A VIDE DE lA VARIABLE D'ERREUR
	var err = "";
		//INITIALISATION A VIDE DE lA VARIABLE Genre 0 = homme 1 = femme
	var Genre = 0;
	

	// STOCKAGE DES DONNÉES DANS LE LOCAL STORAGE
	localStorage.setItem("pseudo",document.querySelector("#pseudo").value);
	localStorage.setItem("mail",document.querySelector("#mail").value);
	localStorage.setItem("mail2",document.querySelector("#mail2").value);
	localStorage.setItem("mdp",document.querySelector("#mdp").value);
	localStorage.setItem("mdp2",document.querySelector("#mdp2").value);
	localStorage.setItem("Homme",document.querySelector("#Homme").checked);
	localStorage.setItem("Femme",document.querySelector("#Femme").checked);
	localStorage.setItem("langue",document.querySelector("#langue").selectedIndex);
	
	//CHECK SUR LE FORMULAIRE

	//TEST SI LES MOT DE PASSE CORENSPONDENT 
	if (localStorage.getItem("mdp") != localStorage.getItem("mdp2")) {
		err = "Les Mots De Passe Ne Correspondent Pas.";
	}

	//TEST SI LES EMAILS CORENSPONDENT 
	if (localStorage.getItem("mail") != localStorage.getItem("mail2")) {
		err = "Les Adresse Mail Ne Correspondent Pas.";
	}

	//TEST SI UN CHAMPS DU FORMULAIRE EST VIDE
	if (localStorage.getItem("pseudo") == "" || localStorage.getItem("mail") == "" || localStorage.getItem("mail2") == "" || localStorage.getItem("mdp") == ""  || localStorage.getItem("mdp2") == "" || localStorage.getItem("Homme") == false && localStorage.getItem("Femme") == false || localStorage.getItem("langue") == 0  ) {
		err = "Veuillez Renseigner Tout Les Champs.";
	}

	if(localStorage.getItem("Homme") == "true"){
		Genre = 0 ; 
	}
	else{
		Genre = 1 ;
	}

	//PRÉPARATION DE LA HTTP REQUEST 
	if (err == "") {

		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "../API/inscription.php", true);

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		//EVOIE DES DONNÉES
		xhr.send("pseudo="+localStorage.getItem("pseudo")+"&mdp="+localStorage.getItem("mdp")+"&mdp2="+localStorage.getItem("mdp2")+"&mail="+localStorage.getItem("mail")+"&mail2="+localStorage.getItem("mail2")+"&Genre="+Genre+"&langue="+localStorage.getItem("langue"));

		//Force le type de réponse en JSON
		xhr.responseType = "json";
			
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				console.log(res);
				switch(res){
					case 2:
						document.querySelector("#erreur").innerHTML = "Adresse mail déja utilisée";
					break;
						
					case 1:
						document.querySelector("#erreur").innerHTML = "Pseudo déja utilisé";
					break;

					case 0:
						document.querySelector("#erreur").innerHTML = "ok";
					break;
				}
			} 
			else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};
	}
	else{
		//AFFICHAGE DE L'ERREUR SUR LA VUE
		document.querySelector("#erreur").innerHTML = err;
	}
	return false;
});

//ÉCOUTEUR SUR L'ACTION CLIC DU FORMULAIRE DE CONNEXION
document.getElementById("connexion").addEventListener("submit", function(e) {

	//0 rafraichissement
	e.preventDefault();

	//INITIALISATION DES VARIABLES
 		//RÉCUPERATION DES DONNÉES DU FORMULAIRE SOUS FORME D'OBJET JS 
	var data = new FormData(this);
		// INSTANCIATION  D'UNE HTTP REQUEST
	var xhr = new XMLHttpRequest();
		//INITIALISATION A VIDE DE lA VARIABLE D'ERREUR
	var err = "";

	// STOCKAGE DES DONNÉES DANS LE LOCAL STORAGE
	localStorage.setItem("mdp",document.querySelector("#mdpco").value);
	localStorage.setItem("mail",document.querySelector("#mailco").value);

	//CHECK SUE LE FORMULAIRE
	//TEST SI UN CHAMPS DU FORMULAIRE EST VIDE
	if (localStorage.getItem("mail") == "" || localStorage.getItem("mdp") == "" ) {
		err += "Veuillez Renseigner Tout Les Champs.";
	}

	if (err == "") {
	
		//SÉLECTION DU FICHIER DE L'API
		xhr.open("POST", "../API/connexion.php", true);

		//ENTETE DE LA REQUETE (EVITER PB CORPS) 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		//EVOIE DES DONNÉES
		xhr.send("mail="+localStorage.getItem("mail")+"&mdp="+localStorage.getItem("mdp"));
		//document.location.href="http://jdut/index.php"; 

		//Force le type de réponse en JSON
		xhr.responseType = "json";
			
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				res = this.response;
				console.log(res);
				if(res == 0){
					document.querySelector("#erreurco").innerHTML = "Mail ou mot de passe incorrect. Entrez le Mail et le mot de passe corrects et réessayez.";
				}
				else{
					document.location.href="http://pfelast/public/index.php?";
				}
			} else if (this.readyState == 4) {
				alert("Une erreur est survenue...");
			}
		};

	}
	else{
		//AFFICHAGE DE L'ERREUR SUR LA VUE
		document.querySelector("#erreurco").innerHTML = err;	
		document.querySelector("#erreur").innerHTML = "";
	}
	//FONCTION DONC RETOUR (USELESS)
	return false;
});