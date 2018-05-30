<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
<?php
$db = new PDO('mysql:host=localhost;dbname=movie_catalog;charset=UTF8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
//var_dump($db);

$query = $db->query('SELECT * FROM movie');
//var_dump($query);

//$movie = $query->fetch();
$movies = $query->fetchAll();
//var_dump($smovies);
echo '<ul>';
foreach ($movies as $movie) {
    echo '<li>' . $movie['name'] . ', ' . $movie['date'] . '</li>';
}
echo '</ul>';
?>
    </body>
    </html>