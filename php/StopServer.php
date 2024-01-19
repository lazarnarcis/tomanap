<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $user = $_POST['user'];

    $result = $api->API_stopServer($server, $user);
    echo json_encode($result);
?>