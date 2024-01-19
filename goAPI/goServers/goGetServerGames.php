<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    
    $data = $db->query("select * from game_words where server_id='$server' order by id desc limit 2");

    echo json_encode($data);
?>