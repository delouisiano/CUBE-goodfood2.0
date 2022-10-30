<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<title>Authentification</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

	</head>

	<body>

		<!--  nav a claque dans le Template -->

		<nav class="navbar navbar-expand-lg bg-light">

		  <div class="container-fluid">
		    <a class="navbar-brand" href="\index.php">GOOD FOOD!!!!</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="\index.php">Accueil</a>
		        </li>
		         <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="\authentification.php">Connexion / Inscription</a>
		        </li>
				<!--
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Dropdown
		          </a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item" href="#">Action</a></li>
		            <li><a class="dropdown-item" href="#">Another action</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="#">Something else here</a></li>
		          </ul>
		        </li>
		    	-->
		      </ul>
		    </div>
		  </div>

		</nav>

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
								<button type="submit" class="btn btn-primary ">Connexion</button>
							</div>
						</form>
			    	</div>
				</div>
		    </div>
		</div>
	</body>
	<!-- SCRIPT JS -->
	<script src="js/app.js"></script>
</html>​