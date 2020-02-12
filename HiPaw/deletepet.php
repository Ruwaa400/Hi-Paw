<?php
session_start();
$petid = $_GET['pet_id'];
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("SELECT id FROM request WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows !== 0) {
    $req = $result->fetch_assoc();
    $stmt->close();
    $stmt = $db->prepare("DELETE FROM messages WHERE request_id = ?");
    $stmt->bind_param("i", $req);
    $stmt->execute();
    $stmt->close();
}
else $stmt->close();

$stmt = $db->prepare("DELETE FROM request WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM saved_pets WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_is WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_goodwith WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_likes WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_color WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet WHERE id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
if(isset($_GET['feedback'])){
    header("Location:feedback.php#tellUsWhatYouThink");
    exit();
}
header("Location:profile_mypets.php");
exit();


