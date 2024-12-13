<?php
session_start();
date_default_timezone_set('Europe/Paris');

$counterName = $_SERVER['REQUEST_URI'];
$count = 1;

if (isset($_SESSION['stat']) == false) {
    header("Location: accueil.php");
    die();
}
else {
    $all = $_SESSION['stat'];
    $timestamp = $all['timestamp'];
    if (isset($all[$counterName])==false){
        $all[$counterName] = 0; 
    }
    $count=$all[$counterName]+1;
    $all[$counterName] = $count;
    $_SESSION['stat'] = $all;
}
$debut = date("H:i:s", $timestamp);
$elapsed = time() - $timestamp;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 3</title>
</head>
<body>
    <h1>Page 3</h1>
    <div> 
        <span>Votre visite sur notre site a débuté à <?php echo $debut ?></span><br>
        <span>Vous naviguez sur notre site depuis <?php echo $elapsed ?> secondes</span> <br>
        <span>Vous avez visité cette page <?php echo $count ?> fois</span>
    </div>
    <br>
    <a href="accueil.php">Accueil</a><br>
    <a href="page2.php">Page 2</a><br>
    <a href="page4.php">Page 4</a><br>
</body>
</html>