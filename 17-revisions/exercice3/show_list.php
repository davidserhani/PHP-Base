<?php

$db = new PDO('mysql:host=localhost;dbname=tvshow;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
]);

$query = $db->query('SELECT * FROM `show` ORDER BY released_at ASC');
$shows = $query->fetchAll();
?>

<table>
    <thead>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Cover</th>
        <th>Released At</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php
        foreach ($shows as $show) {
            echo '<tr>';
                echo '<td>' . $show['id'] . '</td>';
                echo '<td>' . $show['title'] . '</td>';
                echo '<td>' . $show['category'] . '</td>';
                echo '<td>' . $show['cover'] . '</td>';
                echo '<td>' . $show['released_at'] . '</td>';
                echo '<td><a href="show_single.php?id=' . $show['id'] . '">Voir le film</a></td>';
            echo '</tr>';
        } ?>
    </tbody>
</table>
