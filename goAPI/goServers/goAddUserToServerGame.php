<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    $user = $_REQUEST['user'];

    $country = $_REQUEST['country'];
    $city = $_REQUEST['city'];
    $mountain = $_REQUEST['mountain'];
    $water = $_REQUEST['water'];
    $name = $_REQUEST['name'];
    $animal = $_REQUEST['animal'];
    $plant = $_REQUEST['plant'];
    
    $db->where("id", $server);
    $result = $db->select("servers");

    if (count($result)) {
        $data_game = array(
            "server_id" => $server,
            "user" => $user,
            "t" => $country,
            "o" => $city,
            "m" => $mountain,
            "ap" => $water,
            "n" => $name,
            "an" => $animal,
            "p" => $plant
        );
        $db->insert("game_words", $data_game);
    }

    echo json_encode($result);
?>