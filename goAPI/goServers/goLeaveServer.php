<?php
    require("../config.php");
    $db = new Database();
    $server = $_REQUEST['server'];
    $user = $_REQUEST['user'];
    
    $db->where("id", $server);
    $result = $db->select("servers");
    $result3 = NULL;

    if (count($result)) {
        $query = "SELECT * FROM online_players WHERE user='$user' and online_players.server='$server'";
        $result4 = $db->query($query);
        if (count($result4)) {
            $db->where("user", $user);
            $db->where("server", $server);
            $db->deleteRow("online_players");

            $data = array("joined" => $result[0]['joined']-1);
            if ($result[0]['joined'] == 1) {
                $data['stopped'] = 0;
                $data['stopped_by'] = "";
                $data['first_on_server'] = "";
                $data['server_letter'] = "";
            }
            $db->where("id", $server);
            $result2 = $db->update("servers", $data);
        }
    }

    echo json_encode($result3);
?>