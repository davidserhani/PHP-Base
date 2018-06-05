<?php
    $folder = __DIR__. '/../log';

    if (!is_dir($folder)) {
        mkdir($folder);
    }

    if ((isset($_GET['query']))) {
        $filename = $folder. '/search.log';

        $file = fopen($filename, 'a+');

        $query = $_GET['query'];
        $log = '[recherche] un utilisateur (' .$_SERVER['REMOTE_ADDR']. ') a cherché ' .$query. ' le ' .date('d/m/Y à H\hi').PHP_EOL;
        fwrite($file, $log);
        fclose($file);
    }

