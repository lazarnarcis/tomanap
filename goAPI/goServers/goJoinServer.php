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
            $result3 = "This user already exists on this server!";
        } else {
            $data = array(
                "user" => $user,
                "server" => $server
            );
            $result3 = $db->insert("online_players", $data);

            $data = array("joined" => $result[0]['joined'] + 1);
            if ($result[0]['joined'] == 0) {
                $data['first_on_server'] = $user;
                $data['server_letter'] = generateRandomLetter();
            }
            $db->where("id", $server);
            $result2 = $db->update("servers", $data);
        }
    }

    function generateRandomLetter() {
        $randomCharCode = mt_rand(65, 90);
        $randomLetter = chr($randomCharCode);
        return $randomLetter;
    }

    echo json_encode($result3);
?>