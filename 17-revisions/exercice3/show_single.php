<?php

$db = new PDO('mysql:host=localhost;dbname=tvshow;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
]);

function showExists($id) {
    global $db;
    $query = $db->prepare('SELECT * FROM `show` WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $show = $query->fetch();

    return $show;
}

if (empty($_GET['id']) || !$show = showExists($_GET['id'])) {
    http_response_code(404); // Renvoie une 404
}
?>

<h1><?php echo $show['title']; ?></h1>
<p>Catégorie : <?php echo $show['category']; ?></p>
<p>Cover : <?php echo $show['cover']; ?></p>
<p>Synopsis : <?php echo $show['synopsis']; ?></p>
<p>Sortie : <?php echo date('d/m/Y', strtotime($show['released_at'])); ?></p>
