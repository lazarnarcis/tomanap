<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    
    $db->where("id", $server);
    $db->where("stopped", 1);
    $result = $db->select("servers");

    echo json_encode($result);
?>