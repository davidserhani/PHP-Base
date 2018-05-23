<?php

    $age = 13;
    
    if ($age >= 18) {
        echo "Vous pouvez entrer";
    } else if ($age >= 16 && $age < 18) {
        echo "Vous êtes presque majeur";
    } elseif ($age >= 14 && $age < 16) {
        echo "Vous êtes jeune";
    } elseif ($age >= 0 && $age < 14) {
        echo "Vous êtes trop jeune";
    } else {
        echo "Vous n'avez pas renseigné un age valide";
    }
    

     