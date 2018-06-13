<?php require_once 'db_config.php' ?>

<?php require 'header.php' ?>

<?php
$query = $db->query('SELECT * FROM movies ORDER BY year_of_prod ASC');
$movies = $query->fetchAll();
?>
<h1>Movies</h1>
<table>
    <thead>
    <th>Title</th>
    <th>Director</th>
    <th>Year of production</th>
    </thead>
    <tbody>
    <?php
    foreach ($movies as $movie) {
        echo '<tr>';
        echo '<td>' . $movie['title'] . '</td>';
        echo '<td>' . $movie['director'] . '</td>';
        echo '<td>' . $movie['year_of_prod'] . '</td>';
        echo '<td><a href="movie_single.php?id=' . $movie['id'] . '">More informations</a></td>';
        echo '</tr>';
    } ?>
    </tbody>
</table>

<?php require 'footer.php' ?>
