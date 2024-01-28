<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    
    $server_users = $db->query("select joined from servers where id='$server'");
    $data = $db->query("select * from game_words where server_id='$server' order by id desc limit ".$server_users[0]['joined']);
    echo json_encode($data);
?>