<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $user = $_POST['user'];
    $result = $api->API_joinServer($server, $user);
    echo json_encode($result);
?>