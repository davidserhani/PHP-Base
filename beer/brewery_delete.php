<?php
session_start();
require 'config/database.php';
require 'config/functions.php';
if (!userIsLogged()) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Accès interdit';
    exit();
}
echo '<meta http-equiv="refresh" content="2; url=brewery_list.php">';
$query = $db->prepare('DELETE FROM brewery WHERE id = :id');
$query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$query->execute();