<?php
    require("APIHandler.php");
    $api = new APIHandler();

    $server = $_POST['server'];
    $data = $api->API_getServerGames($server);

    $show_data = [];
    if (count($data)) {
        foreach ($data as $t) {
            $new_data = array(
                $t['user'],
                $t['t'],
                $t['o'],
                $t['m'],
                $t['ap'],
                $t['n'],
                $t['an'],
                $t['p'],
            );
            $show_data[] = $new_data;
        }
    }

    echo json_encode($show_data);
?>