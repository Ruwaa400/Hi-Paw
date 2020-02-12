<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/home.css">

    <link rel="stylesheet" type="text/css" href="./css/feedback.css">
    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- for aos  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- for font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script> -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/nav_css.css">
    <title>Hi Paw</title>
    <link rel="icon" type="image/png" href="img/HiPaw black.png"/>
</head>

<style>
    html, body {
        scroll-behavior: smooth;
    }
    body{
        background-color: rgb(250, 250, 250);
        overflow-x: hidden;
    }
    .textarea {
        width: 600px;
        margin-top: 20px;
        margin-left: 40px;
        border: 1px solid #a9c6c9;
    }
    <?php
    if(isset($_SESSION['submit-empty'])){
        if($_SESSION['submit-empty']==1){
            echo ".textarea {
        border:1px solid red;
        box-shadow: 0 0 10px #719ECE;
    }";
            $_SESSION['submit-empty']=0;
        }
        else if ($_SESSION['submit-empty']=0){
            echo "
            .textarea {
            border: 2px solid #a9c6c9;
            ";
        }
    }
 ?>
</style>

<script>
    function validate_user(){
        <?php
        if(isset($_SESSION['user-id'])){
            echo " return true;";
        }
        else{
            echo " event.preventDefault();
               $(\"#notsigned\").modal();
               return false;";
        }

        ?>

    }

    function maxLengthReached(x, y) {
        if (y.length == x.maxLength) {
            document.getElementById("comment").style.color = "#929292";
        }
        else {
            document.getElementById("comment").style.color = "black";
        }
    }
    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    <?php
    if(isset($_SESSION['submit-done'])){
        if($_SESSION['submit-done']==1){
            echo "document.getElementById('comment').value = \"\";";
            $_SESSION['submit-done']=0;
        }
    }
    ?>
</script>
<body>
<div class="modal" id="notsigned">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: center">
                <h2>You have to be Signed in.</h2>
                <button style="margin-bottom: 20px" type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='log-in.php'">Sign in</button><br>
                <h2>  or Sign up now! and find your perfect companion!</h2>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='sign-up.php'">Sign up</button>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer" style="align-content: center">

            </div>

        </div>
    </div>
</div>
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #f0f0f0;">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand" href="home.php">
            <img src="img/HiPaw black.png" width="45" height="45" class="d-inline-block align-top" alt="">
            <div style="font-size: 30px; margin-top: 7px;" class="superFont d-inline-block"> Hi Paw!</div>
        </a>
        <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="superFont collapse navbar-collapse" id="collapse_target">
        <ul class="nav navbar-nav ml-auto" >
            <li class="navbar-item active">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About Us
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="home.php#whatWeDodiv">What We Do</a>
                    <a class="dropdown-item" href="home.php#HowItWorks">How It Works</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="home.php#feedback">People Are Saying</a>
                </div>
            </li>


            <?php
            if(isset($_SESSION['user-id'])){
                $db = new mysqli("localhost", "root", "", "hipaw");
                if($db->errno){
                    echo "error connecting to the database";
                    exit;
                }
                $stmt = $db->prepare("SELECT name FROM ".$_SESSION['user-table']." WHERE id = ?");
                $stmt->bind_param("s",  $_SESSION['user-id']);
                $stmt->execute();
                //fetching result would go here, but will be covered later
                $stmt->store_result();
                if($stmt->num_rows !== 0) {
                    $stmt->bind_result($username);
                    $stmt->fetch();
                    $stmt->close();
                }
                else {
                    exit('error invalid user id ');
                }
                if($_SESSION['user-table'] == 'adopter'){
                    echo " <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown2\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  ".$username."
              </a>
              <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown2\">
                  <a class=\"dropdown-item\" href=\"adopterProfile.php\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"searchPage.php\">Browse Pets</a>
                  <a class=\"dropdown-item\" href=\"savedPets.php\">Saved Pets</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"logout.php\">Log out</a>
              </div>
          </li>";
                }
                elseif ($_SESSION['user-table'] == 'guardian') {
                    echo " <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown3\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  ".$username."
              </a>
              <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown3\">
                  <a class=\"dropdown-item\" href=\"adopterProfile.php\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"profile_mypets.php\">View Own Pets</a>
                  <a class=\"dropdown-item\" href=\"request_m.php\">Requests</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"logout.php\">Log out</a>
              </div>
          </li>";
                }
            }
            else{
                echo " <li class=\"navbar-item\">
              <a class=\"nav-link\" href=\"sign-up.php?q=adopter\">Adopt</a>
          </li>
          <li class=\"navbar-item\">
              <a class=\"nav-link\" href=\"sign-up.php?q=guardian\">Rehome</a>
          </li>
        <li class=\"navbar-item\">
          <a class=\"nav-link\" href=\"log-in.php\" style=\"margin-right: 2px; padding-right: 0\">Log in </a>
        </li>
        <li class=\"navbar-item\">
          <a class=\"nav-link\" href=\"sign-up.php\" style=\"margin-left: 1px; padding-left: 0\">| Sign up</a>
        </li>";
            }
            ?>

            <li class="navbar-i tem">
                <a class="nav-link" href="home.php#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<br><br>

<!--<h2 class="copyright header">What People Are Saying About Us</h2>-->
<section>
    <div class="top-section section-indent">
        <div class="flex-container" style="padding-bottom: 50px;">
            <h4 style="font-size: 32px;" id="feedback" class="section-title capitalize-title color-title bg-title" data-aos="fade-up" data-aos-delay="0">
                <span>WHAT PEOPLE SAYING ABOUT US</span>
            </h4>
        </div>
    </div>
</section>



<?php
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt ="SELECT * FROM adopted_feedback ORDER BY id DESC";
$result = mysqli_query($db, $stmt);
if (mysqli_num_rows($result) > 4) {
    while($row = $result->fetch_assoc()) {
        $feed=$row['feedback'];
        $id=$row['user_id'];
        $table=$row['user_table'];
        $stmt2 ="SELECT ".$table.".name FROM adopted_feedback, ".$table." WHERE ".$table.".id=adopted_feedback.user_id AND adopted_feedback.user_id = ".$id."";
        $result2 = mysqli_query($db, $stmt2);
        $row2 = $result2->fetch_assoc();
        $name = $row2['name'];
        echo "<div class=\"container potato \" data-aos=\"zoom-in-down\" data-aos-delay=\"500\">
    <p class=\"superFont\">
        <span style=\"padding-right: 15px;\"><i class=\"fas fa-quote-left\"></i></span>
        ".$feed."
    </p>
    <div style=\"margin-top: 30px;\">&nbsp;&nbsp; - &nbsp; ".$name." </div>
</div>";
    }
}
?>

<span id="tellUsWhatYouThink"></span>
<hr class="display">
<div class="container-fluid mainCont">
    <h4 class="superFont tellUsWhatYouThink" >Tell us what you think!</h4>
    <form onsubmit="validate_user();" action="saveFeedback.php" method="post">
        <textarea class="form-control textarea" rows="6" maxlength="300" name="comment" id="comment" onkeyup="maxLengthReached(this,this.value)"></textarea>
        <button type="submit" class="btn btn-outline-dark Submit">Submit &nbsp;<i class="far fa-comment"></i></button>
    </form>
</div>



<br><br>
<div class="copyright">
    <a onclick="scrollToTop()" href="" style="color: rgb(90, 160, 221); text-decoration: overline;"> Back to top</a>
</div>
<br>
<div class="copyright">
    © Copyright 2019 <a href="home.php">HiPaw.com</a>
</div>




<!-- for aos animation   -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 100, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000 // values from 0 to 3000, with step 50ms
    });
</script>

</body>
</html>