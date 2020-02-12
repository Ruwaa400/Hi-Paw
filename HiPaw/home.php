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
    <script type="text/javascript" src="js/home.js"></script>
    <title>Hi Paw</title>
    <link rel="icon" type="image/png" href="img/HiPaw black.png"/>

    <script>
        $('.carousel').carousel({
            interval: false
        })
    </script>


    <style>
        body {
            overflow-x: hidden;
        }
    </style>

    <style>
        /*feedback*/
        .feedback {
            filter: drop-shadow(2px 3px 6px rgba(0, 0, 0, 0.075));
            border-radius: 20px;
            height: 500px;
            background-color: white;
            padding-right: 0 !important;
        }
        .toLeft{
            width: 50%;
            float: left;
            padding: 50px;
            overflow: hidden;
        }
        .toRight {
            width: 100%;
            text-align: center;
        }
        .rightAndBack{
            background-image: url("img/Do Cats Hibernate In The Winter_ - CatTime.jpg");
            background-size: 100%;
            border-radius: 0 20px 20px 0;
            padding: 50px;
            width: 50%;
            height: 100%;
            float:right;
            background-repeat: no-repeat;
            background-position-x: right;
            background-position-y: center;
        }
        .next, .prev {
            margin-top: 50px;
            color: gray;
        }
        .whoCaresJustDisplay {
            margin-left: 40px;
            margin-right: 80px;
        }
        .textfeed {
            overflow: hidden;
            height: 220px;
            word-wrap: break-word !important;
        }
        .textfeed div {
            margin-top: -50px;
        }
        /* [SLIDER] */
        #slider,  #slider .slide{
            width: 400px;
            height: 320px;
        }
        #slider {
            overflow: hidden;
            margin: 0 auto;
        }
        #slider .containerSlide {
            position: relative;
            width: 9000px; /* Assign an insanely large width */
            top: 0;
            right: 0;
            animation: slide-animation 25s infinite;
        }
        #slider .slide {
            position: relative;
            float: left;
            box-sizing: border-box;
            padding-right: 20px;
        }
        /* [ANIMATION] */
        @keyframes slide-animation {
            0% {
                opacity: 0;
                right: 0;
            }
            11% {
                opacity: 1;
                right: 0;
            }
            22% { right: 100%; }
            33% { right: 100%; }
            44% { right: 200%; }
            55% { right: 200%; }
            66% { right: 300%; }
            77% { right: 300%; }
            88% {
                opacity: 1;
                right: 400%;
            }
            100% {
                opacity: 0;
                right: 400%;
            }
        }
        /*end feedback*/
    </style>


</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: transparent;">
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
                    <a class="dropdown-item" href="#whatWeDodiv">What We Do</a>
                    <a class="dropdown-item" href="#HowItWorks">How It Works</a>
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
                  <a class=\"dropdown-item\" href=\"#whatWeDodiv\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">Browse Pets</a>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">Saved Pets</a>
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
                  <a class=\"dropdown-item\" href=\"#whatWeDodiv\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">View Own Pets</a>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">Requests</a>
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
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<br>

<!-- carousel part -->
<section class="caruselSec">
    <div id="carouselExampleIndicators" class="carousel auto" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="slide carousel-item active parallax">
                <img src="https://getyourpet.com/wp-content/themes/gyp/assets/images/hero-lrg2.jpg" alt="background image">
            </div>
            <div class="slide carousel-item parallax">
                <img src="https://getyourpet.com/wp-content/themes/gyp/assets/images/hero-lrg5.jpg" alt="background image">
            </div>
            <div class="slide carousel-item parallax">
                <img src="https://getyourpet.com/wp-content/themes/gyp/assets/images/hero-lrg4.jpg" alt="background image">
            </div>
            <div class="slide carousel-item parallax">
                <img src="https://getyourpet.com/wp-content/themes/gyp/assets/images/hero-lrg.jpg" alt="background image">
            </div>

        </div>

    </div>
</section>

<div id="startchange" style="position: absolute; top: 30px;"><br></div>

<!-- top part & all its stuff -->
<div class="row text-center">
    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="SomethingToEncorageAdaption superFont"  data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0">
            Thousands of adoptable pets are looking for people.<br> People like you.
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
</div>
<?php if(!isset($_SESSION['user-id'])){
    echo "<div class=\"row text-center\"> 
  <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4\" data-aos=\"fade-up-right\" data-aos-duration=\"1000\" data-aos-delay=\"500\">
    <p class=\"NeedToRehomeaPet superFont\">
      Need To Rehome a Pet?   
    </p>
    <button onclick=\"window.location.href='sign-up.php?q=guardian'\" class=\"rehomePetButton btn btn-outline-dark btn-lg\" type=\"button\" onmouseover=\"changeRTheme()\" onmouseout=\"changeRTheme1()\">
      <img id=\"rehomeImg\" src=\"img/heart-sign-in-house-icon  black.png\" style=\"width: 40px;\" alt=\" image\">
      Rehome Pet
    </button>
  </div>
  <div class=\"col-xs-0 col-sm-0 col-md-2 col-lg-4 col-xl-4\"></div> 
  <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 align-self-center\" data-aos=\"fade-up-left\" data-aos-duration=\"1000\" data-aos-delay=\"300\">
    <p class=\"WantToAdaptaPet superFont\">
      Want To Adopt a Pet?
    </p>
    <div style=\"margin-top: 20px; margin-bottom: 40px;\">
      <button onclick=\"window.location.href='searchPage.php'\" class=\"browsePetsButton btn btn-outline-dark btn-lg\" type=\"button\" onmouseover=\"changeBTheme()\" onmouseout=\"changeBTheme1()\">
        <img id=\"browseImg\" src=\"img/cat_animal_-512 black.png\" style=\"width: 40px;\">
        Browse Pets
      </button>
    </div>
  </div>
    ";}
else{
    echo "<div class=\"row text-center\"> 
  <div class=\"col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3\"></div>
    <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6\">
      <div class=\"SomethingToEncorageAdaption superFont\"  data-aos=\"fade-down\" data-aos-duration=\"1000\" data-aos-delay=\"0\">
    
      </div>
    </div>
  <div class=\"col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3\"></div>
</div><div class=\"row text-center\"> 
  <div class=\"col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3\"></div>
    <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6\">
      <div class=\"SomethingToEncorageAdaption superFont\"  data-aos=\"fade-down\" data-aos-duration=\"1000\" data-aos-delay=\"0\">
        
      </div>
    </div>
  <div class=\"col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3\"></div>
</div>
<br><br>
";
}
?>

</div>
<!-- end of top part & all its stuff -->

<div style="margin-top: 24.5vw;"><br></div>


<!-- what we do -->
<div id="whatWeDodiv" class="flex-container" >
    <div class="WhatWeDoContainer" style="padding:0 20px 20px 20px; background-color: white; position: relative;">
        <!-- <br><br> -->
        <div class="row text-center" >
            <div class="Jumbotron col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3 class="section-title color-title bg-title WhatWeDo superFont" id="WhatWeDo" data-aos="fade-up"><br> <span> WHAT WE DO</span></h3>
                <hr class="display-1">
                <p class="WhatWeDo superFont" data-aos="zoom-in" data-aos-offset="50" data-aos-delay="100">Direct pet adoption, from one good home to another. Rehoming a dog or a cat keeps them out of shelters and streets.</p>
            </div>
        </div>
        <!-- img + captions -->
        <div class="row text-center">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3" data-aos="fade-right" data-aos-delay="400">
                <figure class="figure">
                    <img class="block img-WhatWeDo figure-img img-fluid rounded" src="img/adaptors img home.png">
                </figure>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 align-self-top" data-aos="fade-right" data-aos-delay="400">
                <br><br>
                <h4 class="Adobter superFont">Adopters</h4>
                <p class="Adobter superFont">meet and learn about pets from the Guardians (owners) who know them best.</p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3" data-aos="fade-left" data-aos-delay="700">
                <figure class="figure" >
                    <img class="img-WhatWeDo figure-img img-fluid rounded img-padding" src="img/gaurdian img home.png">
                </figure>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 align-self-top" data-aos="fade-left" data-aos-delay="700">
                <br><br>
                <h4 class="Adobter superFont img-padding">Guardians</h4>
                <p class="Adobter superFont">keep their pets out of the shelter. By rehoming a dog or cat, they can find them loving, new homes.</p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3" data-aos="fade-right" data-aos-delay="400">
                <figure class="figure">
                    <img class="img-WhatWeDo figure-img img-fluid rounded" src="img/vet img home.png" style="margin-top: 5vw;">
                </figure>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 align-self-top" data-aos="fade-right" data-aos-delay="400">
                <br><br>
                <h4 class="Adobter superFont">Local Veterinarians</h4>
                <p class="Adobter superFont">examine pets at no extra charge as a part of the pet adoption.</p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3" data-aos="fade-left" data-aos-delay="700">
                <figure class="figure">
                    <img class="img-padding img-WhatWeDo figure-img img-fluid rounded" src="img/pet img home.png">
                </figure>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 align-self-top" data-aos="fade-left" data-aos-delay="700">
                <br><br>
                <h4 class="Adobter superFont img-padding">Pets</h4>
                <p class="Adobter superFont">go directly from one loving home to another. Pet adoption with less stress. Less chance of illness or death.</p>
            </div>
        </div>
        <br><br><br><br>
        <!-- <div class="row text-center">
          <div class="col">
            <h4 class="superFont WhatWeDo">Everyone Benefits With Hi Paw!</h3>
          </div>
        </div>
        <hr class="display-2"> -->
    </div>
</div>
<!-- end what we do -->

<!-- See What People Are Saying  -->
<div class="container-fluid mindblowing">
    <div>

    </div>
</div>
<!-- end See What People Are Saying  -->
<?php
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt ="SELECT * FROM adopted_feedback ORDER BY id DESC";
$result = mysqli_query($db, $stmt);
if (mysqli_num_rows($result) > 4) {
    $row = $result->fetch_assoc();
    $feed1=$row['feedback'];
    $id1=$row['user_id'];
    $table1=$row['user_table'];
    $row = $result->fetch_assoc();
    $feed2=$row['feedback'];
    $id2=$row['user_id'];
    $table2=$row['user_table'];
    $row = $result->fetch_assoc();
    $feed3=$row['feedback'];
    $id3=$row['user_id'];
    $table3=$row['user_table'];
    $row = $result->fetch_assoc();
    $feed4=$row['feedback'];
    $id4=$row['user_id'];
    $table4=$row['user_table'];
    $row = $result->fetch_assoc();
    $feed5=$row['feedback'];
    $id5=$row['user_id'];
    $table5=$row['user_table'];
}
$stmt2 ="SELECT ".$table1.".name FROM adopted_feedback, ".$table1." WHERE ".$table1.".id=adopted_feedback.user_id AND adopted_feedback.user_id = ".$id1."";
$result2 = mysqli_query($db, $stmt2);
if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $name1=$row['name'];
}
$stmt2 ="SELECT ".$table2.".name FROM adopted_feedback, ".$table2." WHERE ".$table2.".id=adopted_feedback.user_id AND adopted_feedback.user_id = ".$id2."";
$result2 = mysqli_query($db, $stmt2);
if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $name2=$row['name'];
}
$stmt2 ="SELECT ".$table3.".name FROM adopted_feedback, ".$table3." WHERE ".$table3.".id=adopted_feedback.user_id AND adopted_feedback.user_id = ".$id3."";
$result2 = mysqli_query($db, $stmt2);
if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $name3=$row['name'];
}
$stmt2 ="SELECT ".$table4.".name FROM adopted_feedback, ".$table4." WHERE ".$table4.".id=adopted_feedback.user_id AND adopted_feedback.user_id = ".$id4."";
$result2 = mysqli_query($db, $stmt2);
if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $name4=$row['name'];
}
$stmt2 ="SELECT ".$table5.".name FROM adopted_feedback, ".$table5." WHERE ".$table5.".id=adopted_feedback.user_id AND adopted_feedback.user_id = ".$id5."";
$result2 = mysqli_query($db, $stmt2);
if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $name5=$row['name'];
}
?>

<!-- feedback -->
<section>
    <div class="top-section section-indent">
        <div class="flex-container" style="padding-bottom: 50px;">
            <h2 id="feedback" class="section-title capitalize-title color-title bg-title" data-aos="fade-up" data-aos-delay="0"><span><br></span></h2>

            <div class="container feedback">
                <div class="toLeft">
                    <h3 class="superFont" style="color: #289b84;">WHAT PEOPLE ARE SAYING...</h3>
                    <hr class="whoCaresJustDisplay">
                    <div id="slider">
                        <div class="containerSlide">

                            <div class="slide">
                                <p class="textfeed">
                                    <span style="padding-right: 15px;"><i class="fas fa-quote-left"></i></span>
                                    <?php echo $feed1; ?>
                                </p>
                                <br>
                                <div>&nbsp;&nbsp; - &nbsp; <?php echo $name1; ?></div>
                            </div>

                            <div class="slide">
                                <p class="textfeed">
                                    <span style="padding-right: 15px;"><i class="fas fa-quote-left"></i></span>
                                    <?php echo $feed2; ?>
                                </p>
                                <br>
                                <div>&nbsp;&nbsp; - &nbsp; <?php echo $name2; ?></div>
                            </div>

                            <div class="slide">
                                <p class="textfeed">
                                    <span style="padding-right: 15px;"><i class="fas fa-quote-left"></i></span>
                                    <?php echo $feed3; ?>
                                </p>
                                <br>
                                <div>&nbsp;&nbsp; - &nbsp; <?php echo $name3; ?></div>
                            </div>

                            <div class="slide">
                                <p class="textfeed">
                                    <span style="padding-right: 15px;"><i class="fas fa-quote-left"></i></span>
                                    <?php echo $feed4; ?>
                                </p>
                                <br>
                                <div>&nbsp;&nbsp; - &nbsp; <?php echo $name4; ?></div>
                            </div>

                            <div class="slide">
                                <p class="textfeed">
                                    <span style="padding-right: 15px;"><i class="fas fa-quote-left"></i></span>
                                    <?php echo $feed5; ?>
                                </p>
                                <br>
                                <div>&nbsp;&nbsp; - &nbsp; <?php echo $name5; ?></div>
                            </div>
                        </div>
                    </div>

                    <div style="float: right;">
                        <button type="button" onclick="location.href='feedback.php';" class="btn btn-outline-dark btn-sm">Read More <i class="fas fa-angle-double-right"></i></button>
                    </div>

                </div>
                <div class="rightAndBack">
                    <div class="toRight"></div>
                </div>

            </div>

        </div>
        <br>

    </div>
</section>
<!-- end feedback -->

<!-- how it works  -->
<section class="how" id="HowItWorks">
    <div class="container-fluid" id="how-it-works-section">

        <h5>How It Works</h5>

        <ul>
            <li class="title"><h3>Adopters <span>(Seeking a Pet)</span></h3></li>
            <li class="title"><h3>Guardians <span>(Pet Owners)</span></h3></li>
            <li>
                <h4>Browse Pet Profiles</h4>
                <p>It’s easy. Search by pet type, gender, location: dig deep into traits, breed, history and more.</p>
            </li>
            <li>
                <h4>List Your Pet</h4>
                <p>It’s easy. Create a profile of your pet in minutes and post it on Get Your Pet for Adopters to see.</p>
            </li>
            <li>
                <h4>Join &amp; Message with Guardians</h4>
                <p>When you find a pet that might be right for you, join the site and securely message their Guardian for more info.</p>
            </li>
            <li>
                <h4>Message with Potential Adopters</h4>
                <p>Answer adopters’ questions securely and fill them in on the pet you know so well.</p>
            </li>
            <li>
                <h4>Make a Meet-up</h4>
                <p>Arrange to meet at a neutral, convenient location, where the pet is calm and behaves naturally.</p>
            </li>
            <li>
                <h4>See the Vet</h4>
                <p>When you’ve made a good match, go see a local  Get Your Pet vet for a pet examination, at no extra charge.</p>
            </li>
            <li>
                <h4>Make a Legal Pet Adoption</h4>
                <p>Adopt a pet legally, electronically, right on our site.</p>
            </li>
        </ul>

        <div class="img-stack left" style="transform: translate3d(0px, 65.54px, 0px);">
            <img data-aos="zoom-in" data-aos-delay="200" src="https://getyourpet.com/wp-content/themes/gyp/assets/images/how1.jpg">
            <img data-aos="zoom-in" data-aos-delay="50" src="https://getyourpet.com/wp-content/themes/gyp/assets/images/how2.jpg">
        </div>

        <div class="img-stack right" style="transform: translate3d(0px, 33.8533px, 0px);">
            <img data-aos="zoom-in" data-aos-delay="200" src="https://getyourpet.com/wp-content/themes/gyp/assets/images/how3.jpg">
            <img data-aos="zoom-in" data-aos-delay="300" src="https://getyourpet.com/wp-content/themes/gyp/assets/images/how4.jpg">
        </div>

    </div>
</section>
<!-- end how it works -->

<!-- footer part -->
<div id="contact" class="footer-section">
    <div class="container">
        <div class="flex-row">
            <div class="col col-lg-48">
                <aside class="td_block_template_1 widget widget_text"> <div class="textwidget">
                        <div class="footer-review">
                            <div class="footer-review-position footerLogo1">
                                <img  src="img/HiPaw white.png" style="width: 80px; height: 80px;">
                                <div class="superFont footerLogo">Hi Paw!</div>
                                <div class="footerLogo2 superFont">Making Adoption Simpler.<br> From One Good Home To Another.</div>
                            </div>
                        </div>
                        <br>
                    </div>
                </aside>
            </div>
            <div class="col col-lg-72 col-footer-bottom">
                <div class="flex-row row-footer-l">
                    <div class="col col-lg-12">
                        <aside class="widget_text td_block_template_1 widget widget_custom_html">
                            <div class="textwidget custom-html-widget"><div class="footer-contact footer-col">
                                    <div class="block-title"><span>contact</span></div>
                                    <span style="display: block;">Al-Ersal Road</span>
                                    <span style="display: block;">Al-Bireh,</span>
                                    <span style="display: block;">Ramalla,</span>
                                    <span style="display: block;">Palestine</span>
                                    <br>+1 669-223-8682<br>
                                    <a href="mailto:HiPaw@gmail.com"> HiPaw@gmail.com</a>
                                </div>
                                <div class="footer-menu footer-col">
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="flex-row row-footer-r">
                    <div class="col col-lg-12">
                        <aside class="widget_text td_block_template_1 widget widget_custom_html">
                            <div class="textwidget custom-html-widget">
                                <div class="footer-col">
                                    <div class="footer-title" style="font-size: 16px;">Follow #HiPaw</div>
                                    <div class="footer-icon-wrapper clearfix">
                                        <a href="#" class="footer-icon" rel="nofollow noopener noreferrer" target="_blank"><i class="fab fa-facebook-f ifacebook"></i></a>
                                        <a href="#" class="footer-icon" rel="nofollow noopener noreferrer" target="_blank"><i class="fab fa-instagram iinstagram"></i></a>
                                        <a href="#" class="footer-icon" rel="nofollow noopener noreferrer" target="_blank"><i class="fab fa-snapchat-ghost isnapchat"></i></a>
                                        <a href="#" class="footer-icon" rel="nofollow noopener noreferrer" target="_blank"><i class="fab fa-google-plus-g igooglePlus"></i></a>
                                        <a href="#" class="footer-icon" rel="nofollow noopener noreferrer" target="_blank"><i class="fab fa-twitter itwitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------- -->
<div class="sub-footer-section">
    <div class="container">
        <div class="sub-footer-copy">
            © Copyright 2019 <a href="home.php">HiPaw.com</a>
        </div>
    </div>
</div>
<!-- end footer part -->





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