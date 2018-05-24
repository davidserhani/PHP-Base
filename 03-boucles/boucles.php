<?php   
    for ($i = 10; $i > 0; $i--) {
        echo "$i <br />";
    }


    for ($i = 0; $i <= 100; $i++) {
        if ($i % 2 == 0) {
            echo $i;
        }
    }
    echo '<br/>';
    for ($i = 0; $i <= 100; $i++) {
        if ($i % 3 == 0) {
            echo 'Fizz <br/>';
        } elseif ($i % 5 == 0) {
            echo 'Buzz <br/>';
        } elseif ($i % 15 == 0) {
            echo 'FizzBuzz <br/>';
        } else {
            echo $i;
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




