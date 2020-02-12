<?php
session_start();
$_SESSION['error-duplication'] = 'false';
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$table = $_POST['aorg'];
$city = $_POST['city'];
$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;

$stmt = $db->prepare("SELECT id FROM guardian WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if($result){
if($result->num_rows != 0) {
    $stmt->close();
    $_SESSION['error-duplication'] = 'true';
    header("Location:sign-up.php");
    exit();
}}
$stmt->close();
$stmt = $db->prepare("SELECT id FROM adopter WHERE email = ?");
$stmt->bind_param("s", $email);
$result = $stmt->get_result();
if($result){
if($result->num_rows != 0) {
    $stmt->close();
    $_SESSION['error-duplication'] = 'true';
    header("Location:sign-up.php");
    exit();
}}
$stmt->close();

$stmt = $db->prepare("INSERT INTO ".$table." (name, password, email, city) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $name, $pass, $email, $city);
$stmt->execute();
$_SESSION['user-id']=$db->insert_id;
$_SESSION['user-table']=$table;
$_SESSION['city']=$city;
if($stmt->affected_rows == 0) {
    $stmt->close();
    exit('error');
}
$stmt->close();
if ($table == "adopter"){
header("Location:searchPage.php");
exit();}
else{
    header("Location:creatPetProfile.php");
    exit();
}
