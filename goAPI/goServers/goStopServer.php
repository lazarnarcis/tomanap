<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    $user = $_REQUEST['user'];
    
    $db->where("id", $server);
    $result = $db->select("servers");

    if (count($result)) {
        $data = array(
            "stopped" => 1,
            "stopped_by" => $user
        );
        $db->where("id", $server);
        $db->update("servers", $data);
    }

    echo json_encode($result);
?>