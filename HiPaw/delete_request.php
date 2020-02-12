<?php
$req = $_GET['request'];

$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("SELECT adopter_id, pet_id FROM request WHERE id = ?");
$stmt->bind_param("i",  $req);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows === 0) exit('No rows');
$stmt->bind_result($adoptid, $idp);
$stmt->fetch();
$stmt->close();

$stmt = $db->prepare("DELETE FROM messages WHERE request_id = ?");
$stmt->bind_param("i", $req);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM request WHERE id = ?");
$stmt->bind_param("i", $req);
$stmt->execute();
$stmt->close();
if(isset($_GET['adopted'])){

    $stmt = $db->prepare("SELECT name, photo FROM pet WHERE id = ?");
    $stmt->bind_param("i",  $idp);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows !== 0) {
        $stmt->bind_result($petname, $photo);
        $stmt->fetch();
        $stmt->close();
    } else {
        $stmt->close();
    }
    $stmt = $db->prepare("INSERT INTO adopted_note (adopter_id, pet_name,photo) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $adoptid, $petname, $photo);
    $stmt->execute();
    $stmt->close();
    if($stmt->affected_rows === 0){
        exit();
    }

    if(isset($_GET['feedback'])){
        header("Location:deletepet.php?pet_id=".$idp."&feedback=1");
        exit();
    }

    header("Location:deletepet.php?pet_id=".$idp);
    exit();

}

header("Location:request_m.php");
exit();
