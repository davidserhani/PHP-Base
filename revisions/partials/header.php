<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'tvshow');
try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Révisions</title>
</head>
<body>
<div class="container">

