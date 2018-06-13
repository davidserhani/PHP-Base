<?php
//je crée une fonction 'convert' qui prend 2 parametres dont un defini par defaut
function convert($money, $currency = 'EUR') {
    $from = 'euro(s)';
    $result = $money *  1.085965;


    if ($currency == 'USD') {
        $from = 'dollar(s)';
        $result = $money * 0.920839;
        //    je crée un variable pour stocker temporairement mon resultat
        $temp = $result;
    }

//    je definis le bon message en fonction de la devise rentrée
    switch ($currency) {
        case 'USD':
            return $money. ' ' .$from. ' = ' .$temp. ' euro(s)';
            break;
        case 'EUR':
            return $money. ' ' .$from. ' = ' .$result. ' dollar(s) américains.';
            break;
    }
}
echo convert(25, 'USD');
