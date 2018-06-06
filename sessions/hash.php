<?php

$message = '1234';

var_dump(md5($message));
var_dump(md5('test') === '81dc9bdb52d04dc20036dbd8313ed055');

var_dump(sha1('1234'));
var_dump(hash('sha256', '1234'));
var_dump(hash('sha512', '1234'));

$password = 'test';
$hash = password_hash($password, PASSWORD_DEFAULT);
var_dump($hash);
var_dump(password_verify('test', $hash));