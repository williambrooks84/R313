<?php
session_start();

function destroySession() {
    $_SESSION = [];
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 42000);
    header("Location: index.html");
    exit();
}

/*$timeout_duration = 3600;

if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    if ($elapsed_time > $timeout_duration) {
        destroySession();
    }
}
$_SESSION['last_activity'] = time();

if (isset($_REQUEST['logout'])) {
    destroySession();
}*/

if (isset($_SESSION['lastcnx']) && time() - $_SESSION['lastcnx'] > 3600) {
    destroySession();
}

$_SESSION['lastcnx'] = time();

$nom = $_SESSION['nom'] ?? $_REQUEST['nom'] ?? null;
$prenom = $_SESSION['prenom'] ?? $_REQUEST['prenom'] ?? null;

if ($nom) {
    $_SESSION['nom'] = $nom;
}
if ($prenom) {
    $_SESSION['prenom'] = $prenom;
}   

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

if (isset($_REQUEST['logout'])) {
    destroySession();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <h1>Session</h1>
    <p>Bienvenue <?php echo $prenom . ' ' . $nom; ?> !</p>
    <form method = "POST" action = "session.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>