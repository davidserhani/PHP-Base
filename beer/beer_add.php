<?php
require (__DIR__ . '/partials/header.php');
?>

<h1 class="title has-text-centered">Ajouter une bière</h1>

<?php
$name = null;
$degree= null;
$price = null;
$volum = null;
$brand = null;
$type = null;

if (!empty($_POST)) {
    foreach ($_POST as $key => $field) {
        $$key = $field;
    }
}
?>

    <form action="" method="post">
        <?php
        $fields = ['name' => 'Nom', 'degree' => 'Degré', 'price' => 'prix'];
        foreach ($fields as $field => $label) { ?>
            <div class="field">
            <label for="<?php echo $field; ?>" class="label"><?php echo $label; ?></label>
            <div class="control">
                <input class="input" type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" value="<?php echo $$field; ?>">
            </div>
        </div>
        <?php
        }
        ?>

        <div class="field">
            <label class="label">Taille</label>
            <div class="control">
                <div class="select">
                    <select>
                        <option hidden value="">Choisir le volume</option>
                        <option  value="250">25 cl</option>
                        <option  value="330">33 cl</option>
                        <option  value="750">75 cl</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label for="type" class="label">Type</label>
            <input id="type" class="input" list="type-list" name="type" type="text">
            <datalist id="type-list" class="control">
                <option value="Blonde - 1"></option>
                <option value="Brune - 2"></option>
                <option value="Ambrée - 3"></option>
                <option value="Noire - 4"></option>
            </datalist>
        </div>
        <div class="field">
            <label for="brand" class="label">Marque</label>
            <input id="brand" class="input" list="brands" name="brand" type="text">
            <datalist id="brands" class="control">
                <option value="Guiness - 4"></option>
                <option value="Chimay - 1"></option>
                <option value="Duvel - 2"></option>
                <option value="Kwak - 3"></option>
                <option value="Ch'ti -5"></option>
            </datalist>
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
        </div>
        <?php
        if (!empty($_POST)) {
            $errors = [];
            if (strlen($name) <= 3) {
                $errors['name'] = 'Veuillez saisir à nouveau le nom de la bière (celui ci doit comporter au moins 3 caractères)';
            }
            if (!is_numeric($degree) || $degree > 0 || $degree > 20) {
                $errors['degree'] = 'Le degré n\'est pas valide';
            }
            if ($price < 0 || $price > 100) {
                $errors['price'] = 'Le prix n\'est pas valide';
            }
            if (!in_array($volum, [250, 330, 750])) {
                $errors['volum'] = 'Le volum n\'est pas valide';
            }

        }
        ?>
    </form>
















<?php
require (__DIR__ . '/partials/footer.php');