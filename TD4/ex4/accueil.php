<?php
date_default_timezone_set('Europe/Paris');

/*if (isset($_COOKIE['page count'])){
    $count = (int)$_COOKIE['page count']+1;
    setcookie("page_count", $count, time() + 3600 * 24);
} else {
    $count = 1;
    setcookie("page_count", $count, time() + 3600 * 24);
}*/

$counterName = $_SERVER['REQUEST_URI'];
$count = 1;

if (isset($_COOKIE['stat']) == false) {
    $timestamp = time();
    $all = [
        "timestamp" => $timestamp,
        $counterName => $count,
    ];
    setcookie("stat", serialize($all));
}
else {
    $all = unserialize($_COOKIE['stat']);
    $timestamp = $all['timestamp'];
    $count = $all[$counterName] + 1;
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
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <div> 
        <span>Votre visite sur notre site a débuté à <?php echo $debut ?></span> <br>
        <span>Vous naviguez sur notre site depuis <?php echo $elapsed ?> secondes</span> <br>
        <span>Vous avez visité cette page <?php echo $count ?> fois</span>
    </div>

    <br>
    <a href="page2.php">Page 2</a><br>
    <a href="page3.php">Page 3</a><br>
    <a href="page4.php">Page 4</a><br>
</body>
</html>