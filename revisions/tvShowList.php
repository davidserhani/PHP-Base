<?php
require __DIR__.'/partials/header.php';
$query = $db->query('SELECT * FROM `show` ORDER BY released_at ASC');
$shows = $query->fetchAll();
?>
    <div class="row">
<?php foreach ($shows as $show) : ?>

        <div class="col s12 m6">
            <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <span class="card-title"><?= $show['title'] ?></span>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="tvShowSingle.php?id=<?= $show['id'] ;?>"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <p><?= $show['released_at'] ?></p>
                </div>
            </div>
        </div>
<?php endforeach; ?>
    </div>





<?php
require __DIR__.'/partials/footer.php';

