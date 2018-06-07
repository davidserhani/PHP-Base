<?php
require('partials/header.php');
?>



<?php
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $db->prepare('SELECT * FROM user WHERE email = :email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        $error = null;

        if (!$user) {
            $error = 'Le login n\existe pas.';
        }
        if ($user AND !password_verify($password, $user['password'])) {
            $error = 'Le mot de passe n\'est pas correct.';
        }

        if (!$error) {
            $token = hash('sha256', $user['id'].$user['password'].$user['created_at']);
            unset($user['password']);
            $_SESSION['user'] = $user;
            if (isset($_POST['rememberMe'])) {
                setcookie('id', $user['id'], time() + 60 * 90 * 24 *365);
                setcookie('token', $token, time() + 60 * 90 * 24 *365);
            }

            header('Location:'.$_GET['referer']);
            exit();
        }
//        var_dump($error);
    }

?>

    <div class="container pt-5">
        <h1>Se connecter</h1>
        <form method="post" action="?referer=<?php echo $_SERVER['HTTP_REFERER'] ?? 'index.php'; ?>">
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




<?php
require('partials/footer.php');
