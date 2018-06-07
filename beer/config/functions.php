<?php

function slugify($string){
return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

function breweryExists($id) {
    global $db;
    $query = $db->prepare('SELECT * FROM brewery WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $brewery = $query->fetch();
    return $brewery;
}

function userIsLogged() {
    return isset($_SESSION['user']);
}
 function cookiAuthentification() {
    global  $db;
    if (isset($_COOKIE['id'])) {
        $idUser = $_COOKIE['id'];
        $query = $db->query('SELECT * FROM user WHERE id = ' . $idUser);
        $user = $query->fetch();

        $token = $_COOKIE['token'];
        if ($token == hash('sha256', $user['id'].$user['password'].$user['created_at'])) {
            unset($user['password']);
            $SESSION['user'] = $user;
        }
    }
 }




