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

	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	    <div class="container">
	        <a class="navbar-brand" href="index.html">GOOD FOOD !!!</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
	            <ul class="navbar-nav m-auto">
	                <li class="nav-item m-auto">
	                    <a class="nav-link" href="index.php">Carte</a>
	                </li>
	                <li class="nav-item active">
	                    <a class="nav-link" href="panier.php">Panier<span class="sr-only"></span></a>
	                </li>
	                <li class="nav-item active">
	                    <a class="nav-link" href="authentification.php">Connexion/Inscription<span class="sr-only"></span></a>
	                </li>
	            </ul>

	            <form class="form-inline my-2 my-lg-0">
	                <a class="btn btn-success btn-sm ml-3" href="panier.php">
	                    <i class="fa fa-shopping-cart"></i> Panier
	                    <span class="badge badge-light">3</span>
	                </a>
	            </form>
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
       				<img src= "assets\vegan.jpg" class="img" alt="image" height="30" width="30">
       				<img src= "assets\végétarien.jpg" class="img" alt="image" height="30" width="30">
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