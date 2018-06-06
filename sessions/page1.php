<?php

session_start();
var_dump($_SESSION);
$countries = ['fr', 'it'];

$_SESSION['countries'] = $countries;
var_dump($_SESSION);