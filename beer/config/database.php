<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'beer_pdo');
//Connexion à la base de données
try {
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8',  USER , PASS , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
    echo '<img src="https://gph.is/2xkTH2D"/>';
}

