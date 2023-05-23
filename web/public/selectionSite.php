<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__ . '\assets\cDatabase.php');
$_SESSION['site']=null;
$_SESSION['panier']=null;
?>

<head>
    <meta charset="utf-8">
    <title>Séléction de site</title>
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
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <?php 
                    if (isset($_SESSION['Compte'])) { 
                    ?>
                    <a class="btn btn-danger btn-sm ml-3" href="panier.php">
                        <i class="fa fa-shopping-cart"></i>Déconnexion
                    </a>
                    <?php } else{ 
                        var_dump($_SESSION['Compte']);?>
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
		        		Sites
		      		</button>
		    	</h2>
		    	<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
		      		<div class="accordion-body">

                        <div class="container text-center">
                            <br>
                            <h1 class="">Sites</h1>
                             <br>
                        </div>

                        <div class="text-center input-group mb-3" style ="max-width:500px;" >
                            <input type="text" class="form-control" id="ville" placeholder="Ville" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" onclick="getsitebycity()" type="button">Valider</button>
                            </div>
                        </div>

                        <div class="container mb-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4">

                                <?php
                                cDatabase::getSites();
                                ?>         
                                    
                            </div>   
                        </div>

		      		</div>
		    	</div>
		  	</div>
    </div>

</body>
<!-- SCRIPT JS -->
<script src="js/selectionSite.js"></script>
<script src="js/global.js"></script>
</html>

<?php
function sites($name,$img,$content,$id) {
?>

	<div class="col-1">
        <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header text-center" >
                <?php echo($name) ?>
            </div>
                <img src= "<?php echo $img; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="text-center">
                            <?php echo($content) ?>
                    </div>
                    <BR>
                    <div class="text-center">
                        <button type="submit" onclick="getsite(<?php echo($id) ?>);" class="btn btn-primary">Séléctonner</button>
                    </div>
                </div>
            </div>
	</div>

<?php
}
?>