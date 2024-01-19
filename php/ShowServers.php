<?php
    require("APIHandler.php");
    $api = new APIHandler();
    $user = $_POST['user'];
    $server = $_POST['server'];

    $servers = $api->API_getServers();
    $data = '';
?>

<?php for ($z=0;$z<count($servers['id']);$z++) {
    $button_type = $servers['max_players'][$z] == $servers['joined'][$z] ? "btn-danger" : "btn-success";
?>

<?php
$server_id = $servers['id'][$z];
$server_name = $servers['server_name'][$z];
$joined = $servers['joined'][$z];
$max_players = $servers['max_players'][$z];
$disabled = $servers['max_players'][$z] == $servers['joined'][$z] ? "disabled" : "";

if ($user || $server) {
    $disabled = "disabled";
}
$data.='<li class="list-group-item">'.$server_id.'. '.$server_name.' (players: '.$joined.'/'.$max_players.') <button type="button" class="btn '.$button_type.' btn-sm btn_join_server" data-server-id="'.$server_id.'" '.$disabled.'>JOIN SERVER</button></li>';
?>
<?php } 
echo $data;
?>