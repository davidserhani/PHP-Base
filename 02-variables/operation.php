<?php
    $var1 = 15;
    $var2 = 5;
    $var3 = 8;

    $result1 = $var1 + $var2 + $var3;
    $result2 = $var1 * ($var2 - $var3);
    if ($var1 > 0) {
        $result3 = ($var3 - $var2) / $var1; 
    } else {
        $result3 = 'Divison par 0 impossible <br />';
    }

    echo "$var1 + $var2 + $var3 = $result1 <br />";
    echo "$var1 x ($var2 - $var3) = $result2 <br />";
    echo "($var3 - $var2) / $var1 = $result3 <br />";

    if ($result1 < 20 || $result2 < 20 || $result3 < 20) {
        echo 'une des opérations renvoie moins de 20 <br />';
    }

