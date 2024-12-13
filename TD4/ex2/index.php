<?php

$theme = "rien"; //défaut 
if (isset($_REQUEST["color"])) { //si le formulaire a été soumis
    $theme = $_REQUEST["color"]; //on récupère la valeur du champ color du formulaire
    setcookie("theme", $theme, time() + 24*3600); //on crée un cookie qui expire dans 24h
} else {
    if (isset($_COOKIE["theme"])) { //sinon si le cookie existe
        $theme = $_COOKIE["theme"]; //on récupère la valeur de la couleur du cookie
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo $theme ?>">
    <form method="POST" action="index.php">
        <select name="color">
            <option value="earth">Earth</option>
            <option value="fire">Fire</option>
            <option value="water">Water</option>
            <option value="air">Air</option>
        </select>
        <input type="submit">
    </form>
</body>
</html>