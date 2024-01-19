<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $user = $_POST['user'];

    $country = $_POST['country'];
    $city = $_POST['city'];
    $mountain = $_POST['mountain'];
    $water = $_POST['water'];
    $name = $_POST['name'];
    $animal = $_POST['animal'];
    $plant = $_POST['plant'];

    $result = $api->API_addUserToServerGame($server, $user, $country, $city, $mountain, $water, $name, $animal, $plant);
    echo json_encode($result);
?>