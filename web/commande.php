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

<style>
    .bla,.table-striped{
        border:1px solid black;
    }
</style>

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

<div class="text-center">
    <div class="container">
        <br>
        <h1 class="">Vos Commandes</h1>
        <br>
     </div>
</div>

<div class="container mb-4">
    <div class="row">
        <div class="col-14">
            <div class="table-responsive bla">

                <table class="table table-striped">
                    <tbody>
                        <?php
                            cDatabase::getcommande();
                        ?>
                    </tbody>
                </table>
            </div>   
        </div>
    </div>
</div>


</body>
</html>

<?php
function getlignescommandes($name,$img,$price,$Quantity) {
?>

    <tr>
        <td><img style="height:50px;width:50px;" src="<?php echo $img; ?>" /> </td>
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