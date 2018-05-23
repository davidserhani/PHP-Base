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

    $nombre1 = 150;
    $nombre2 = 45;

    if ($nombre2 < $nombre1) {
        $reste = $nombre1 % $nombre2;
        while ($reste != 0) {
            $reste = $nombre1 % $nombre2;
            $nombre1 = $nombre2;
            $nombre2 = $reste;
        }
        echo $nombre2;
    } else {
        $reste = $nombre2 % $nombre1;
        while ($reste != 0) { 
            $reste = $nombre2 % $nombre1;   
            $nombre2 = $nombre1;
            $nombre1 = $reste;
        }
        echo $nombre1;
    }
