<?php
require('partials/header.php');


if (empty($_GET['id']) OR !$brewery = breweryExists($_GET['id'])) {
    header('HTTP/1.0 404 Not Found');
    ?>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark text-center">
            <div>
                <h1 class="display-4 font-italic">404</h1>
                <p class="lead my-3">Oops!</p>
                <button class="btn btn-outline-warning"><a href="index.php" class="text-white font-weight-bold">Retourner à l'Accueil...</a></button>
            </div>
        </div>
    </div>
    <?php
    require('partials/footer.php');
    exit;
}

?>

    <!-- Le contenu de la page -->
    <div class="container pt-5">
        <h1>Modifier <?php echo $brewery['name']; ?></h1>

        <?php

        // On définis les variables pour éviter des "Notices" quand on les affichera dans le formulaire
        $name = $brewery['name'];
        $address = $brewery['address'];
        $city = $brewery['city'];
        $zip = $brewery['zip'];
        $country = $brewery['country'];
        $id = $brewery['id'];


        if (!empty($_POST)) {
            $id = $brewery['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $country = $_POST['country'];
            foreach ($_POST as $key => $field) {
                $$key = $field;
            }
        }
        ?>
        <?php


        if (!empty($_POST)) {
            // Définir un tableau d'erreur vide qui va se remplir après chaque erreur
            $errors = [];

            // $name doit faire au moins 3 caractères
            if (strlen($name) < 3) {
                $errors['name'] = 'Le nom n\'est pas valide';
            }
            if (strlen($address) < 10) {
                $errors['address'] = 'L\'adresse n\'est pas valide';
            }
            if (strlen($city) < 3) {
                $errors['city'] = 'La ville n\'est pas valide';
            }
            if (strlen($zip) < 1 OR strlen($zip) > 5) {
                $errors['zip'] = 'Le code postale n\'est pas valide'; // équivaut à array_push($errors, 'Le nom n\'est pas valide');
            }


            if (!in_array($country, ['France', 'Belgique', 'Royaume-Uni', 'Irelande', 'Allemagne'])) {
                $errors['country'] = 'Le pays n\'est pas valide';
            }


            // S'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
                $query = $db->prepare('
                    UPDATE brewery SET `name` = :name, address = :address, city = :city, zip = :zip, country = :country WHERE id = :id
                ');
                $query->bindValue(':id', $id, PDO::PARAM_INT );
                $query->bindValue(':name', $name, PDO::PARAM_STR);
                $query->bindValue(':address', $address, PDO::PARAM_STR);
                $query->bindValue(':city', $city, PDO::PARAM_STR);
                $query->bindValue(':zip', $zip, PDO::PARAM_STR);
                $query->bindValue(':country', $country, PDO::PARAM_STR);
                $query->execute();
                echo '<div class="alert alert-success">La brasserie a bien été modifiée.</div>';
            }
        }

        ?>
        <form method="POST" enctype="multipart/form-data" action="">
            <?php
            $fields = ['name' => 'Nom', 'address' => 'Adresse', 'city' => 'Ville', 'zip' => 'Code Postal']; // Les champs du formulaire à afficher
            foreach ($fields as $field => $label) { ?>
                <div class="form-group">
                    <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                    <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control <?php echo isset($errors[$field]) ? 'is-invalid' : null; ?>" value="<?php echo $$field; ?>">
                    <?php if (isset($errors[$field])) {
                        echo '<div class="invalid-feedback">';
                        echo $errors[$field];
                        echo '</div>';
                    } ?>
                </div>
            <?php }  ?>





            <div class="form-group">
                <label for="country">Pays</label>
                <select class="form-control <?php echo isset($errors['name']) ? 'is-invalid': null; ?>" id="country" name="country">
                    <option hidden value="">Choisissez le pays</option>
                    <option <?php if ($country == 'France') { echo 'selected'; } ?> value="France">France</option>
                    <option <?php echo ($country == 'Belgique') ? 'selected' : ''; ?> value="Belgique">Belgique</option>
                    <option <?php if ($country == 'Royaume-uni') { echo 'selected'; } ?> value="Royaume-uni">Royaume-uni</option>
                    <option <?php if ($country == 'Irelande') { echo 'selected'; } ?> value="Irelande">Irelande</option>
                    <option <?php if ($country == 'Allemagne') { echo 'selected'; } ?> value="Allemagne">Allemagne</option>
                </select>
                <?php if (isset($errors['country'])) {
                    echo '<div class="invalid-feedback">';
                    echo $errors['country'];
                    echo '</div>';
                } ?>
            </div>


            <button class="btn btn-primary">Modifier</button>
        </form>


    </div>

<?php

require('partials/footer.php');