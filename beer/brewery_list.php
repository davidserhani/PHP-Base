<?php
require('partials/header.php');
?>
<?php
$query = $db->query('SELECT * FROM brewery');
$breweries = $query->fetchAll();


?>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">nom</th>
            <th scope="col">adresse</th>
            <th scope="col">ville</th>
            <th scope="col">code postal</th>
            <th scope="col">pays</th>
            <th>plus</th>
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
            <td><a href="brewery_single.php?id=<?php echo $brewery['id'] ?>"><span class="badge badge-warning badge-pill">En savoir plus</span></a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php
require('partials/footer.php');
