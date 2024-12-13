<?php
$nom = " ";
$prenom = " ";
/*
if (isset($_COOKIE['formulaire'])) {
    $formulaire = unserialize($_COOKIE['formulaire']);
    $nom = $formulaire['nom'];
    $prenom = $formulaire['prenom'];
}else{
    header("Location: whoareyou.php"); //b)
}*/
if (isset($_SESSION['nom']) && !empty($_SESSION['nom'])){
    if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])){
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
    }else{
        header("Location: whoareyou.php"); //b)
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <span>Bonjour <?php echo $nom . ' ' . $prenom ?></span>
    <a href="page2.php">Continuer</a>
</body>
</html>