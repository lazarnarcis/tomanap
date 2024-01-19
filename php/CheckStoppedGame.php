<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $result = $api->API_checkStoppedGame($server);
    echo json_encode($result);
?>