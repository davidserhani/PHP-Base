<?php
include('a.php');
echo 'reste du site<br/>';

include_once('a.php');
var_dump(__DIR__);

require(__DIR__.'/b.php');