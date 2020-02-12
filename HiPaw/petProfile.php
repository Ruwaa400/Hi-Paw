<?php
session_start();

$_SESSION['pet_id'] = $_GET['pet_id'];   //comes from another page.
$PetId = $_SESSION['pet_id'];
//$petName= $ownerName=$type=$gender=$size=$years=$months="";

$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("SELECT type, name, gender, age_years, age_months, size, story, photo, health, details ,city FROM pet WHERE id = ?");
$stmt->bind_param("i", $_SESSION['pet_id']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows === 0){
    exit('error wrong id');
}
$stmt->bind_result($type, $petName,$gender,$age_years,$age_months,$size, $story,$photo,$health, $details ,$city);
$stmt->fetch();
$stmt->close();

$pet_is = array();
$stmt = $db->prepare("SELECT petis FROM pet_is WHERE pet_id = ?");
$stmt->bind_param("i", $_SESSION['pet_id']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows !== 0){
    $stmt->bind_result($idRow);
    while($stmt->fetch()) {
        $pet_is[] = $idRow;
    }
}
$stmt->close();

$pet_goodwith = array();
$stmt = $db->prepare("SELECT good_with FROM pet_goodwith WHERE pet_id = ?");
$stmt->bind_param("i", $_SESSION['pet_id']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows !== 0){
    $stmt->bind_result($idRow);
    while($stmt->fetch()) {
        $pet_goodwith[] = $idRow;
    }
}
$stmt->close();

$pet_likes = array();
$stmt = $db->prepare("SELECT likes FROM pet_likes WHERE pet_id = ?");
$stmt->bind_param("i", $_SESSION['pet_id']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows !== 0){
    $stmt->bind_result($idRow);
    while($stmt->fetch()) {
        $pet_likes[] = $idRow;
    }
}
if(isset($_SESSION['user-id'])){
    $stmt->close();
    $stmt = $db->prepare("SELECT id FROM saved_pets WHERE pet_id = ? and adopter_id = ?");
    $stmt->bind_param("ii", $_SESSION['pet_id'], $_SESSION['user-id']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows !== 0){
        $saved = 'true';
    }else {
        $saved = 'false';

    }
    $stmt->close();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=10">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hi Paw</title>

    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
  <script src="https://www.googletagservices.com/activeview/js/current/osd.js?cb=%2Fr20100101"></script>
  <script src="https://cdn.ampproject.org/rtv/011911070201440/amp4ads-host-v0.js"></script>
  <script type="text/javascript" async="" src="//static.criteo.net/js/ld/publishertag.prebid.js"></script>
  <script src="https://getyourpet.com/dist_1.1.82.2019110802/gyp.layout.lib.min.js" type="text/javascript"></script>

  <link rel="stylesheet" href="css/petProfile.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

  <link rel="stylesheet" href="https://getyourpet.com/_assets_1.1.82.2019110802/css/style.css">
  <link rel="stylesheet" href="https://getyourpet.com/dist_1.1.82.2019110802/gyp.layout.app.min.css">
  <link rel="stylesheet" href="https://getyourpet.com/dist_1.1.82.2019110802/gyp.layout.lib.min.css">  
  <link rel="stylesheet" href="/dist_1.1.82.2019110802/gyp.spa.lib.min.css">

  <link rel="icon" type="image/png" href="img/HiPawblack.png"/>

  <script>
      function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }

      function addToSavedButton() {
          //   TODO
          // check if the user is signed in..
          x = document.getElementById("addToSavedButton").innerText;
          if(x.localeCompare("Add to Saved")==0){
              document.getElementById("addToSavedButton").innerHTML = "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'><path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' fill='#2D8FD2' fill-rule='evenodd'></path></svg>Unsave";
              window.location.href = "savedProcess.php?state=true";
          }
          else{
              document.getElementById("addToSavedButton").innerHTML = "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'><path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' fill='#2D8FD2' fill-rule='evenodd'></path></svg>Add to Saved";
              window.location.href = "savedProcess.php?state=false";
          }
      }

      function connectWithOwner() {
          //   TODO
          // check if the user is signed in..
          <?php
          if(isset($_SESSION['user-id'])){
              echo "document.getElementById(\"contactMsgBox\").style.visibility=\"visible\";";}
          else{ echo "$(\"#notsigned\").modal();";
          }
          ?>
      }


      function hideContactMsgBox() {
        document.getElementById("contactMsgBox").style.visibility="hidden";  
      }

  </script>

</head>
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


 <!-- navbar -->
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #f0f0f0; position: fixed;">
    <a class="navbar-brand" href="home.php">
        <img src="img\HiPawblack.png" width="60" height="40" class="d-inline-block align-top" style="padding-left: 20px; margin-top: -10px;">
        <div class="superFont" style="margin-left: 55px;  margin-top: -33px; font-size: 28px; color: rgb(31, 30, 30); padding-left: 20px;"> Hi Paw!</div>
    </a>
    <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapse_target" style="margin-right: 10px;">
        <ul class="nav navbar-nav ml-auto" >
            <li class="navbar-item">
            <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="home.php#whatWeDo">What We Do</a>
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
                    echo " <li class=\"navbar-item active\">
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

            <li class="navbar-item">
            <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<div ng-app="mainApp" class="ng-scope">
    
    <div id="main-ng-view" class="slide-animation ng-scope" ng-view="" ncg-request-verification-token="CfDJ8HPe7nANJzVCvbp8kNgDhmM-BqXSAgBWDxmBn_7Dyj1B_MPrzyGXz4YtVJwE6jar5_iRjGFwQ-XLlkOlvR6rX_2FK6XzaT2qXHv_GN-pfibg2rbFP86un4rjIVTkdwSFnsx91Acykq1yswD0r01GKsY:CfDJ8HPe7nANJzVCvbp8kNgDhmNaoExp6adc4d6IaH2GL-OHaxqWqCt5qUITHKOsvrIh-vEI3t3PvY2wnhCwM5Sgg8ynopzK-Hz4FaQXPyWmiPy-8LQahgA2i95fev8mZ4sxa_svTbHr_x7WQhwkh1ORD_w" user-id="" is-guardian="false" is-adopter="false" is-vet-user="false" is-vet-admin="false" is-admin="false" web-api-timeout-seconds="30" web-api-video-upload-timeout-seconds="90" viewed-pet-initial-interval-seconds="30" viewed-pet-update-interval-seconds="10" viewed-pet-maximum-seconds-viewed="600" meet-up-details-refresh-interval-seconds="15" send-message-refresh-interval-seconds="60" dashboard-refresh-interval-seconds="60" user-action-retry-interval-miliseconds="250" maximum-number-of-user-action-retry-attempts="50" google-maps-key="AIzaSyBXMWNfAGgzM3T2z5Jkw9DQ1ie1hmUP7wo" guardian-skip-payment="true" community-membership-authorize-only="true" community-membership-skip-payment="true" community-membership-price="35" actual-adoption-prices="0,49,99" public-adoption-prices="0,49,99" pet-promotion-package-prices="0,5,10,20" adoption-skip-payment="false" adoption-skip-payment-offer-valid-through="8/31/2017" search-radius-near-me-in-miles="50" search-radius-not-too-far-from-me-in-miles="250" maximum-photo-file-size-in-megabytes="15" community-spots-near-me-search-radius-in-miles="50">
        <section class="main ng-scope">
          
            <div class="container-fluid content" ng-swipe-left="nextPet()" ng-swipe-right="previousPet()" ng-swipe-disable-mouse="true">
                <div><br><br><br><br><br><br><br></div>
                <div class="panel animate-slide-down-slide-up" ng-show="petUser &amp;&amp; pet &amp;&amp; petSearchPet">
                    <!-- top part  -->                    
                    <div class="overview row">  
                        <!-- photo & google map col-->              
                        <div class="col-md-6">
                            <div class="component slider">
                                <pet-images-carousel pet="pet" petsearchpet="petSearchPet">
                                    <!-- pet Photo  -->
                                    <div class="petPhoto">
                                        <img src="<?php echo $photo ?>">

                                    </div>
                                </pet-images-carousel>
                            </div>  
                            <div class="mob-pet-name hidden-md-up no-breed" ng-class="{'no-breed': pet.PetBreeds == null || pet.PetBreeds.length == 0}">
                                <h2 class="pet-name card-title m-t-2 ng-binding"></h2>
                                <br>
                            </div>

                            <div class="map m-t-3 hidden-sm-down m-b-0">
                                <p class="ng-binding">
                                    <img src="https://getyourpet.com/_assets_1.1.82.2019110802/images/icons/pin-blue.svg">
                                    Approximate Location — <?php echo $city ?>
                                </p>
                                <div>
                                    <?php
                                    $db = new mysqli("localhost", "root", "", "hipaw");
                                    if($db->errno){
                                        echo "error connecting to the database";
                                        exit;
                                    }

                                    $stmt ="SELECT map FROM location WHERE city = '".$city."'";
                                    $result = mysqli_query($db, $stmt);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $map=$row["map"];
                                    }
                                    echo ".$map.";
                                    ?>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193590.0505730405!2d-111.57588450039613!3d40.69942133908762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752611e94d3725f%3A0x190ec47f3a5436e6!2z2LPZiNmE2Kog2YTYp9mK2YMg2LPZitiq2YrYjCDZitmI2KrYpyA4NDEwOdiMINin2YTZiNmE2KfZitin2Kog2KfZhNmF2KrYrdiv2Kk!5e0!3m2!1sar!2s!4v1574462653797!5m2!1sar!2s" frameborder="0" style="border:0;" width= "100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- general Information col-->
                        <div class="col-md-6">
                            <ul class="specs">
                                <li class="ng-binding"><?php echo $type; ?> <span>Pet Type</span></li>
                                <li class="ng-binding"><?php echo $gender; ?> <span>Gender</span></li>
                                <?php if($age_years !== 0)
                                    echo "<li class=\"ng-binding\">".$age_years." Years<span>Age</span></li>";
                                if($age_months !== 0)
                                    echo "<li class=\"ng-binding\">".$age_months." Months<span>Age</span></li>";
                                ?>

                                <li popover-placement="auto top" class="ng-binding ng-scope"><?php echo $size; ?> <span>Size</span></li>
                            </ul>

                            <div class="desk-pet-name hidden-sm-down">
                                <div>
                                    <h2 class="pet-name card-title m-t-2 ng-binding">
                                        <?php echo $petName; ?>
                                        <svg ng-show="isAdopter &amp;&amp; userSavedPetId" popover-append-to-body="true" popover-enable="true" uib-popover="Nani is saved to your dashboard" popover-trigger="mouseenter" popover-placement="auto top" width="16" height="14" viewBox="0 0 16 14" xmlns="http://www.w3.org/2000/svg" class="ng-hide"><path d="M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128" fill="#2D8FD2" fill-rule="evenodd"></path></svg>
                                    </h2>
                                    <h5></h5>
                                </div>
                            </div>
                            <!-- story  -->
                            <p class="overflow-hidden ng-binding">
                                <?php echo $story; ?>
                            </p>
                            <div class="main-actions m-y-3 text-md-center">
                                <?php if(isset($_SESSION['user-table'])){
                                    if($_SESSION['user-table'] !== 'guardian'){
                                        echo "<button id=\"connect-button\" type=\"button\" onclick=\"connectWithOwner()\" class=\"btn btn-primary btn-lg m-r-1 d-inline\" style=\"z-index: 1;\">
                                    Connect with owner
                                </button>
                                <button type=\"button\" id=\"addToSavedButton\" onclick=\"addToSavedButton(".$PetId.")\"
                                        class=\"btn btn-lg btn-info add-to-saved d-inline\" title=\"Save Pet to your dashboard.\">";
                                        if(isset($saved)){
                                            if($saved == 'true'){
                                                echo "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'><path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' fill='#2D8FD2' fill-rule='evenodd'></path></svg>Unsave";
                                            }else echo "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' 
                                                  fill='#2D8FD2' fill-rule='evenodd'></path></svg>Add to Saved";
                                        }else echo "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' 
                                                  fill='#2D8FD2' fill-rule='evenodd'></path></svg>Add to Saved";
echo "   
                                </button>";
                                    }
                                    else echo"";
                                }
                                else {
                                    echo "<button id=\"connect-button\" type=\"button\" onclick=\"connectWithOwner()\" class=\"btn btn-primary btn-lg m-r-1 d-inline\" style=\"z-index: 1;\">
                                    Connect with owner";
                                }
                                ?>

                            </div>
                            <img src="img/pngfind.com-white-lines-png-3640.png" class="dashedLine1">
                            <img src="img/paw.png" class="paw1">
                            <div class="component component-tags">
                                <a target="_blanck" href="https://goo.gl/maps/AgrU2wokFJidpvLN9">
                                    <h5 class="m-b-0 ng-binding"> <?php echo $petName ?> is located in <?php echo $city ?> City.</h5>
                                </a>
                            </div>
                            <?php
                            if(!empty($pet_is))
                            echo "<div class=\"component component-tags\">
                                <h5 class=\"m-b-1 ng-binding\">".$petName." is…</h5>
                                <ul class=\"list-inline\">";
                            foreach ($pet_is as $selected)
                                echo " <li class=\"list-inline-item tag\">".$selected."</li>";
                            echo " </ul>
                            </div>";

                            if(!empty($pet_likes))
                                echo "<div class=\"component component-tags\">
                                <h5 class=\"m-b-1 ng-binding\">".$petName." likes…</h5>
                                <ul class=\"list-inline\">";
                            foreach ($pet_likes as $selected)
                                echo " <li class=\"list-inline-item tag\">".$selected."</li>";
                            echo " </ul>
                            </div>";

                            if(!empty($pet_goodwith))
                                echo "<div class=\"component component-tags\">
                                <h5 class=\"m-b-1 ng-binding\">".$petName." is good with…</h5>
                                <ul class=\"list-inline\">";
                            foreach ($pet_goodwith as $selected)
                                echo " <li class=\"list-inline-item tag\">".$selected."</li>";
                            echo " </ul>
                            </div>";
                            ?>

                        </div>
                    </div>
                </div>
                <br>

                <!-- info cards  -->
                <div class="animate-slide-down-slide-up">
                    <pet-full-profile pet="pet" pet-user="petUser" class="ng-isolate-scope">
                        <div class="row full-profile-row-padding">
                            <div class="col-md-10 col-md-offset-1 col-xs-12">
                                <div class="row full-profile-accordion-panel">
                                    <div class="col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
                                        <br>
                                        <!-- over card  -->
                                        <div id="overview" class="card accordion-panel">
                                            <div class="card-block accordion-heading" role="tab" id="headingOne">
                                                <h4 class="card-title accordion-title full-profile-title-align">
                                                    <a class="full-profile-title" data-toggle="collapse" target="_self" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Overview
                                                    </a>
                                                </h4>
                                            </div>
                                            <!-- card data  -->
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">                   
                                                <div class="accordion-content full-profile-content-text">
                                                    <!-- <div class="divider"></div> -->
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong">Name</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text">
                                                            <span class="ng-binding"><?php echo $petName ;?></span>
                                                        </div>                   
                                                    </div>
                                                    <!-- <div class="divider"></div> -->
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong ng-binding">Gender</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
                                                            <?php echo $gender ;?>
                                                        </div>
                                                    </div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong">Age</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
                                                            <?php
                                                            if($age_years != 0)
                                                                echo $age_years." years ";
                                                            if($age_months != 0)
                                                                echo $age_months." months ";
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong ng-binding">Size</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
                                                            <?php echo $size ;?>
                                                        </div>
                                                    </div>
                                                </div>              
                                            </div>               
                                        </div>
                                        <br>

                                        <?php if(!empty($health)) {
                                            echo "<div ng-show=\"pet.OtherDetail\" class=\"card accordion-panel\">
                                            <div class=\"card-block accordion-heading\" role=\"tab\" id=\"headingAdditionalInformation\">
                                                <h4 class=\"card-title accordion-title full-profile-title-align\">
                                                    <a class=\"full-profile-title\" data-toggle=\"collapse\" target=\"_self\" data-parent=\"#accordion\" href=\"#collapseHealth\" aria-expanded=\"true\" aria-controls=\"collapseHealth\">
                                                        Health
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id=\"collapseHealth\" class=\"panel-collapse collapse in\" role=\"tabpanel\" aria-labelledby=\"headingAdditionalInformation\">
                                                <div class=\"accordion-content full-profile-content-text\">
                                                    <div class=\"divider\"></div>
                                                    <div class=\"row list-group-item full-profile-group-item\">
                                                        <div class=\"col-md-12 full-profile-text ng-binding\">
                                                          ".$health."
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                        }?>
                                        <br>
                                        <?php
                                        if($details ==""){
                                            echo " <div ng-show=\"pet.OtherDetail\" class=\"card accordion-panel\">
                                            <div class=\"card-block accordion-heading\" role=\"tab\" id=\"headingAdditionalInformation\">
                                                <h4 class=\"card-title accordion-title full-profile-title-align\">
                                                    <a class=\"full-profile-title\" data-toggle=\"collapse\" target=\"_self\" data-parent=\"#accordion\" href=\"#collapseAdditionalInformation\" aria-expanded=\"true\" aria-controls=\"collapseAdditionalInformation\">
                                                        Additional Information
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id=\"collapseAdditionalInformation\" class=\"panel-collapse collapse in\" role=\"tabpanel\" aria-labelledby=\"headingAdditionalInformation\">
                                                <div class=\"accordion-content full-profile-content-text\">
                                                    <div class=\"divider\"></div>
                                                    <div class=\"row list-group-item full-profile-group-item\">
                                                        <div class=\"col-md-12 full-profile-text ng-binding\">".$details."</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                        }


                                        ?>




                                    </div>

                                </div>

                            </div>

                        </div>

                    </pet-full-profile>

                </div>
                <br>
            </div>

            <div class="container-fluid container-wrapper no-more-results text-xs-center animate-slide-down-slide-up" ng-show="petUser &amp;&amp; pet &amp;&amp; petSearchPet">
                <a ng-hide="pets.length == 0" onclick="scrollToTop()">Back to top</a>
            </div>
                
        </section>
    </div>
</div>


<?php
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt ="SELECT guardian.name, guardian.email from guardian, pet WHERE pet.owner= guardian.id and pet.id = ".$PetId."";
$result = mysqli_query($db, $stmt);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $owner=$row["name"];
    $ownerEmail=$row["email"];
}
?>

<div id="contactMsgBox" modal-render="true" tabindex="-1" role="dialog" class="signIn-signUp-msgBox modal fade ng-isolate-scope in" uib-modal-animation-class="fade" modal-in-class="in" ng-style="{'z-index': 1050 + index*10, display: 'block'}" uib-modal-window="modal-window" index="0" animate="animate" modal-animation="true" style="z-index: 1050; display: block;">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <a onclick="hideContactMsgBox()" class="text-xs-right" style="text-align: left!important; color: black; margin-left: 7px; margin-top: 10px;"><i class="far fa-times-circle"></i></a>

            <div class="modal-body ng-scope" style="text-align: center;">
                <br>
                <h2>Contact <span id="ownerName"><?php echo $owner ?></span></h2>
                <br>
                <label style="font-size: 13px;">Want To Adopt <span id="petname"><?php echo $petName ?></span>? Start Here:</label><br>

                <?php  echo " <a class=\"btn form-button\" href = \"emailForm.php?pet=".$PetId."\" target=\"_blank\">Send an Adoption Request</a> "; ?>

                <br><br><hr class="display1">
                <label>Have any further questions for <span id="ownerName"><?php echo $owner ?></span>?</label><br>
                Email at <a class="sendEmail" href="mailto:whatever@gmail.com?subject=#petName Adaption" id="ownerEmail"><?php echo $ownerEmail ?></a>
                <br><br>

            </div>
        </div>
    </div>
</div>
</body>
</html>