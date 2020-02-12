<?php
session_start();


$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$petid = $_SESSION['pet_id'];
$name=$_SESSION['user-id'];


$stmt = $db->prepare("SELECT owner FROM pet WHERE id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$result = $stmt->get_result();
if($result){
    if($result->num_rows != 0) {
        $stmt->store_result();
        $stmt->bind_result($idowner);
        $stmt->fetch();
    }}
$stmt->close();
$stmt = $db->prepare("INSERT INTO request"." (pet_id, guardian_id, adopter_id, adopted, message) VALUES (?, ?,'false',?,?)");
$stmt->bind_param("iiis",  $_SESSION['pet-id'], $idowner,$_SESSION['user-id'], $_POST['msg']);
$stmt->execute();
if($stmt->affected_rows == 0) {
    echo "error";
}
$stmt->close();
header("Location:searchPage.php");