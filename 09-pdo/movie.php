<?php
$db = new PDO('mysql:host=localhost;dbname=movie_catalog;charset=UTF8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$query = $db->query('SELECT * FROM movie WHERE id = ' . $_GET['id']);
$movies = $query->fetch();