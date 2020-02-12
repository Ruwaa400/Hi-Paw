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
        width: 100%;
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
<body>

<body style="background-color: white">

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        <a class="navbar-brand" style="margin-top: -50px; color: white" href="home.php">
            <img src="img/HiPaw white.png" style="margin-left: -5px" width="35" height="35" class="d-inline-block align-top" alt="">
            <span >&nbsp; Hi Paw!</span>
        </a>
        <br><br><br>
        <a href="adopterProfile.php"><span><i class="fa fa-user"></i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;My Profile</span></span></a><br>
        <a style='color: white' href="savedPets.php"><i class="material-icons">pets</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;Saved Pets</a></span>
        </a><br>
        <a href="request_m_adopter.php"><i class="material-icons">email</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;Requests<span></span></a>
        <br>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;Sign out</span></a><br>
    </div>
    <!-- /#sidebar-wrapper -->
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
        <br>
    <!-- Page Content -->
        <div class="container-fluid" style="background-color: white; padding-top: 20px;">
            <div class="footprints container" style="background-color: white; padding: 40px;">
                <div class="row">
                    <?php
                    $db = new mysqli("localhost", "root", "", "hipaw");
                    if($db->errno){
                        echo "error connecting to the database";
                        exit;
                    }
                    $ids_array = array();
                    $stmt = $db->prepare("SELECT pet_id FROM saved_pets WHERE adopter_id = ?");
                    $stmt->bind_param("i", $_SESSION['user-id']);
                    $stmt->execute();
                    $stmt->store_result();
                    if($stmt->num_rows === 0){
                    }
                    else {
                        $ids = array();
                        $stmt->bind_result($idRow);
                        while ($stmt->fetch()) {
                            $ids[] = $idRow;
                        }
                        $stmt->close();
                        foreach ($ids as $petid){
                            $stmt = $db->prepare("SELECT type, name, age_years, age_months, photo, story FROM pet WHERE id = ?");
                            $stmt->bind_param("i", $petid);
                            $stmt->execute();
                            $stmt->store_result();
                            if($stmt->num_rows === 0){
                                $stmt->close();
                                exit("error selecting");
                            }
                            if($stmt->num_rows !== 0) {
                                $stmt->bind_result($type,$name, $agey, $agem,$photo, $story);
                                $stmt->fetch();
                                $stmt->close();
                            }
                            $pet_is = "";
                            $stmt = $db->prepare("SELECT petis FROM pet_is WHERE pet_id = ?");
                            $stmt->bind_param("i", $petid);
                            $stmt->execute();
                            $stmt->store_result();
                            if($stmt->num_rows !== 0){
                                $pet_is = $name." is ";
                                $stmt->bind_result($idRow);
                                while($stmt->fetch()) {
                                    $pet_is = $pet_is.", ".$idRow;
                                }
                                $pet_is = $pet_is." ".$type.".";
                            }
                            $stmt->close();
                            $pet_color = "#";
                            $stmt = $db->prepare("SELECT color FROM pet_color WHERE pet_id = ?");
                            $stmt->bind_param("i", $petid);
                            $stmt->execute();
                            $stmt->store_result();
                            if($stmt->num_rows !== 0){
                                $stmt->bind_result($colorRow);
                                while($stmt->fetch()) {
                                    $pet_color = $pet_color.",".$colorRow;
                                }
                            }
                            $stmt->close();
                            $type = "#".$type;
                            if( $agey == 0)
                                $age = "#".$agem."mon";
                            else $age = "#".$agey."yrs";
                            echo " <div class=\"search-res col-xs-12 col-sm-6 col-md-4\" data-aos=\"fade-up\">
    <div class=\"image-flip\" ontouchstart=\"this.classList.toggle('hover');\" >
        <div class=\"mainflip\" >
            <div class=\"frontside\" >
                <div class=\"card\" >
                    <div class=\"card-body text-center\">
                        <p><img class=\" img-fluid\" src=\"".$photo."\" alt=\"card image\"></p>
                        <h4 class=\"pet-name card-title\">".$name."</h4>
                        <p class=\"pet-descr card-text\">".$pet_is."</p>
                        <div class=\"pet-info-tags clearfix\">
                            <span class=\"badge badge-pill badge-info\">".$type."</span>
                            <span class=\"badge badge-pill badge-danger\">".$pet_color."</span>
                            <span class=\"badge badge-pill badge-success\">".$age."</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"backside\" >
                <div class=\"card\" >
                    <div class=\"card-body text-center mt-4\">
                        <h4 class=\"card-title\">Story</h4>
                        <p class=\"card-text\">".$story."</p>
                        <p class=\"heart\"></p>
                        <button type=\"button\" onclick=\"window.location.href='petProfile.php?pet_id=".$petid."'\" class=\"btn btn-primary\">View Profile <i class=\"fas fa-paw\"></i> </button>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
</div>
<!-- Bootstrap core JavaScript -->
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