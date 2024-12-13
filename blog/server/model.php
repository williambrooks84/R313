<?php

function getMessage($id){
    $cnx = new PDO("mysql:host=localhost;dbname=brooks4", "brooks4", "brooks4");
    $answer = $cnx->query("SELECT idMessage, pseudo, message FROM Message WHERE idMessage=$id");
    $res = $answer->fetchALL(PDO::FETCH_OBJ);
    return $res;
}

function getMessages(){
    $cnx = new PDO("mysql:host=localhost;dbname=brooks4", "brooks4", "brooks4");
    $answer = $cnx->query("SELECT idMessage, pseudo, message FROM Message");
    $res = $answer->fetchALL(PDO::FETCH_OBJ);
    return $res;
}

?>