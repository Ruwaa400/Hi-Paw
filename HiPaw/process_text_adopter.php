<?php
session_start();
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("INSERT INTO messages (adopter_id, guardian_id, msg, sender_id, request_id) VALUES (? ,?, ?,?,?)");
$stmt->bind_param("iisii", $_SESSION['user-id'],$_SESSION['guardian_id'], $_POST['mes'],$_SESSION['user-id'],$_SESSION['current_req']);
$stmt->execute();
if($stmt->affected_rows == 0) {
    $stmt->close();
    echo "whyyy";
    exit('error');
}
echo "in php";
$stmt->close();