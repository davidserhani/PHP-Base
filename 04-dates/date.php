<?php
    $t = date('l d F Y') . ', il est ' . date('H\hi');
    echo $t .'<br/>';
    $futur = strtotime('+ 10 days');
    echo 'Dans 10 jours nous serons un ' . date('l', $futur);