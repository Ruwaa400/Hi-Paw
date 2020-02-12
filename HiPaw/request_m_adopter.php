<?php
session_start();
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("SELECT id, pet_id, guardian_id FROM request WHERE adopter_id = ?");
$stmt->bind_param("i",  $_SESSION['user-id']);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->store_result();
if($stmt->num_rows !== 0) {
    $requestid = array();
    $petids = array();
    $petnames = array();
    $petphoto = array();
    $adoptername = array();
    $adopter = array();
    $stmt->bind_result($idrow, $idp,$idad);
    while($stmt->fetch()) {
        $requestid[] = $idrow;
        $petids[] = $idp;
        $adopter[] = $idad;
    }
    $stmt->close();
    for( $i = 0;$i< count($petids); $i++) {
        $stmt = $db->prepare("SELECT name, photo FROM pet WHERE id = ?");
        $stmt->bind_param("i", $petids[$i]);
        $stmt->execute();
//fetching result would go here, but will be covered later
        $stmt->store_result();
        if ($stmt->num_rows !== 0) {
            $stmt->bind_result($petnames[$i], $petphoto[$i]);
            $stmt->fetch();
            $stmt->close();
        } else {
            exit('error invalid user id ');
        }

        $stmt = $db->prepare("SELECT name FROM guardian WHERE id = ?");
        $stmt->bind_param("i", $adopter[$i]);
        $stmt->execute();
//fetching result would go here, but will be covered later
        $stmt->store_result();
        if ($stmt->num_rows !== 0) {
            $stmt->bind_result($adoptername);
            $stmt->fetch();
            $stmt->close();
        } else {
            exit('error invalid user id ');
        }

    }
}
else {
    $nodata = '1';
}
$stmt = $db->prepare("SELECT pet_name, photo FROM adopted_note WHERE adopter_id = ?");
$stmt->bind_param("i", $_SESSION['user-id']);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->store_result();
if ($stmt->num_rows !== 0) {
    $stmt->bind_result($pet_name, $pet_photo);
    $stmt->fetch();
    $stmt->close();
} else {
    $noadoption = '1';
}



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
</head>
<style>

    #myModal .modal-dialog {
        -webkit-transform: translate(0,-50%);
        -o-transform: translate(0,-50%);
        transform: translate(0,-50%);
        top: 50%;
        margin: 0 auto;
    }
    .list-group-item:hover{
        color: #cf3d3b;
    }

    .footprints{
        background: transparent;

    }
</style>
<style>

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
<script>
    <?php
    if(!isset($noadoption)){
        echo "$(window).on('load',function(){
            $('#myModal').modal('show');
        });
        $(document).ready(function(){
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            })
        });";
    }

    ?>
</script>
<body style="background-color: white">
<div class="modal fade" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <?php
                echo "<h5 class=\"modal-title\">Congratulations ! <br> you have officially adopted ".$pet_name."</h5>";
                ?>
            </div>
            <div class="modal-body" style="text-align: center">
                <img src="<?php echo $petphoto; ?>" alt="">
                <p style="font-size: 20px"> we would love to hear from you. <br> write a feedback ?</p>
            </div>
            <div class="modal-footer" style="align-content: center">
                <a href="delete_note.php?feedback=1"><button type="button" class="btn btn-primary mr-auto" >I would love to ! &nbsp; <i class="fa fa-heart"> </i></button></a>
                <a href="delete_note.php?">  <button type="button" class="btn btn-secondary  mr-auto" >No thanks&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-heart-broken"></i></button>
                </a>

            </div>
        </div>
    </div>
</div>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        <a class="navbar-brand" style="margin-top: -50px; color: white" href="home.php">
            <img src="img/HiPaw white.png" style="margin-left: -5px" width="35" height="35" class="d-inline-block align-top" alt="">
            <span >&nbsp; Hi Paw!</span>
        </a>
        <br><br><br>
        <a href="adopterProfile.php"><span><i class="fa fa-user"></i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;My Profile</span></span></a><br>
        <a  href="savedPets.php"><i class="material-icons">pets</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;Saved Pets</a></span>
        </a><br>
        <a style='color: white' href="request_m_adopter.php"><i class="material-icons">email</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;Requests<span></span></a>
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
                  <a style='color: white' class=\"dropdown-item\" href=\"request_m.php\">Requests</a>
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
        <div id="page-content-wrapper" style="background-color: white; ">

            <div class="container-fluid" style=" padding-top: 20px;">
                <div class="footprints container" style="padding: 40px;">
                    <div class="row" >
                        <?php
                        if(!isset($nodata)) {
                            for ($i = 0; $i < count($petids); $i++) {

                                echo " <div class=\"card\" style=\"width:300px; margin: 20px\">
                <img class=\"card-img-top\" src=\"" . $petphoto[$i] . "\" alt=\"Card image\" style=\"width:100%\">
                <div class=\"card-body\">
                    <h4 class=\"card-title\"> Owner :" . $adoptername . "</h4>
                    <p class=\"card-text\">you have sent a request to adopt " . $petnames[$i] . "</p>
                    <div class='row'> 
                    <div class='col-md-6' style='padding-right: 2px'> 
                    <a href=\"delete_request.php?request=" . $requestid[$i] . "\" style='width: 100%' class=\"btn btn-primary\">Cancel</a>
                    </div>
                    <div class='col-md-6' style='padding-left: 2px'> 
                     <a href=\"msg_req_adopter.php?request=" . $requestid[$i] . "&adopter=".$adopter[$i]."\" style='width: 100%' class=\"btn btn-primary\">Open</a>
                    </div>
                    
                    </div>
                    
                   
                </div>
            </div>";

                            }
                        }




                        ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

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
