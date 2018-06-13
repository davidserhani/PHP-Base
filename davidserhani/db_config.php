<?php
//connexion à ma bdd
$db = new PDO('mysql:host=localhost;dbname=exercice_3;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
]);
?>