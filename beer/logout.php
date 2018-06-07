<?php
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

if (isset($_COOKIE['id'])){
    unset($_COOKIE['id']);
    setcookie('id', '', time() - 3600);
    unset($_COOKIE['token']);
    setcookie('token', '', time() - 3600);
}
header('Location: index.php');
exit();