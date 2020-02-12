<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$_SESSION['not_signed_up'] = 'false';
$_SESSION['password'] = 'yes';
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}


$stmt = $db->prepare("SELECT password, id, city FROM adopter WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->store_result();
if($stmt->num_rows !== 0) {
    $stmt->bind_result($passwordAdopter,$id_adopt, $acity);
    $stmt->fetch();
    $stmt->close();
}
$stmt->close();

$stmt = $db->prepare("SELECT password, id, city FROM guardian WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->store_result();
if($stmt->num_rows !== 0) {
    $stmt->bind_result($passwordGuardian,$id_guard, $gcity);
    $stmt->fetch();
    $stmt->close();
}
$stmt->close();

if( isset($passwordAdopter)){
    if($pass == $passwordAdopter){
        $_SESSION['user-table']='adopter';
        $_SESSION['user-id'] = $id_adopt;
        $_SESSION['city']=$acity;
        header("Location:savedPets.php");
        exit();
    }
    else{
        $_SESSION['password'] = 'wrong';
        header("Location:log-in.php");
        exit();
    }
}
elseif (isset($passwordGuardian)){
    if($pass == $passwordGuardian){
        $_SESSION['user-table']= 'guardian';
        $_SESSION['user-id'] = $id_guard;
        $_SESSION['city']=$gcity;
        header("Location:profile_mypets.php");
        exit();
    }
    else{
        $_SESSION['password'] = 'wrong';
        header("Location:log-in.php");
        exit();
    }
}
else{
    $_SESSION['not_signed_up'] = 'true';
   header("Location:log-in.php");
    exit();
}

