<?php
require __DIR__.'/partials/header.php';
?>
<?php
function showExists($id) {
    global $db;
    $query = $db->prepare('SELECT * FROM `show` WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $show = $query->fetch();
    return $show;
}
if (empty($_GET['id']) OR !$show = showExists($_GET['id'])) {
    http_response_code(404);

}
?>

<h1><?php echo $show['title'];?></h1>
<div class="col s12 m8 offset-m2 l6 offset-l3">
    <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row valign-wrapper">
            <div class="col s2">
                <img src="images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ducimus est impedit iure minima placeat quam? Amet assumenda consequuntur ea eum impedit, incidunt maxime minima, minus mollitia perferendis sequi veniam.</span><span>Ad adipisci asperiores autem consequuntur dolorem, est explicabo libero magnam nam nobis non reprehenderit voluptate, voluptatum. Adipisci, amet architecto consequuntur corporis debitis eos incidunt iste, modi, molestias perspiciatis possimus quis.
              </span>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__.'/partials/footer.php';

