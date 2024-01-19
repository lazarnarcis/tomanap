<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $result = $api->API_getGeneratedLetter($server);
    echo json_encode($result);
?>