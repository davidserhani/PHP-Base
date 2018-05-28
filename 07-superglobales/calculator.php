<form method="post" action="calculator.php">

    <fieldset>
        <legend>Hauts de France Instrument</legend>
        <label for="number1"></label>
        <input type="text" placeholder="Enter a number" name="number1" id="nombre1">
        <label for="number2"></label>
        <input type="text" placeholder="Enter a number" name="number2" id="nombre2">
        <div>
            <input type="radio" name="calculator" value="add">
            <label for="add">➕</label>
            <input type="radio" name="calculator" value="min">
            <label for="min">➖</label>
            <input type="radio" name="calculator" value="mult">
            <label for="mult">✖</label>
            <input type="radio" name="calculator" value="div">
            <label for="div">➗</label>
        </div>
        <button>Calculate</button>
    </fieldset>
</form>

<?php
var_dump($_POST);
if (!empty($_POST)) {
    $value1 = $_POST['number1'];
    $value2 = $_POST['number2'];
    $calc = $_POST['calculator'];
    $result = 0;
    if (!is_numeric($value1) || !is_numeric($value2)) {
        echo "Les nombres saisis ne sont pas valide";
        exit();
    }


    switch ($calc) {
        case "add":
            $result = $value1 + $value2;
            break;
        case "min":
            $result = $value1 - $value2;
            break;
        case "mult":
            $result = $value1 * $value2;
            break;
        case "div":
            if ($value2 != 0) {
                $result = $value1 / $value2;
            } else {
                echo "division par 0 impossible";
            }
    }
    echo $result;
}

?>