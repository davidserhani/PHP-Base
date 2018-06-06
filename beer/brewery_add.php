<?php
require('partials/header.php');


 ?>

    <!-- Le contenu de la page -->
    <div class="container pt-5">
        <h1>Ajouter une brasserie</h1>

        <?php

        // On définis les variables pour éviter des "Notices" quand on les affichera dans le formulaire
        $name = null;
        $address = null;
        $city = null;
        $zip = null;
        $country = null;


        if (!empty($_POST)) {
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
                    INSERT INTO brewery (`name`, address, city, zip, country) VALUES (:name, :address, :city, :zip, :country)
                ');
                $query->bindValue(':name', $name, PDO::PARAM_STR);
                $query->bindValue(':address', $address, PDO::PARAM_STR);
                $query->bindValue(':city', $city, PDO::PARAM_STR);
                $query->bindValue(':zip', $zip, PDO::PARAM_STR);
                $query->bindValue(':country', $country, PDO::PARAM_STR);
                $query->execute();
                echo '<div class="alert alert-success">La brasserie a bien été ajoutée.</div>';
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


            <button class="btn btn-primary">Ajouter</button>
        </form>


    </div>

<?php

require('partials/footer.php');