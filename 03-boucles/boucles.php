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




