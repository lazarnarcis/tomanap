<?php
    require("../config.php");
    $db = new Database();

    $columns = array(
        "id", 
        "server_name", 
        "max_players", 
        "joined"
    );
    $servers = $db->select("servers", $columns);

    foreach ($servers as $server) {
        $dataServerName[] = $server['server_name'];
        $dataID[] = $server['id'];
        $dataMaxPlayers[] = $server['max_players'];
        $dataJoined[] = $server['joined'];
    }

    $data = array(
        "id" => $dataID,
        "server_name" => $dataServerName,
        "max_players" => $dataMaxPlayers,
        "joined" => $dataJoined
    );

    echo json_encode($data);
?>