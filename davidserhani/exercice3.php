<?php require_once 'db_config.php' ?>
<?php

$title = null;
$actors = null;
$director = null;
$producer = null;
$year_of_prod = null;
$language = null;
$category = null;
$storyline = null;
$video = null;



// je vérifie que le formulaire est soumis
if (!empty($_POST)) {
$title = $_POST['title'];
$actors = $_POST['actors'];
$director = $_POST['director'];
$producer = $_POST['producer'];
$year_of_prod = $_POST['year_of_prod'];
$language = $_POST['language'];
$category = $_POST['category'];
$storyline = $_POST['storyline'];
$video = $_POST['video'];

//je crée un tableau regroupant les erreurs
$errors = [];

//conditions de validation
if (strlen($title) < 4) {
    $errors['title'] = 'title is not valid.';
}
if (strlen($actors) < 4) {
    $errors['actors'] = 'actors are not valid.';
}
if (strlen($director) < 4) {
    $errors['director'] = 'director is not valid.';
}
if (strlen($storyline) < 4) {
    $errors['storyline'] = 'storyline is not valid.';
}
if (strlen($producer) < 4) {
    $errors['producer'] = 'producer is not valid.';
}
if (!filter_var($_POST['video'], FILTER_VALIDATE_URL)) {
    $errors['video'] = 'URL is not valid';
}

//je crée un tableau des années autorisés
// et je veirifie si l'année est présente ou non
    $allowedYears = ['2017', '2016', '2015', '2014', '2013', '2012'];
    if (!in_array($year_of_prod, $allowedYears)) {
        $errors['year_of_prod'] = 'Year is not valid.';
    }

//je fais la meme chose pour tous les champs select
    $allowedLanguage = ['French', 'English'];
    if (!in_array($language, $allowedLanguage)) {
        $errors['language'] = 'Language is not valid.';
    }

    $allowedCategory = ['Action', 'Horror', 'Thriller'];
    if (!in_array($category, $allowedCategory)) {
        $errors['category'] = 'Category is not valid.';
    }

    //si mon tableau d'erreur est vide je peux ajouter le film a la bdd
    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO
        movies (title, actors, director, producer, year_of_prod, `language`, category, storyline, video) VALUES
        (:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)
        ');
        $queryOK = $query->execute([
            ':title' => $title,
            ':actors' => $actors,
            ':director' => $director,
            ':producer' => $producer,
            ':year_of_prod' => $year_of_prod,
            ':language' => $language,
            ':category' => $category,
            ':storyline' => $storyline,
            ':video' => $video
        ]);
        if ($queryOK) {
            echo '<div class="alert alert-success">
                        Movie added successfully.
                    </div>';
        }
    }
    if ($errors) {
        echo '<div class="alert alert-danger">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }


}


?>

<?php require 'header.php' ?>

<h1>Add a movie</h1>
<form method="POST" action="">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control <?php echo isset($errors['title']) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>">
    </div>
    <div class="form-group">
        <label for="actors">Actors</label>
        <input type="text" name="actors" id="actors" class="form-control <?php echo isset($errors['actors']) ? 'is-invalid' : ''; ?>" value="<?php echo $actors; ?>">
    </div>
    <div class="form-group">
        <label for="director">Director</label>
        <input type="text" name="director" id="director" class="form-control <?php echo isset($errors['director']) ? 'is-invalid' : ''; ?>" value="<?php echo $director; ?>">
    </div>
    <div class="form-group">
        <label for="producer">Producer</label>
        <input type="text" name="producer" id="producer" class="form-control <?php echo isset($errors['producer']) ? 'is-invalid' : ''; ?>" value="<?php echo $producer; ?>">
    </div>
    <div class="form-group">
        <label for="year_of_prod">Year of production</label>
        <select name="year_of_prod" id="year_of_prod" class="form-control">
            <option>Choose a year</option>
            <option <?php echo ($year_of_prod == '2017') ? 'selected' : ''; ?>>2017</option>
            <option <?php echo ($year_of_prod == '2016') ? 'selected' : ''; ?>>2016</option>
            <option <?php echo ($year_of_prod == '2015') ? 'selected' : ''; ?>>2015</option>
            <option <?php echo ($year_of_prod == '2014') ? 'selected' : ''; ?>>2014</option>
            <option <?php echo ($year_of_prod == '2013') ? 'selected' : ''; ?>>2013</option>
            <option <?php echo ($year_of_prod == '2012') ? 'selected' : ''; ?>>2012</option>
        </select>
    </div>
    <div class="form-group">
        <label for="language">Language</label>
        <select name="language" id="language" class="form-control">
            <option>Choose a language</option>
            <option <?php echo ($language == 'French') ? 'selected' : ''; ?>>French</option>
            <option <?php echo ($language == 'English') ? 'selected' : ''; ?>>English</option>
        </select>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            <option>Choose a category</option>
            <option <?php echo ($category == 'Action') ? 'selected' : ''; ?>>Action</option>
            <option <?php echo ($category == 'Horror') ? 'selected' : ''; ?>>Horror</option>
            <option <?php echo ($category== 'Thriller') ? 'selected' : ''; ?>>Thriller</option>
        </select>
    </div>
    <div class="form-group">
        <label for="storyline">Storyline</label>
        <input type="text" name="storyline" id="storyline" class="form-control <?php echo isset($errors['storyline']) ? 'is-invalid' : ''; ?>" value="<?php echo $storyline; ?>">
    </div>
    <div class="form-group">
        <label for="video">Video</label>
        <input type="text" name="video" id="video" class="form-control <?php echo isset($errors['video']) ? 'is-invalid' : ''; ?>" value="<?php echo $video; ?>">
    </div>
    <button class="btn btn-primary">Add</button>
</form>

<?php require 'footer.php' ?>
