<?php

session_start();

if(!isset($_SESSION['city'])){

    $_SESSION['city']= $_POST['city'];

    $db = new mysqli("localhost", "root", "", "hipaw");
    if($db->errno){
        echo "error connecting to the database";
        exit;
    }

    $ids_array = array();
    $stmt = $db->prepare("SELECT id FROM pet WHERE city = ?");
    $stmt->bind_param("s", $_SESSION['city']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows === 0){
        $_SESSION['no_pets']='true';
        header("Location:searchPage.php");
        exit();
    }
    $ids = array();
    $stmt->bind_result($idRow);
    while($stmt->fetch()) {
        $ids[] = $idRow;
    }
    $stmt->close();
    $_SESSION['pet_ids_array'] = $ids;
    header("Location:searchPage.php");
    exit();
}
else{

    $db = new mysqli("localhost", "root", "", "hipaw");
    if($db->errno){
        echo "error connecting to the database";
        exit;
    }

    $ids_array = array();
    $type_con = "";
if(isset($_POST['type'])){
    $type_con = " and (type = '".$_POST['type'][0]."'";
    for($i = 1; $i<count($_POST['type']) ; $i++){
        $type_con = " or type = '".$_POST['type'][$i]."'";
    }
    $type_con = $type_con.")";
}
    $gender_con = "";
    if(isset($_POST['gender'])){
        $gender_con = " and (gender = '".$_POST['gender'][0]."'";
        for($i = 1; $i<count($_POST['gender']) ; $i++){
            $gender_con = " or gender = '".$_POST['gender'][$i]."'";
        }
        $gender_con = $gender_con.")";
    }
    $size_con = "";
    if(isset($_POST['size'])){
        $size_con = " and (size = '".$_POST['size'][0]."'";
        for($i = 1; $i<count($_POST['size']) ; $i++){
            $size_con = " or size = '".$_POST['size'][$i]."'";
        }
        $size_con = $size_con.")";
    }
    $age_con = "";
    if($_POST['minv']!=""){
        $age_con = " and age_months >= ".$_POST['minv']." and age_months <= ".$_POST['maxv'];
    }
    $color_con = "";
    if(isset($_POST['color'])){
        $color_con = " and id in ( select distinct pet_id from pet_color where (color = '".$_POST['color'][0]."'";
        for($i = 1; $i<count($_POST['color']) ; $i++){
            $color_con = " or color = '".$_POST['color'][$i]."'";
        }
        $color_con = $color_con."))";
    }
//echo "SELECT distinct id FROM pet WHERE city = ?".$age_con.$color_con.$gender_con.$type_con.$size_con;
    $cityvar = $_SESSION['city'];
    $q = "SELECT distinct id FROM pet WHERE city = "."'".$cityvar."'".$age_con.$color_con.$gender_con.$type_con.$size_con." ";
    $res = $db->query($q);
    if(!$res){
        $_SESSION['no_pets']='true';
        header("Location:searchPage.php");
        exit();
    }
    $ids = array();
    while ($row = $res->fetch_array())
    {
        echo $row['id'];
        $ids[] = $row['id'];
    }

    $_SESSION['pet_ids_array'] = $ids;
    $res->free();
    $db->close();
    header("Location:searchPage.php");
    exit();

}