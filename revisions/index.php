<?php

setlocale(LC_TIME, 'fr');
$contacts = [
    [
        'name' =>'Auguste Fréchette',
        'birthday' => '30 november 1942',
        'zip' => '92190',
        'city' => 'MEUDON',
        'phone' => '01.22.88.26.88'
        ],
    [
        'name' =>'Algernon Duranseau',
        'birthday' => ' 2 november 1966',
        'zip' => '91190',
        'city' => 'GIF-SUR-YVETTE',
        'phone' => '01.80.31.88.75'
    ],
    [
        'name' =>'Armand Duplessis',
        'birthday' => '9 july 1953',
        'zip' => '77380',
        'city' => 'COMBS-LA-VILLE',
        'phone' => '01.07.46.25.64'
    ],
    [
        'name' =>'Zacharie LaGrande',
        'birthday' => '27 february 1990',
        'zip' => '80090',
        'city' => 'AMIENS',
        'phone' => '03.02.52.82.94'
    ]
];
?>
<?php
function degree($temp, $x) {
    if ($x == 'F') {
        $temps = $temp;
        $convert = round(($temps * (9 / 5) + 32));
        $temp = $convert;
    } else {
        $temps = $temp;
        $convert = round((($temps - 32) * (5 / 9)));
        $temp = $convert;
    }

    if ( $temp < 0) {
        echo 'Il fait très froid. ' .$temps. ' équivaut à ' .$temp. '.';
    } elseif ($temp <= 14) {
        echo 'C\'est le nooord. ' .$temps. ' équivaut à ' .$temp. '.';
    } elseif ($temp <= 25) {
        echo 'Il fait bon. ' .$temps. ' équivaut à ' .$temp. '.';
    } else {
        echo 'Il fait trop chaud. ' .$temps. ' équivaut à ' .$temp. '.';
    }

}
?>
<?php require  __DIR__.'/partials/header.php' ?>
<?php

$title = null;
//$cover = null;
$category = null;
$synopsis = null;
$released_at = null;
$errors = [];
if (!empty($_POST)) {

    $title = trim(strip_tags($_POST['title']));
//    $cover = $_POST['cover'];
    $category = trim(strip_tags($_POST['category']));
    $synopsis = trim(strip_tags($_POST['synopsis']));
    $released_at = trim(strip_tags($_POST['released_at']));

    if (strlen($title) < 1) {
        $errors['title'] = 'title is not valid';
    }
    if (strlen($category) < 3) {
        $errors['category'] = 'category is not valid';
    }
    if (strlen($synopsis) < 3) {
        $errors['synopsis'] = 'synopsis is not valid';
    }
    if(!strtotime($released_at)) {
        $errors = 'invalid date';
    }
    if (strtotime($released_at)) {
        $month = date('n', strtotime($released_at));
        $day = date('j', strtotime($released_at));
        $year = date('Y', strtotime($released_at));
        if (!checkdate($month, $day, $year)) {
            $errors['released_at'] ='invalid date';
        }
    }

    if (empty($errors)) {
        $query = $db->prepare('
        INSERT INTO `show` (title, category, synopsis, released_at) 
        VALUES (:title, :category, :synopsis, :released_at)
        ');
        $query->bindValue(':title', $title, PDO::PARAM_STR);
//        $query->bindValue(':cover', $cover, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
        $query->bindValue(':released_at', $released_at, PDO::PARAM_STR);
        $queryOK = $query->execute();
        echo '<div class="alert alert-success">TV Show added</div>';
    }
}


?>

<h1>Révisions</h1>
<br>
    <h2>exo1</h2>
<?php
foreach ($contacts as $contact) {

    $age = floor((time() - strtotime($contact['birthday'])) / 31556926);
    echo $contact['name'] . ' est né le ' . utf8_encode(strftime("%A %d %B %Y.", strtotime($contact['birthday']))) . 'il a ' . $age . '. Il habite à ' . ucwords(strtolower($contact['city']), '- ') . '( ' . $contact['zip'] . ' ). Il est joignable au ' . str_replace('.', ' ', $contact['phone']) . '.';
    echo '<br>';
}
?>
<br>
    <h2>exo2</h2>
<?= degree(27, 'F');?>
<br>
<?= degree(41,'C');?>
<br>
    <h2>exo3</h2>


<div class="container">
    <br>
    <h3>add a tv Show</h3>
    <div class="row">
        <form method="post" class="col s12" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s6">
                    <input id="title" name="title" type="text" class="validate <?php echo isset($errors['title']) ? 'invalid' : null; ?>" value="<?php echo $title; ?>">
                    <label for="title">Title*</label>
                    <?php if (isset($errors['title'])) {
                        echo '<div class="invalid-feedback">';
                        echo $errors['title'];
                        echo '</div>';
                    } ?>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>add a Cover</span>
                        <input type="file" name="cover">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="category" name="category" type="text" class="validate <?php echo isset($errors['category']) ? 'invalid' : null; ?>" value="<?php echo $category; ?>">
                    <label for="category">Category*</label>
                    <?php if (isset($errors['name'])) {
                        echo '<div class="invalid-feedback">';
                        echo $errors['name'];
                        echo '</div>';
                    } ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="synopsis" name="synopsis" class="materialize-textarea <?php echo isset($errors['synopsis']) ? 'invalid' : null; ?>" value="<?php echo $synopsis; ?>"></textarea>
                    <label for="synopsis">Synopsis*</label>
                    <?php if (isset($errors['name'])) {
                        echo '<div class="invalid-feedback">';
                        echo $errors['name'];
                        echo '</div>';
                    } ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="date" id="date" name="released_at" class="datepicker <?php echo isset($errors['released_at']) ? 'invalid' : null; ?>" value="<?php echo $released_at; ?>">
                    <label for="date">Release date*</label>
                    <?php if (isset($errors['name'])) {
                        echo '<div class="invalid-feedback">';
                        echo $errors['name'];
                        echo '</div>';
                    } ?>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php' ?>
