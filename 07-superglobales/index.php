<?php

//$_GET
    var_dump($_GET);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id == 5) {
            echo 'utilisateur 5';
        }
    }


    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "hello {$name}";
    }

//$_POST
var_dump($_POST);
?>

    <form method="POST" action="index.php">
        <label for="age"></label>
        <input name="age" placeholder="Entrer votre âge"/>
        <button>Envoyer</button>
    </form>



