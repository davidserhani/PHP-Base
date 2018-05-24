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

    $number1 = 1000;
    $number2 = 50;

    if ($number2 < $number1) {
        $rest = $number1 % $number2;
        while ($reste != 0) {
            $rest = $nombre1 % $nombre2;
            $number1 = $number2;
            $number2 = $rest;
        }
        echo $number2;
    } else {
        $rest = $number2 % $number1;
        while ($reste != 0) { 
            $rest = $number2 % $number1;
            $number2 = $number1;
            $number1 = $rest;
        }
        echo $number1;
    }

