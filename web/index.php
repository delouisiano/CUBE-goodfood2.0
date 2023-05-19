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

		<title>Carte</title>

	</head>

	<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		    <div class="container">
		        <a class="navbar-brand" href="index.php">GOOD FOOD !!!</a>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon"></span>
		        </button>

		        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
		          

		            <form class="form-inline my-2 my-lg-0">
						<?php 
						if (isset($_SESSION['Compte'])) { 
						?>
						<a class="btn btn-warning btn-sm ml-3" href="commande.php">
							<i class="fa fa-shopping-cart"></i>Commande
							</a> 
						<?php
							cDatabase::getcardpanier();
						?>
							<a class="btn btn-danger btn-sm ml-3" href="authentification.php">
			                	<i class="fa fa-shopping-cart"></i>Déconnexion
			             	</a>

						<?php } else{ ?>
							<a class="btn btn-warning btn-sm ml-3" href="authentification.php">
							<i class="fa fa-shopping-cart"></i>S'Identifier
							</a>          
						<?php } ?>
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
		<!-- SCRIPT JS -->
		<script src="js/index.js"></script>
</html>

<?php
function boisson($name,$img,$price,$id) {
?>

    <div class="col">
    	<div class="card h-100">
      		<img src= "<?php echo $img; ?>" class="card-img-top" alt="...">
      		<div class="card-body">
      			<div class="text-center">
        			<h5 class="card-title"><?php echo $name ?></h5>
        			<p class="card-text">Prix : <?php echo $price ?> €</p>
					<button type="submit" value="<?php echo $id?>" onclick="addArticlePanier(<?php echo $id?>)" class="btn btn-primary">Commander</button>
        		</div>
      		</div>
    	</div>
 	</div>

<?php
}
?>

<?php
function sandwich($id,$name,$img,$price,$content,$vegetarien,$vegan) {
?>

    <div class="col">
    	<div class="card h-100">
      		<img src= "<?php echo $img; ?>" class="card-img-top" alt="...">
      		<div class="card-body">
      			<div class="text-center">
       				<h5 class="card-title"><?php echo $name ?></h5>
       				<?php
       				if($vegetarien == 1){
       				?>
       					<img src= "assets\vegan.jpg" class="img" alt="image" height="30" width="30">
       				<?php
       				}
       				?>
       				<?php
       				if($vegan == 1){
       				?>
       					<img src= "assets\végétarien.jpg" class="img" alt="image" height="30" width="30">
       				<?php
       				}
       				?>
        			<p class="card-text">Prix : <?php echo $price ?> €</p>
        			<button type="submit" value="<?php echo $id?>" onclick="addArticlePanier(<?php echo $id?>)" class="btn btn-primary">Commander</button>
        		
					<button type="button" class="btn btn-primary" onclick="getPrixArt(<?php echo $id?>);getCompositionArt(<?php echo $id?>);getSupplementsArt(<?php echo $id?>);" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Séléction De La Composition
					</button>

						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Séléction De La Compostion</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body">

									<h4>Composants</h4>
									<div id="div_composants">
									
									</div>

									<BR>

									<h4>Suppléments</h4>
									<div id="div_supplements">
										
									</div>

									<BR>

									<h4>Prix :</h4>
									<h4 id="prix"></h4>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
									<button type="button" class="btn btn-primary">Ajouter Au Panier</button>
								</div>
							</div>
						</div>
						</div>
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

<?php
function getPanier($number,$price) {
?>
        <a class="btn btn-success btn-sm ml-3" href="panier.php">
            <i class="fa fa-shopping-cart"></i>Panier
            <span class="badge badge-light">|</span>
            <span class="badge badge-light"><?php echo $number?></span>
            <span class="badge badge-light">|</span>
            <span class="badge badge-light"><?php echo $price?> €</span>
        </a>
<?php
}
?>