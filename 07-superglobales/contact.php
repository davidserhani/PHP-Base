<?php
$topic = null;
$about = null;
$email = null;

if (!empty($_POST)) {
    $topic = $_POST['topic'];
    $about = $_POST['about'];
    $email = $_POST['mail'];
}
?>

<form method="post" action="contact.php">

    <fieldset>
        <legend>Hauts de France Instrument</legend>
        <label for="mail"></label>
        <input type="text" placeholder="Enter your email" name="mail" id="mail" value="<?php echo $email ?>"><br>
        <label for="number2"></label>
        <input type="text" placeholder="topic" name="topic" id="topic" value="<?php echo $topic ?>"><br>
        <textarea name="about" placeholder="you can write here" cols="25" rows="5" id="about"><?php echo $about ?></textarea><br>
        
        <button>Envoyer</button>
    </fieldset>
</form>

<?php

    if (!empty($_POST)) {
        $isValid = true;

        if (empty($topic)) {
            $isValid = false;
            exit("Topic should not be empty");
        }

        if (strlen($about) < 15) {
            $isValid = false;
            exit("Description is not long enougth");
        }

        if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            exit("Email not valid");
        }

        if ($isValid) {
            echo "Le formulaire a bien été envoyé .";
        }
    }
