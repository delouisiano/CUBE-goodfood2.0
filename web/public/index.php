<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/../templates/cTemplate.php');
require_once(__DIR__ . '/../API/cDatabase.php');

/* Pour remplacer le fonctionnement de base du template, ajouter des fonctions ici.
Ex, pour retirer la bannière de profil en haut de page, ajouter la clé-valeur profile. */
$t = new cTemplate(array (
	'script' => 'script',
    'article' => 'article',
));
$t->display();

function script() : void
{ ?>
	<script src="js/index.js"></script>
<?php }

function article(): void
{?>

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
					cDatabase::getmenu();
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
<?php }


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

										<div id="div_composants">
										</div>

										<BR>

										<div id="div_supplements">
											
										</div>

										<BR>

										<h4>Prix :</h4>
										<h4 id_art="" id="prix"></h4>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
										<button type="button" data-bs-dismiss="modal" onclick="addCompositionPanier();majcardpanier();" class="btn btn-primary">Ajouter Au Panier</button>
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
            <span class="badge badge-light" id="qt_panier"><?php echo $number?></span>
            <span class="badge badge-light">|</span>
            <span class="badge badge-light" id="prix_panier"><?php echo $price?> €</span>
        </a>
<?php
}
?>