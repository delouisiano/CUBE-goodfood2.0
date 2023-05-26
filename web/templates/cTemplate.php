<?php

error_reporting(0);

class cTemplate
{
    /** tableau de fonctions propres  */
    protected $func;
    /** indique la présence de la navigation */
    protected $hasNav;
    /** titre donné à la page */
    public string $title   = "Good Food ©";

    /** retourne un objet cTemplate.
     * @param array $func définit les fonctions propres
     * @param bool $hasNav indique la présence de la navigation
    */
    function __construct(array $func=null, bool $hasNav=true)
    {
        $this->func = $func;
        $this->hasNav = $hasNav;
    }

    /** affiche une page basé sur la structure de l'instance */
    function display() : void
    {
        $this->header();
        $this->body();
        $this->footer();
    }

    /** affiche l'entête de la page */
    protected function header() : void
    {?>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta name="robots" content="noindex, nofollow">
            <meta name="copyright" content="Eurodatacar">
            <meta name="author" content="Eurodatacar">

            <title>Commande</title>
            <title><?= $this->title ?></title>
            <link rel="shortcut icon" href="./assets/img/favicon.ico">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">   
            <link rel="stylesheet" type="text/css" href="./assets/css/frameworkhiego.css">
            <link rel="stylesheet" type="text/css" href="./assets/css/goodfood.css">
            <?php isset($this->func['style'])? $this->func['style']() : null; ?>
        </head>
        <body>
    <?php }

    /** affiche le corps de la page */
    protected function body () : void
    {
        ?><header><?php
            $this->nav();
            isset($this->func['toolbar'])? $this->func['toolbar']() : null;
        ?>
        </header><?php
        isset($this->func['article'])? $this->func['article']() : null;
    }

    /** affiche le pied de document et de page */
    protected function footer() : void
    {?>
        <footer>
            - Lille - Cesi - Good Food -
            <script type="text/javascript" src="./assets/js/edcis.js?v=1"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            <?php $this->script(); ?>
        </footer>
        </body>
        </html>
    <?php }

    /** affiche la navigation */
    protected function nav() : void
    {
    if (!$this->hasNav) return; ?>
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
<?php }

    /** intègre les scripts js inhérent à la classe */
    protected function script() : void { ?>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3MF5TQQNVS"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3MF5TQQNVS');
        </script>
        <?php isset($this->func['script'])? $this->func['script']() : null; 
    }
} ?>