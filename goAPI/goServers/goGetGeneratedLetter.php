<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    
    $db->where("id", $server);
    $result = $db->select("servers");

    $letter = $result[0]['server_letter'];
    $results['letter'] = $letter;
    echo json_encode($results);
?>