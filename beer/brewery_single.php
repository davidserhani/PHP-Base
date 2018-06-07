<?php
require('partials/header.php');

$brewery = breweryExists($_GET['id']);
if (empty($_GET['id']) OR !$brewery) {
    header('HTTP/1.0 404 Not Found');
    ?>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark text-center">
            <div>
                <h1 class="display-4 font-italic">404</h1>
                <p class="lead my-3">Oops!</p>
                <button class="btn btn-outline-warning"><a href="index.php" class="text-white font-weight-bold">Retourner à l'Accueil...</a></button>
            </div>
        </div>
    </div>
    <?php
    require('partials/footer.php');
    exit;
}
?>


    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Découvrez <?= $brewery['name'] ?></h1>

            <hr class="my-4">
            <p class="lead">à <?= $brewery['city'] ?></p>

        </div>
    </div>
    <div class="container">
    <div class="card bg-dark text-white">
        <img class="card-img" src="https://catalogue.novascotia.com/ManagedMedia/18269.jpg" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title"><?= $brewery['address'] ?></h5>
            <p class="card-text"><?= $brewery['zip'] ?></p>
            <p class="card-text"><?= $brewery['country'] ?></p>
        </div>
    </div>
    </div>











<?php
require('partials/footer.php');
