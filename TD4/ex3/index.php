<?php
$nom = " ";
$prenom = " ";
$mail = " ";
$postal = " ";

if (isset($_REQUEST['valider'])) {
    setcookie("formulaire", serialize($_REQUEST), time() + 3600*4*27);
    die("Merci d'avoir rempli le formulaire");
}

if (isset($_COOKIE['formulaire'])) {
    $formulaire = unserialize($_COOKIE['formulaire']);
    $nom = $formulaire['nom'];
    $prenom = $formulaire['prenom'];
    $mail = $formulaire['mail'];
    $postal = $formulaire['postal'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST" action = "index.php">
        <input type="text" name="nom" placeholder = "Nom" value = "<?php echo $nom ?>"><br><br>
        <input type="text" name="prenom" placeholder = "Prénom" value = "<?php echo $prenom ?>"><br><br>
        <input type="text" name="mail" placeholder = "Adresse mail" value = "<?php echo $mail ?>"><br><br>
        <input type="text" name="postal" placeholder = "Code postal" value = "<?php echo $postal ?>"><br><br>
        <input type="submit" name="valider">
    </form>    
</body>
</html>