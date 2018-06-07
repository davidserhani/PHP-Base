<?php
require('partials/header.php');
if (userIsLogged()) {
    header('Location: index.php');
    exit();
}
?>

    <div class="container">
        <h1>Inscription</h1>
        <?php
        if (!empty($_POST)) {
            $login = str_replace(' ', '',trim(strip_tags($_POST['login'])));
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $cfPassword = trim($_POST['cfPassword']);

            $errors = [];
            if (empty($login)) {
                $errors['login'] = 'Le login est valide';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'L\'email n\'est pas valide';
            }
            if (empty($password) OR $password != $cfPassword) {
                $errors['password'] = 'Problème du mot de passe et confirmation';
            }

            if (empty($errors)) {
                $query = $db->prepare('INSERT INTO user
                (login, email, password, created_at) VALUES
                (:login, :email, :password, NOW())');
                $query->bindValue(':login', $login, PDO::PARAM_STR);
                $query->bindValue(':email', $email, PDO::PARAM_STR);
                $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                if ($query->execute()) {
                    echo 'Vous êtes bien inscrit.';
                }
            }
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cfPassword">Confirmez le mot de passe</label>
                <input type="password" class="form-control" id="cfPassword" name="cfPassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>







<?php
require('partials/footer.php');
