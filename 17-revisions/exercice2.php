<?php

/*
   - En dessous de 0 : Il fait très froid.
   - Entre 0 et 14 degrès : C'est le nooord.
   - Entre 15 et 25 degrès : Il fait bon.
   - Au dessus de 25 degrès : Il fait trop chaud.
*/
function degree($temperature, $target = 'F') {
    $from = 'C'; // Par défaut, on fait C vers F
    $result = $temperature * 1.8 + 32;
    $temperatureCondition = $temperature;

    // Si on veut faire F vers C
    if ('C' == $target) { // Yoda condition
        $from = 'F'; // Si on choisis la cible C, on fait F vers C
        $result = ($temperature - 32) / 1.8;
        $temperatureCondition = $result;
    }

    // Trouver le bon message en fonction de la température en celsius
    if ($temperatureCondition < 0) {
        $message = 'Il fait très froid.';
    } else if ($temperatureCondition > 0 && $temperatureCondition <= 14) {
        $message = 'C\'est le nooord.';
    } else if ($temperatureCondition >= 15 && $temperatureCondition <= 25) {
        $message = 'Il fait bon.';
    } else {
        $message = 'Il fait trop chaud.';
    }

    return $message . ' ' . $temperature . '°' . $from . ' équivaut à ' . $result . '°' . $target . '<br />';
}

echo degree(27, 'F'); // Affiche "Il fait trop chaud. 27°C équivaut à 80.6°F."
echo degree(41, 'C'); // Affiche "C'est le nooord. 41°F équivaut à 5°C."
