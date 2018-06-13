<?php require_once 'db_config.php' ?>

<?php

//je crée une fonction pour vérifier l'existence de l'id
function movieExists($id) {
    global $db;
    $query = $db->prepare('SELECT * FROM movies WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $movie = $query->fetch();
    return $movie;
}

// je recupère l'id du movie dans l'URL
$id = $_GET['id'];

if (empty($_GET['id']) || !$movie = movieExists($_GET['id'])) {
    http_response_code(404);
}

?>

<?php require 'header.php' ?>
<h1>Movie</h1>
<div class="row">
    <div class="col-sm-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Title : <?php echo $movie['title']; ?></li>
            <li class="list-group-item">Actors : <?php echo $movie['actors']; ?></li>
            <li class="list-group-item">Director : <?php echo $movie['director']; ?></li>
            <li class="list-group-item">Producer : <?php echo $movie['producer']; ?></li>
            <li class="list-group-item">Year of production : <?php echo $movie['year_of_prod']; ?></li>
            <li class="list-group-item">Producer : <?php echo $movie['language']; ?></li>
            <li class="list-group-item">Producer : <?php echo $movie['category']; ?></li>
            <li class="list-group-item">Producer : <?php echo $movie['storyline']; ?></li>
            <li class="list-group-item">Producer : <?php echo $movie['video']; ?></li>
        </ul>
    </div>
</div>







<?php require 'footer.php' ?>
