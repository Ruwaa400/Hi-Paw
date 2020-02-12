<?php
session_start();
$reqid = $_SESSION['current_req'];
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("SELECT guardian_id, adopter_id, sender_id, msg FROM messages WHERE request_id = ?");
$stmt->bind_param("i",  $reqid);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->store_result();
if($stmt->num_rows !== 0) {
    $guard = array();
    $adopter = array();
    $sender = array();
    $msg = array();
    $stmt->bind_result($idrow, $idp,$idad,$sss);
    while($stmt->fetch()) {
        $guard[] = $idrow;
        $adopter[] = $idp;
        $sender[] = $idad;
        $msg[] = $sss;
    }
    $stmt->close();
}
else {
    $nodata = '1';
}


if( !isset($nodata)){
    for($i = 0 ; $i<count($msg);$i++){
        if( $guard[$i] == $sender[$i]){
            echo " <li>
                <div class=\"msg him\">
                    <span class=\"partner\"> </span>
                    ".$msg[$i]."
                </div>
            </li>";
        }
        elseif ($adopter[$i] == $sender[$i]){

            echo "<li>
                <div class=\"msg you\">
                    <span class=\"partner\"> you </span>
                    ".$msg[$i]."
                </div>
            </li>";
        }
    }
}






