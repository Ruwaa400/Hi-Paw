<?php
session_start();
if(!$_SESSION['user-id']){
    echo "alert(\"Hi\");";
}
else{
    if (isset($_POST['comment']) && $_POST['comment']!="") {
        $t = $_POST['comment'];
        $db = new mysqli("localhost", "root", "", "hipaw");
        if($db->errno){
            echo "error connecting to the database";
            exit;
        }
        $stmt = "INSERT INTO adopted_feedback(user_id, user_table, feedback) VALUES (" . $_SESSION['user-id'] . ",'" . $_SESSION['user-table'] . "','" . $t. "')";
        $db->query($stmt);
        $_SESSION['submit-done']=1;
        header("Location:feedback.php");
        exit();
    }
    else{
        $_SESSION['submit-empty']=1;
        header("Location:feedback.php#tellUsWhatYouThink");
        exit();
    }
}
?>