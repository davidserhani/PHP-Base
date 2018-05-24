<?php
    $today = date('l d F Y') . ', il est ' . date('H\hi');
    echo $today .'<br/>';
    $futur = strtotime('3 june 2018');
    echo 'Dans 10 jours nous serons un ' . date('l', $futur);