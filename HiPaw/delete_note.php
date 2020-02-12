<?php
session_start();
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("DELETE FROM adopted_note WHERE adopter_id = ?");
$stmt->bind_param("i", $_SESSION['user-id']);
$stmt->execute();
$stmt->close();

if(isset($_GET['feedback'])){
    header("Location:feedback.php#tellUsWhatYouThink");
    exit();
}
else{
    header("Location:request_m_adopter.php");
    exit();
}