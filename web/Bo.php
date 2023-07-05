<!DOCTYPE html>
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <title>Back Office</title>
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
                    <a class="nav-link" >Back Office</a>
                </li>
            </ul>
        </div>

    </div>
</nav>



<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Sites</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" onclick="loadAddArt()" aria-selected="false">Articles</button>
    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" onclick="loadAddMenu()"aria-selected="false">Menus</button>
    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" onclick="loadAddComposition()" aria-selected="false">Composition</button>
  </div>
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


    <form class="text-center align-self-center" style="width:500px;border:2px solid black;margin:auto;">

        <div class="mb-3">
          <label class="form-label">Nom</label>
          <input type="txt" class="form-control" id="nom">
          <div class="help" id="nomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Description</label>
          <input type="txt" class="form-control" id="description">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Pays</label>
          <input type="txt" class="form-control" id="pays">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Adresse</label>
          <input type="txt" class="form-control" id="adresse">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Ville</label>
          <input type="txt" class="form-control" id="ville">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Numéro de Téléphone</label>
          <input type="txt" class="form-control" id="tel">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label class="form-label">Code Postal</label>
          <input type="txt" class="form-control" id="cp">
          <div class="help" id="prenomHelp" style="color:red;" class="form-text"></div>
        </div>
        
        <BR>

        <div class="mb-3">
            <label class="form-label">Image</label>
          <input class="form-control" type="file" id="formFile">
          <div class="help" id="ficHelp" style="color:red;" class="form-text"></div>
        </div>

        <button type="button" onclick="addSite();" class="btn btn-success">Envoyer</button>

      </form>

    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div id="div_article">

        </div>
    </div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <div id="div_menu">

        </div>
    </div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <div id="div_decli">

        </div>
    </div>
  </div>
</div>

</body>
<!-- SCRIPT JS -->
<script src="js/global.js"></script>
<script src="js/Bo.js"></script>
</html>

