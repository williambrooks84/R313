<?php
date_default_timezone_set('Europe/Paris');

$counterName = $_SERVER['REQUEST_URI'];
$count = 1;

if (isset($_COOKIE['stat']) == false) {
    header("Location: accueil.php");
    die();
}
else {
    $all = unserialize($_COOKIE['stat']);
    $timestamp = $all['timestamp'];
    if (isset($all[$counterName])==false){
        $all[$counterName] = 0; 
    }
    $count=$all[$counterName]+1;
    $all[$counterName] = $count;
    setcookie("stat", serialize($all));
}
$debut = date("H:i:s", $timestamp);
$elapsed = time() - $timestamp;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 4</title>
</head>
<body>
    <h1>Page 4</h1>
    <div> 
        <span>Votre visite sur notre site a débuté à <?php echo $debut ?></span><br>
        <span>Vous naviguez sur notre site depuis <?php echo $elapsed ?> secondes</span> <br>
        <span>Vous avez visité cette page <?php echo $count ?> fois</span>
    </div>
    <br>
    <a href="accueil.php">Accueil</a><br>
    <a href="page2.php">Page 2</a><br>
    <a href="page3.php">Page 3</a><br>
</body>
</html>