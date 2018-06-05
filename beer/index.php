<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php'); ?>

<!-- Le contenu de la page -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Bienvenue sur Beer PDO</h1>
            <p>Le site référence de la bière</p>
            <hr class="my-4">
            <p class="lead">à consommer avec modération.</p>
        </div>
    </div>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">artisans brasseur</h1>
            <p class="lead font-weight-normal">La qualité et l'originalité</p>
            <a class="btn btn-outline-warning" href="beer_list.php">Voir notre sélection</a>
        </div>
        <div class="product-device box-shadow d-none d-md-block"></div>
        <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    </div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');
