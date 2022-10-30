<!DOCTYPE html>

<?php
session_start();
require_once(__DIR__ . '\assets\cDatabase.php');
?>

<html>

	<head>
		<meta charset="utf-8">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

		<title>Accueil</title>
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
		      </ul>
		    </div>
		  </div>
		</nav>
		<br>	

		<div class="accordion" id="accordionPanelsStayOpenExample">

			<div class="accordion-item">
		    	<h2 class="accordion-header" id="panelsStayOpen-headingOne">
		    		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
		        		Menus
		      		</button>
		    	</h2>
		    	<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
		      		<div class="accordion-body">
			           	<div class="row row-cols-1 row-cols-md-3 g-4">
				         	
							<?php
								cDatabase::getMenu();
							?>

		      			</div>
		      		</div>
		    	</div>
		  	</div>

			<div class="accordion-item">
		    	<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
		    		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
		        	Sandwich seul
		      		</button>
		    	</h2>
			</div>

			    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
			     	<div class="accordion-body">
				    	<div class="row row-cols-1 row-cols-md-3 g-4">

							<?php
								cDatabase::getSandwich(); 
							?>

			      		</div>
			  	   	</div>
			  	</div>

  			 	<div class="accordion-item">
   			  		<h2 class="accordion-header" id="panelsStayOpen-headingThree">
	      				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
	       				Boissons
	      				</button>
    				</h2>
    		  	</div>	

			    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
			      	<div class="accordion-body">
				    	<div class="row row-cols-1 row-cols-md-3 g-4">

							<?php
								cDatabase::getBoisson(); 
							?>

				  		</div>
			    	</div>
			  	</div>

			</div>
		</body>
</html>

<?php
function boisson($name,$img,$price) {
?>

    <div class="col">
    	<div class="card h-100">
      		<img src= "<?php echo $img; ?>" class="card-img-top" alt="...">
      		<div class="card-body">
      			<div class="text-center">
        			<h5 class="card-title"><?php echo $name ?></h5>
        			<p class="card-text">Prix : <?php echo $price ?> €</p>
					<button type="submit" class="btn btn-primary">Commander</button>
        		</div>
      		</div>
    	</div>
 	</div>

<?php
}
?>

<?php
function sandwich($name,$img,$price,$content) {
?>

    <div class="col">
    	<div class="card h-100">
      		<img src= "<?php echo $img; ?>" class="card-img-top" alt="...">
      		<div class="card-body">
      			<div class="text-center">
       				<h5 class="card-title"><?php echo $name ?></h5>
        			<p class="card-text">Prix : <?php echo $price ?> €</p>
        			<button type="submit" class="btn btn-primary">Commander</button>
        		</div>	
      		</div>
    	</div>
 	</div>

<?php
}
?>


<?php
function menu($name,$img,$price,$content) {
?>

	<div class="col">
		<div class="card h-100">
	   		<img src= "<?php echo $img; ?>" class="card-img-top" alt="...">
	   		<div class="card-body">
	   			<div class="text-center">
	       			<h5 class="card-title"><?php echo $name ?></h5>
	       			<p class="card-text">Prix : <?php echo $price ?> €</p>
	       			<button type="submit" class="btn btn-primary">Commander</button>
	       		</div>
	   		</div>
		</div>
	</div>

<?php
}
?>