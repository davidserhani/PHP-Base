<?php   
    for ($y = 10; $y > 0; $y--) {
        echo "$y <br />";
    }


    for ($y = 0; $y <= 100; $y++) {
        if ($y % 2 == 0) {
            echo $y;
        }
    }
    echo '<br/>';
    for ($y = 1; $y <= 100; $y++) {
        if ($y % 15 == 0) {
            echo 'FizzBuzz <br/>';
        } elseif ($y % 5 == 0) {
            echo 'Buzz <br/>';
        } elseif ($y % 3 == 0) {
            echo 'Fizz <br/>';
        } else {
            echo $y;
        }
    }

    echo '<br/>';

    $number1 = 845;
    $number2 = 312;
    $rest = null;
    $pgcd = null;


        while ($rest !== 0) {
            $pgcd = $number2;
            $rest = $number1 % $number2;
            $number1 = $number2;
            $number2 = $rest;
            if ($rest == 0) {
                echo $pgcd;
            }
        }
    echo '<br />';


    for ($x = 0; $x < 10; $x++) {

        for ($y = 10 ; $y > $x; $y --) {

            echo '🕋';
        }
        echo '<br />';
    }

    $start = 5;
    $size = 1;
    for ($y = 0; $y < 6; $y++) {
        for ($x = 0; $x < 11; $x++) {
            if ($x == $start) {
                for ($z = 0; $z < $size; $z++) {
                    echo '🕋';
                }
                $x += $size - 1;
            } else {
                echo '📖';
            }
        }
        $start--;
        $size += 2;
        echo '<br />';
    }

    echo '<table border="1" style="border-collapse: collapse">';
    echo '<thead><tr>';
    echo '<th style="width: 30px; height: 30px">X</th>';

    for ($head = 0; $head < 11; $head++) {
        echo '<th style="width: 30px; height: 30px">' . $head . '</th>';
    }
    echo '</tr></thead>';

    for ($line = 0; $line < 11; $line++) {
        echo '<tr/>';
        echo '<td align="center" style="width: 30px; height: 30px"><strong>' . $line . '</strong></td>';
        for ($column = 0; $column < 11; $column++) {
            echo  '<td style="width: 30px; height: 30px">' . $line * $column . '</td>';
        }
        echo '<tr />';
    }
    echo '</table>';
