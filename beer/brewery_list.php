<?php
require('partials/header.php');

?>

<?php
$query = $db->query('SELECT * FROM brewery');
$breweries = $query->fetchAll();


?>
<div class="container">
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">nom</th>
            <th scope="col">adresse</th>
            <th scope="col">ville</th>
            <th scope="col">code postal</th>
            <th scope="col">pays</th>
            <th class="text-center">. . .</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($breweries as $brewery): ?>

            <tr>
            <th scope="row"><?php echo $brewery['name']; ?></th>
            <td><?php echo $brewery['address']; ?></td>
            <td><?php echo $brewery['city']; ?></td>
            <td><?php echo $brewery['zip']; ?></td>
            <td><?php echo $brewery['country']; ?></td>
            <td class="text-center">
                <a href="brewery_single.php?id=<?php echo $brewery['id'] ?>"><span class="badge badge-warning badge-pill">En savoir plus</span></a>
                <?php if (userIsLogged()) {
                    echo '<a href="brewery_edit.php?id='.$brewery['id'].'"><span class="badge badge-info">Modifier</span></a>';
                    echo '<a href="brewery_delete.php?id='.$brewery['id'].'"><span class="badge badge-danger confirm-delete">Supprimer</span></a>';
                } ?>
            </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php
require('partials/footer.php');
