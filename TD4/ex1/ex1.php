<?php

//header("Location: https://lemonde.fr");

if (isset($_GET["redirect"])) {
    if (isset($_COOKIE["test"])) {
        echo "le navigateur accepte les cookies." . " Contenu : " . $_COOKIE["test"];
    } else {
        echo "le navigateur n'accepte pas les cookies.";
    }
} else {
    setcookie("test", "peu importe", time() + 24*3600);
    header("Location: ex1.php?redirect=true");
}

?>
