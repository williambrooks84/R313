<?php
require("model.php");

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'getMessage') {
    $idmessage = $_REQUEST['idMessage'];
    $message = getMessage($idmessage);
    echo json_encode($message);
    exit();
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'getMessages') {
    $message = getMessages();
    echo json_encode($message);
    exit();
}

http_response_code(404);

?>