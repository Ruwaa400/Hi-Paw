<?php
session_start();


$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$type = $_POST['type'];
$petn=$_POST["pet_name"];
$agey=$_POST["age_year"];
$agem=$_POST["age_mon"];
$story = $_POST['story'];
$gender = $_POST['gender'];
$size = $_POST['size'];
$food = $_POST['food'];
$alone = $_POST['alone'];



if( isset($_POST['medical'])){
    $medical_des = $_POST['medical_des'];;
}
else $medical_des="";
if(!empty($_POST['additional'])){
    $additional = $_POST['additional'];
}
else $additional = 'NULL';

$stmt = $db->prepare("INSERT INTO pet"." (name, type, age_years, age_months, gender, size, food, owner, story, health, details, city, alone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiisssssssss", $petn, $type, $agey, $agem, $gender, $size, $food, $_SESSION['user-id'], $story, $medical_des, $additional, $_SESSION['city'], $alone);
$stmt->execute();
$_SESSION['pet-id']=$db->insert_id;
if($stmt->affected_rows == 0) {
    echo "error";
}
$stmt->close();


if (isset($_FILES['image'])) {
    $error = arraY();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $arrayVar = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($arrayVar));
    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $extensions) == false) {
        $error[] = "please choose an image with extension jpg,jpeg,png";
    }
    if (empty($error) == true) {
        move_uploaded_file($file_tmp, "uploadedPhotos/" . $db->insert_id.".png");
        $path = dirname($_SERVER['HTTP_REFERER']) . "/uploadedPhotos/" . $db->insert_id.".png";
    }
    else echo "error photo";

}

$stmt = $db->prepare("UPDATE pet SET photo = ? WHERE id = ?");
$stmt->bind_param("si", $path, $_SESSION['pet-id']);
$stmt->execute();
$stmt->close();

if(!empty($_POST['pet_is_list'])) {
    foreach ($_POST['pet_is_list'] as $selected) {
        $stmt = $db->prepare("INSERT INTO pet_is"." (pet_id, petis) VALUES (?, ?)");
        $stmt->bind_param("is",  $_SESSION['pet-id'], $selected);
        $stmt->execute();
        if($stmt->affected_rows == 0) {
            echo "error";
        }
        $stmt->close();
    }
}
if(!empty($_POST['pet_likes_list'])) {
    foreach ($_POST['pet_likes_list'] as $selected) {
        $stmt = $db->prepare("INSERT INTO pet_likes"." (pet_id, likes) VALUES (?, ?)");
        $stmt->bind_param("is",  $_SESSION['pet-id'], $selected);
        $stmt->execute();
        if($stmt->affected_rows == 0) {
            echo "error";
        }
        $stmt->close();

    }
}
if(!empty($_POST['pet_good_list'])) {
    foreach ($_POST['pet_good_list'] as $selected) {
        $stmt = $db->prepare("INSERT INTO pet_goodwith"." (pet_id, good_with) VALUES (?, ?)");
        $stmt->bind_param("is",  $_SESSION['pet-id'], $selected);
        $stmt->execute();
        if($stmt->affected_rows == 0) {
            echo "error";
        }
        $stmt->close();

    }
}
if(!empty($_POST['pet_color'])) {
    foreach ($_POST['pet_color'] as $selected) {
        $stmt = $db->prepare("INSERT INTO pet_color"." (pet_id, color) VALUES (?, ?)");
        $stmt->bind_param("is",  $_SESSION['pet-id'], $selected);
        $stmt->execute();
        if($stmt->affected_rows == 0) {
            echo "error";
        }
        $stmt->close();

    }
}

    header("Location:profile_mypets.php");
    exit();



