<?php

// Etablis la connexion entre PHP et MySQL
$db = new PDO('mysql:host=localhost;dbname=tvshow;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
]);

$title = null;
$category = null;
$cover = null;
$synopsis = null;
$date = null;
$errors = [];

if (!empty($_POST)) {
    $title = trim(strip_tags($_POST['title']));
    $category = trim(strip_tags($_POST['category']));
    $cover = trim(strip_tags($_POST['cover']));
    $synopsis = trim(strip_tags($_POST['synopsis']));
    $date = trim(strip_tags($_POST['released_at']));

    if (strlen($title) < 1) {
        $errors['title'] = 'Le titre est trop court.';
    }

    if (strlen($category) < 3) {
        $errors['category'] = 'La catégorie est trop court.';
    }

    if (strlen($synopsis) < 3) {
        $errors['synopsis'] = 'Le synopsis est trop court.';
    }

    if (!strtotime($date)) { // S'il a saisi toto
        $errors['date'] = 'La date n\'est pas valide.';
    }

    if (strtotime($date)) { // Si date valide, on vérifie qu'elle existe
        $month = date('n', strtotime($date)); // 2 -> février
        $day = date('j', strtotime($date)); // 29
        $year = date('Y', strtotime($date)); // 2001
        if (!checkdate($month, $day, $year)) {
            $errors['date'] = 'La date n\'est pas valide.';
        }
    }

    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO `show` (title, category, cover, synopsis, released_at) VALUES
        (:title, :category, :cover, :synopsis, :released_at)');
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':cover', $cover, PDO::PARAM_STR);
        $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
        $query->bindValue(':released_at', $date, PDO::PARAM_STR);
        if ($query->execute()) {
            echo 'La série a été ajoutée.';
        }
    }

    var_dump($_POST, $errors);
}

?>

<form action="" method="POST">
    <div>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">
        <?php echo $errors['title'] ?? ''; ?>
    </div>
    <div>
        <label for="category">Catégorie</label>
        <input type="text" name="category" id="category">
        <?php echo $errors['category'] ?? ''; ?>
    </div>
    <div>
        <label for="cover">Image</label>
        <input type="text" name="cover" id="cover">
        <?php echo $errors['cover'] ?? ''; ?>
    </div>
    <div>
        <label for="synopsis">Synopsis</label>
        <textarea name="synopsis" id="synopsis"></textarea>
        <?php echo $errors['synopsis'] ?? ''; ?>
    </div>
    <div>
        <label for="released_at">Date YYYY-MM-DD</label>
        <input type="date" name="released_at" id="released_at">
        <?php echo $errors['date'] ?? ''; ?>
    </div>
    <button>Ajouter la série</button>
</form>
