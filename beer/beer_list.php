<?php
require (__DIR__ . '/partials/header.php');

$query = $db->query('SELECT * FROM beer');
$beers = $query->fetchAll();
?>

<section class="section">
    <div class="container">
        <h1 class="title">la liste des bières</h1>
        <div class="columns">
        <?php
        foreach ($beers as $beer) {
            echo '<div class="column">';
            echo '<div class="card">';
            echo '<div class="card-image">';
            echo '<figure class="image is-square">';
            echo '<img src="'.$beer['image'] . '" />';
            echo '</figure>';
            echo '<div class="card-content">';
            echo '<div class="media">';
            echo '<div class="media-content has-text-centered">';
            echo '<p class="subtitle is-6">' . $beer['name'] . '</p>';
            echo '<a class="button is-primary is-rounded" href="beer_single.php?=' . $beer['id'] . '">En savoir plus</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        </div>
    </div>
</section

<?php
require (__DIR__ . '/partials/footer.php');