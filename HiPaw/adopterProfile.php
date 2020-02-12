<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>Hi Paw</title>
    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/userProfileInfo.css" rel="stylesheet">
    <link rel="stylesheet" href="css/searchPagecss.css">
    <link rel="stylesheet" href="css/searchPagecss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="icon" type="image/png" href="img/HiPawblack.png"/>

</head>
<style>
    .list-group-item:hover{
        color: #cf3d3b;
    }
    .footprints{
        background: transparent;

    }
</style>
<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        height: 100%;
        width: 85px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        white-space: nowrap;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .material-icons,
    .icon-text {
        vertical-align: middle;
    }

    .material-icons {
        padding-bottom: 3px;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
        margin-left: 100px;
    }
    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */

    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }
        .sidebar a {
            font-size: 18px;
        }
    }
</style>
<body style="background-color: white">

<div class="d-flex" id="wrapper" style="background-color: white">

    <!-- Sidebar -->
    <!-- /#sidebar-wrapper -->
    <div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        <a class="navbar-brand" style="margin-top: -50px; color: white" href="home.php">
            <img src="img/HiPaw white.png" style="margin-left: -5px" width="35" height="35" class="d-inline-block align-top" alt="">
            <span >&nbsp; Hi Paw!</span>
        </a>
        <br><br><br>
        <a style='color: white' href="adopterProfile.php"><span><i class="fa fa-user"></i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;My Profile</span></span></a><br>
        <?php
        if($_SESSION['user-table']=='adopter'){
            echo "<a href=\"savedPets.php\"><i class=\"material-icons\">pets</i><span class=\"icon-text\"></span>&nbsp;&nbsp;&nbsp;&nbsp;Saved Pets</a></span>
        </a><br>";
            echo "<a href=\"request_m_adopter.php\"><i class=\"material-icons\">email</i><span class=\"icon-text\"></span>&nbsp;&nbsp;&nbsp;&nbsp;Requests<span></span></a>
     ";
        }
        else {
            echo " <a href=\"profile_mypets.php\"><i class=\"material-icons\">pets</i><span class=\"icon-text\"></span>&nbsp;&nbsp;&nbsp;&nbsp;My Pets</a></span>
        </a><br>
        <a href=\"request_m.php\"><i class=\"material-icons\">email</i><span class=\"icon-text\"></span>&nbsp;&nbsp;&nbsp;&nbsp;Requests<span></span></a>
        ";
        }
        ?>
        <br>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;Sign out</span></a><br>
    </div>

    <div id="main">
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: transparent;">
            <div class="d-flex w-50 order-0">
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
                            <a class="dropdown-item" href="#feedback">People Are Saying</a>
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
                  <a class=\"dropdown-item\" href=\"request_m_adopter.php\">Requests</a>
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
        <br>
    <!-- Page Content -->
    <div id="page-content-wrapper">


        <?php
        $db = new mysqli("localhost", "root", "", "hipaw");
        if($db->errno){
            echo "error connecting to the database";
            exit;
        }
        $stmt ="SELECT * FROM ".$_SESSION['user-table']." WHERE id=".$_SESSION['user-id'];
        $result = mysqli_query($db, $stmt);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $userName=$row["name"];
            $userEmail=$row["email"];
            $userNum=$row["number"];
            $userCity=$row["city"];
        }
        ?>
        <div class="container-fluid" style="margin-left: 20px;">

            <div class="row text-center" style="text-align: center;">
                <div class="col-xs-6">
                    <div class="userImg ">
                        <img src="img/default-user-profile-image-png-2.png" width="100%">
                    </div>
                </div>
                <div class="col-xs-6 align-self-center">
                    <div class="userName superFont">
                        Hi <?php  echo $username;    ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container infoCard">
                    <div>
                        <br>
                        <label>Name</label>
                        <span class="viewEditIcon">
          <div class="superFont">
            <?php  echo $username;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
                        <hr>
                        <span class="viewEditIcon">
          <label>Email</label>
          <div class="superFont">
            <?php  echo $userEmail;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
                        <hr>
                        <span class="viewEditIcon">
          <label>Number</label>
          <div class="superFont">
            <?php  echo $userNum;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div> </div>
                    <hr>
                    <span class="viewEditIcon">
          <label>City</label>
          <div class="superFont">
            <?php  echo $userCity;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
          <br>
        </span>

                </div>
            </div>

        </div>
        <!--end profile info-->
        <br><br><br><br><br>


    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
</div>
<!-- Bootstrap core JavaScript -->

<!-- Menu Toggle Script -->
<script>
    var mini = true;

    function toggleSidebar() {
        if (mini) {
            console.log("opening sidebar");
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            this.mini = false;
        } else {
            console.log("closing sidebar");
            document.getElementById("mySidebar").style.width = "85px";
            document.getElementById("main").style.marginLeft = "85px";
            this.mini = true;
        }
    }
</script>

</body>

</html>