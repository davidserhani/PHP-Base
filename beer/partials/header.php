<?php
session_start();
// Configuration de PDO pour la base de données
// On utilise la notation en absolue pour se repérer
require(__DIR__.'/../config/database.php');
require (__DIR__.'/../config/functions.php');
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Le menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img class="logo" src="img/logo.png" alt="Beer PDO">
                Beer PDO
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0 mx-auto" method="get" action="search.php">
                    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Recherche</button>
                </form>
                <?php
                // Permet de récupérer le nom de la page sur laquelle on se trouve
                $page = basename($_SERVER['REQUEST_URI'], '.php'); ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo ($page == 'index') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown <?php echo ($page == 'beer_list' AND $page == 'beer_add') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Bières
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="beer_list.php">Les Bières</a>
                            <a class="dropdown-item" href="beer_add.php">Ajouter une bière</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?php echo ($page == 'brewery_list' AND $page == 'brewery_add') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Brasseries
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="brewery_list.php">Les brasseries</a>
                            <a class="dropdown-item" href="brewery_add.php">Ajouter une brasserie</a>
                        </div>
                    </li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <span class="navbar-text text-info">
                                <?= $_SESSION['user']['email']; ?>
                            </span>
                        </li>
                        <li class="nav-item <?php echo ($page == 'logout') ? 'active' : '' ?>">
                            <a class="nav-link text-warning" href="logout.php">LogOut</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item <?php echo ($page == 'register') ? 'active' : '' ?>">
                            <a class="nav-link" href="register.php">Inscription</a>
                        </li>
                        <li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
<?php //var_dump(basename($_SERVER['REQUEST_URI'], '.php'));
//var_dump($_SESSION);
//var_dump($_SERVER['HTTP_REFERER']);
?>