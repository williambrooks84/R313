<?php

session_start();

$nom = " ";
$prenom = " ";

if (isset($_SESSION['nom']) && !empty($_SESSION['nom'])){
    $nom = $_SESSION['nom'];
}

if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])){
    $prenom = $_SESSION['prenom'];
}

if (isset($_REQUEST['nom']) && !empty($_REQUEST['nom'])){
    $nom = $_REQUEST['nom'];
    $_SESSION['nom'] = $nom;
}

if (isset($_REQUEST['prenom']) && !empty($_REQUEST['prenom'])){
    $prenom = $_REQUEST['prenom'];
    $_SESSION['prenom'] = $prenom;
}

if (isset($_REQUEST['valider'])) {
    header("Location: session.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who are you?</title>
</head>
<body>
<form method = "POST" action = "whoareyou.php">
        <input type="text" name="nom" placeholder = "Nom" value = "<?php echo $nom ?>"><br><br>
        <input type="text" name="prenom" placeholder = "Prénom" value = "<?php echo $prenom ?>">
        <input type="submit" name="valider">
    </form>   
</body>
</html>