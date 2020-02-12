<?php
session_start();
$_GET['state'];

$db = new mysqli("localhost", "root", "", "hipaw");
if ($db->errno) {
    echo "error connecting to the database";
    exit;
}
if($_GET['state'] == 'true'){
    $stmt = $db->prepare("insert into  saved_pets ( pet_id , adopter_id) values (?,?)");
    $stmt->bind_param("ii", $_SESSION['pet_id'], $_SESSION['user-id']);
    $stmt->execute();
    $stmt->close();

}
elseif($_GET['state'] == 'false') {
    $stmt = $db->prepare("delete FROM saved_pets WHERE pet_id = ? and adopter_id = ?");
    $stmt->bind_param("ii", $_SESSION['pet_id'], $_SESSION['user-id']);
    $stmt->execute();
    $stmt->close();

}
header("Location:petProfile.php?pet_id=".$_SESSION['pet_id']);
exit();
