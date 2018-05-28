<?php
    function add($arg1 = 1, $arg2 = 2) {
        return $arg1 + $arg2;
    }
    echo add();
    echo '<br />';
    echo add(3);
    echo '<br />';
    echo add(2, 12);
    echo '<br />';

    //carré d'un nombre
    function sqr($arg) {
       return $arg * $arg;
    }
    echo sqr(5);
    echo '<br />';

    //aire d'un cercle

    function circle($rayon) {
        return $rayon * $rayon * M_PI;
    }

    //aire d'un rectangle
    function rect($side1, $side2) {
        return $side1 * $side2;
    }

    //TVA
    function convert($price, $tx, $ttc = false) {
        if($ttc) {
            return (1 - $tx / 100) * $price;
        }
        return (($price / 100) * $tx) + $price;
    }
    echo convert(10, 20);
    echo '<br />';
    echo convert(10, 20, true);
    echo '<br />';


