<?php
//Configuration de PDO pour la base de données
require (__DIR__ . '/../config/database.php');
?>
<!DOCTYPE html>
<html lang="fr" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beer PDO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="node_modules/bulma-carousel/dist/bulma-carousel.min.css">
</head>
<body>
<nav class="navbar is-transparent is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" alt="" width="112" height="28">
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">

        </div>

        <div class="navbar-end">
            <a class="navbar-item is-active is-hoverable" href="#">
                Accueil
            </a>
            <a class="navbar-item is-hoverable" href="beer_list.php">
                Bières
            </a>
        </div>
    </div>
</nav>
<div class="container">