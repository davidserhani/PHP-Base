<?php
    if (!isset($_GET['query']) || empty($_GET['query'])) {
        header('Location: beer_list.php');
        exit();
    }
    require('partials/header.php');

?>

<div class="jumbotron">
    <div class="container">

        <h1 class="display-4">Résultat de votre recherche pour :</h1>
        <p class="lead">

        </p>
        <hr class="my-4">
        <?php
        $query = $_GET['query'];
        echo sprintf('<p class="lead"> %s</p>', $query);
        $SQLquery = $db->prepare('SELECT * FROM beer WHERE `name` LIKE :query');
        $SQLquery->bindValue(':query', '%' .$query. '%', PDO::PARAM_STR);
        $SQLquery->execute();
        $beers = $SQLquery->fetchAll();

        ?>
    </div>
</div>


<div class="container">
    <div class="row pt-4">
        <?php
        // On affiche la liste des bières
        foreach ($beers as $beer) {
            echo '<div class="col-md-3">';
            echo '<div class="card mb-4 box-shadow">';
            echo '<img class="beer-img d-block card-img-top" src="'.$beer['image'].'" />';
            echo '<div class="card-body">';
            echo '<p class="text-center font-weight-bold">';
            echo $beer['name'];
            echo '</p>';
            // Ajouter un bouton (a href) "Voir la bière"
            // Quand on clique sur le bouton, on doit se rendre sur la page beer_single.php
            // Créer la page beer_single.php
            // Il faudrait que l'URL ressemble à beer_single.php?id=IDDELABIERE
            echo '<a href="beer_single.php?id='.$beer['id'].'" class="btn btn-primary btn-block">Voir la bière</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } ?>
    </div>
</div>






<?php
    require ('utils/logs.php');
    require('partials/footer.php');
