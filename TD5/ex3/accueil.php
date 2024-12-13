<?php
date_default_timezone_set('Europe/Paris');

session_start();

function destroySession() {
    $_SESSION = [];
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 42000);
    header("Location: index.html");
    exit();
}

if (isset($_SESSION['lastcnx']) && time() - $_SESSION['lastcnx'] > 3600) {
    destroySession();
}
$_SESSION['lastcnx'] = time();

$counterName = $_SERVER['REQUEST_URI'];
$count = 1;

if (isset($_SESSION['stat']) == false) {
    $timestamp = time();
    $all = [
        "timestamp" => $timestamp,
        $counterName => $count,
    ];
    $_SESSION['stat'] = $all;
}
else {
    $all = $_SESSION['stat'];
    $timestamp = $all['timestamp'];
    if (isset($all[$counterName])) {
        $count = $all[$counterName] + 1;
    } else {
        $count = 1;
    }
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