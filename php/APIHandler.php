<?php
    class APIHandler {
        function API_getServers() {
            $postfields = array(
                "goAction" => "goGetAllServers"
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_joinServer($server = NULL, $user = NULL) {
            $postfields = array(
                "goAction" => "goJoinServer",
                "server" => $server,
                "user" => $user
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_getGeneratedLetter($server = NULL) {
            $postfields = array(
                "goAction" => "goGetGeneratedLetter",
                "server" => $server
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_leaveServer($server = NULL, $user = NULL) {
            $postfields = array(
                "goAction" => "goLeaveServer",
                "server" => $server,
                "user" => $user
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_stopServer($server = NULL, $user = NULL) {
            $postfields = array(
                "goAction" => "goStopServer",
                "server" => $server,
                "user" => $user
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_addUserToServerGame($server = NULL, $user = NULL, $country = NULL, $city = NULL, $mountain = NULL, $water = NULL, $name = NULL, $animal = NULL, $plant = NULL) {
            $postfields = array(
                "goAction" => "goAddUserToServerGame",
                "server" => $server,
                "user" => $user,
                "country" => $country,
                "city" => $city,
                "mountain" => $mountain,
                "water" => $water,
                "name" => $name,
                "animal" => $animal,
                "plant" => $plant
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_checkStoppedGame($server = NULL) {
            $postfields = array(
                "goAction" => "goCheckStoppedGame",
                "server" => $server
            );
            return $this->API_Request("goServers", $postfields);
        }

        function API_getServerGames($server = NULL) {
            $postfields = array(
                "goAction" => "goGetServerGames",
                "server" => $server
            );
            return $this->API_Request("goServers", $postfields);
        }

        function siteURL() {
            $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
            $domainName = $_SERVER['HTTP_HOST'].'/';
            return $protocol.$domainName;
        }

        function API_Request($folder = NULL, $postfields = NULL) {
            $url = $this->siteURL();
            $whitelist = array('127.0.0.1', '::1');

            if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
                $url .= "tomanap-game/";
            }
            $url .= "goAPI";

            $limit = 0;
            foreach ($postfields as $key => $value) {
                if ($key == "goAction") {
                    $url .= "/".$folder."/".$value.".php";
                } else {
                    if ($limit == 0) {
                        $url .= "?".$key."=".urlencode($value);
                    } else {
                        $url .= "&".$key."=".urlencode($value);
                    }
                    $limit = 1;
                }
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error: ' . curl_error($ch);
                exit;
            }
            curl_close($ch);
            $data = json_decode($response, true);
            return $data;
        }
    }
?>