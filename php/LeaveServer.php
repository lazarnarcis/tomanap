<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $user = $_POST['user'];
    $result = $api->API_leaveServer($server, $user);
    echo json_encode($result);
?>