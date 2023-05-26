<!DOCTYPE html>

<?php
session_start();

session_destroy();

?>

<html>

	<head>

		<meta charset="utf-8">
		<title>Authentification</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		    <div class="container">
		        <a class="navbar-brand" href="index.php">GOOD FOOD !!!</a>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon"></span>
		        </button>

		        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
		            <ul class="navbar-nav m-auto">
		                <li class="nav-item m-auto">
		                    <a class="nav-link" href="index.php">Carte</a>
		                </li>
		            </ul> 
		        </div>
		    </div>
		</nav

		<br><br>

		<!--  INSCRIPTION -->

		<div class="row">
			<div class="col-sm-1">
			</div>
		  	<div class="col-sm-5">
		    	<div class="card">
		      		<div class="card-body">
		      			<form id="inscription">
		      				
		      				<div class="align-self-center">
						  		<h5 class="text-center ">INSCRIPTION</h5><BR>		
						  	</div>

						  	<div class="form-group">
						    	<input type="Text" class="form-control" id="pseudo" aria-describedby="emailHelp" placeholder="Pseudo" name="pseudo">
						  	</div>

							<div class="form-row">   

				      			<div class="form-group col-md-6">
									<input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Adresse Mail">
								</div>

						 		<div class="form-group col-md-6">
									<input type="email" class="form-control" id="mail2" name="mail2" aria-describedby="emailHelp" placeholder="Confirmation">
								</div>
							
		      				</div>

							<div class="form-row">
		      			
				      			<div class="form-group col-md-6">
						  			<input type="password" class="form-control" id="mdp" placeholder="Mot De Passe" name="mdp">
						 		</div>

						 		<div class="form-group col-md-6">
						  			<input type="password" class="form-control" id="mdp2" placeholder="Confirmation" name="mdp2">
						  		</div>
		      				</div>
		      				
							<div class="text-center">

								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Homme" value="option1">
								  <label class="form-check-label" for="inlineRadio1">Homme</label>
								</div>

								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Femme" value="option2">
								  <label class="form-check-label" for="inlineRadio2">Femme</label>
								  <br><br>
								</div>

							</div>
							</BR>
							<div class="text-center">

								<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="langue">
								  <option selected>Langue</option>
		 						  <option value="1">Français</option>
		 						  <option value="2">Espagnol</option>
		  						  <option value="3">Anglais</option>
								</select>

							</div>

							<p class="text-danger"> <span id="erreur" class="text-danger"></span></p>
							
							<div class="form-group text-center">
								<button type="submit" class="btn btn-primary">Incription</button>
							</div>
						  
		  				</form>
		      		</div>
		    	</div>
		  	</div>

		<!--  Connexion -->

		 	<div class="col-sm-5">
				<div class="card">
			    	<div class="card-body">
						<form id="connexion">
							<h5 class="text-center">CONNEXION</h5><BR>
							<div class="form-group">
								<input type="email" class="form-control" id="mailco" aria-describedby="emailHelp" placeholder="Adresse Mail">
							</div>

							<div class="form-group">
								<input type="password" class="form-control" id="mdpco" placeholder="Mot De Passe">
							</div>
							<p class="text-danger"> <span id="erreurco" class="text-danger"></span></p>
							<div class="form-group text-center">
								<button type="submit" onclick="redirection('selectionSite.php')" class="btn btn-primary ">Connexion</button>
							</div>
						</form>
			    	</div>
				</div>
		    </div>
		</div>
	</body>
	<!-- SCRIPT JS -->
	<script src="js/app.js"></script>
	<script src="js/global.js"></script>
</html>​

<?php
function getPanier($number) {
?>

        <a class="btn btn-success btn-sm ml-3" href="panier.php">
            <i class="fa fa-shopping-cart"></i>Panier
            <span class="badge badge-light"><?php echo $number?></span>
        </a>
  
<?php
}
?>