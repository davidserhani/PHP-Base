<?php
require (__DIR__ . '/partials/header.php');

$id = $_GET['id'];
$query = $db->prepare('SELECT * FROM beer WHERE id = :id');
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$beer = $query->fetch();

$query = $db->query('SELECT * FROM brand WHERE id = ' . $beer['brand_id']);
$brand = $query->fetch();

$query = $db->prepare('SELECT * FROM ebc WHERE id = :id');
$query->bindValue(':id', $beer['ebc_id'], PDO::PARAM_INT);
$query->execute();
$ebc = $query->fetch();

?>

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                <?php
                    echo $beer['name'];
                ?>
            </h1>
            <h2 class="subtitle has-text-dark">
                <?php
                    echo $brand['name'];
                ?>
            </h2>
            <div class="columns">
                <div class="column">
                    <figure class="image image is-square">
                        <img src="<?php echo $beer['image']; ?>" alt="<?php echo $beer['name']; ?>">
                    </figure>
                </div>
                <div class="column">
                    <div class="field is-grouped is-grouped-multiline">
                        <div class="control">
                    <div class="tags has-addons">
                        <span class="tag is-light">Degré</span>
                        <span class="tag is-success"><?php echo $beer['degree']; ?></span>
                    </div>
                        </div>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-light">Volume</span>
                                <span class="tag is-success"><?php echo $beer['volum']; ?></span>
                            </div>
                        </div>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-light">Prix</span>
                                <span class="tag is-success"><?php echo $beer['price']; ?></span>
                            </div>
                        </div>
                        <div class="control">
                            <div class="tags has-addons">
                                <?php
                                $type = null;
                                switch ($ebc['code']) {
                                    case 4:
                                        $type = 'Blonde';
                                        break;
                                        case 26:
                                            $type = 'Brune';
                                            break;
                                        case 39:
                                            $type = 'Ambrée';
                                            break;
                                        case 57:
                                            $type = 'Noire';
                                            break;
                                }
                                ?>
                                <span class="tag is-light"><?php echo $type; ?></span>
                                <span class="tag is-success" style="background-color: #<?php echo $ebc['color']; ?>"></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<?php
require (__DIR__ . '/partials/footer.php');
?>