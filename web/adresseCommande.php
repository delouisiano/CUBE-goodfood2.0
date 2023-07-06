<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__ . '\assets\cDatabase.php');
?>

<head>
    <meta charset="utf-8">
    <title>Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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

                <form class="form-inline my-2 my-lg-0">
                <?php 
                    if (isset($_SESSION['Compte'])) { 
                        if (isset($_SESSION['site']))
                            cDatabase::getcardpanier();
                        else header('Location: ' . 'selectionSite.php');
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
    

    <div class="accordion" id="accordionPanelsStayOpenExample">

			<div class="accordion-item">
		    	<h2 class="accordion-header" id="panelsStayOpen-headingOne">
		    		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
		        		Adresse
		      		</button>
		    	</h2>
		    	<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
		      		<div class="accordion-body">

                        <div class="container text-center">
                            <br>
                            <h1 class="">Adresse de livraison</h1>
                             <br>
                        </div>

                        <div class="container mb-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php
                                cDatabase::getAdressUser();
                                ?>           
                                <div class="col-1">

                                    <div class="card border-secondary mb-3" style="max-width: 18rem;">

                                        <div class="card-header">
                                            Ajouter une adresse
                                        </div>
                                        
                                        <div class="card-body text-secondary">
                                        <div class="mb-3">

                                        <label class="form-label">Nom</label>
                                        <input type="txt" class="form-control" id="nom">
                                        <div class="help" id="nomHelp" style="color:red;" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                        <label class="form-label">Adresse</label>
                                        <input type="txt" class="form-control" id="Adresse">
                                        <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                        <label class="form-label">Ville</label>
                                        <input type="txt" class="form-control" id="ville">
                                        <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
                                        </div>   

                                        <div class="mb-3">
                                        <label class="form-label">Code Postal</label>
                                        <input type="txt" class="form-control" id="cp">
                                        <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
                                        </div> 

                                        <button type="button" onclick="addAdresse();" class="btn btn-success">Valider</button>

                                    </div>
                                </div>
                            </div>        
                            </div>   
                        </div>

		      		</div>
		    	</div>
		  	</div>

			<div class="accordion-item">

		    	<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
		    		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
		        	Paiment
		      		</button>
		    	</h2>
			</div>

			    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
			     	<div class="accordion-body">
                     <div class="container text-center">
                        <button type="button" onclick = "addCommande()" class="btn btn-success">Valider</button>              
                    </div>
			  	   	</div>
			  	</div>

			</div>

</body>
<!-- SCRIPT JS -->
<script src="js/adressecommande.js"></script>
</html>

<?php
function getlignescommandes($name,$img,$price,$Quantity) {
?>

    <tr>
        <!--
        <td><img src="<?php echo $img; ?>" /> </td>
        -->
        <td><img src="<?php echo "..."; ?>" /> </td>
        <td><?php echo $name ?></td>
        <td><input class="form-control" type="text" value="<?php echo $Quantity ?>" /></td>
        <td class="text-right"><?php echo $price ?>  €</td>
    </tr>

<?php
}
?>

<?php
function getSousTotal($price) {
?>
    <tr>
        <td></td>
        <td></td>
        <td>Sous-Total</td>
        <td class="text-right"><?php echo $price?> €</td>
    </tr>
<?php
}
?>

<?php
function getLivraison($price) {
?>
    <tr>
        <td></td>
        <td></td>
        <td>Livraison</td>
        <td class="text-right"><?php echo $price?> €</td>
    </tr>
<?php
}
?>

<?php
function getTotal($price) {
?>
    <tr>
        <td></td>
        <td></td>
        <td><strong>Total</strong></td>
        <td class="text-right"><strong><?php echo $price?> €</strong></td>
    </tr>
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

<?php 
function getAdresse($id,$title,$adress,$city,$zippedcode){
?>
<div class="col-1">

    <div class="card border-secondary mb-3" style="max-width: 18rem;">

        <div class="card-header">
            <?php echo($title); ?>
            <input class="form-check-input" type="checkbox" style="float:right;" value="<?php echo($id); ?>" id="flexCheckDefault">
        </div>
        
        <div class="card-body text-secondary">
        <p class="card-text">Adresse : <?php echo($adress); ?></p>
        <p class="card-text">Ville : <?php echo($city); ?></p>
        <p class="card-text">Code Postal : <?php echo($zippedcode); ?></p>    
        </div>

    </div>

</div>
<?php
}
?>
