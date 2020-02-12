<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hi Paw</title>

    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/searchPagecss.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/nav_css.css">

    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>

    <link  rel="stylesheet" href="node_modules/ion-rangeslider/css/ion.rangeSlider.min.css">
    <script src="node_modules/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    <link  rel="stylesheet" href="node_modules/aos/dist/aos.css">
    <script src="node_modules/aos/dist/aos.js"></script>

    <script src="https://kit.fontawesome.com/e6e9f20ee5.js" crossorigin="anonymous"></script>


    <script type="text/javascript">
        <?php
        if(!isset($_SESSION['city'])){
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

        $(document).ready(function(){
            var multipleCancelButton = new Choices('#pet', {
                removeItemButton: true,
                resetScrollPosition: true,
                placeholder:true,
                placeholderValue: "search here",

            });
            var multipleCancelButton = new Choices('#color', {
                removeItemButton: true,
                resetScrollPosition: true,
                placeholder:true,
                placeholderValue: "search here",


            });
            var multipleCancelButton = new Choices('#age', {
                removeItemButton: true,
                resetScrollPosition: true,
                placeholder:true,
                placeholderValue: "search here",
                position: 'down',
            });
            var multipleCancelButton = new Choices('#city', {
                removeItemButton: true,
                resetScrollPosition: true,
                placeholder:true,
                placeholderValue: "search here",
                position: 'down',
                minItemCount: 1,
                removeItems: false,
            });
            var multipleCancelButton = new Choices('#gender', {
                removeItemButton: true,
                resetScrollPosition: true,
                placeholder:true,
                placeholderValue: "search here",
                position: 'down',
            });
            var multipleCancelButton = new Choices('#size', {
                removeItemButton: true,
                resetScrollPosition: true,
                placeholder:true,
                placeholderValue: "search here",
                position: 'down',
            });


        });
        $(document).ready(function(){
            $("#rangeslider").ionRangeSlider({
                type: "double",
                grid: true,
                min: 0,
                max: 20,
                from: 0,
                to: 20,
                onChange: function(data) {
                    $('#minv').val($('#rangeslider').data().from);
                    $('#maxv').val($('#rangeslider').data().to);

                },
            });

        });
        $(document).ready(function(){
            $('.dropdown-menu .custom').click(function(e) {
                e.stopPropagation();
            });
        });

        $(document).ready(function(){
        $('.colorheart').click(function() {
            $(this).toggleClass('colorheart far fa-heart');
            $(this).toggleClass('colorheart redheart fas fa-heart');
        });
        });
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });

function likepet(id) {

}
    </script>
    <style>

        .drop-btn{
            width: 100%;
            border-radius: 0px;

        }
        .drop-btn li, .drop-btn ul{
            width: 100%;
        }
        .drop-div{
            height:100%;
            width: 100%;
            margin: 0px 0px 0px 0px;
            padding: 0px;

        }

        .irs--flat .irs-bar{
            background-color: #4a9e61;
        }
        .irs--flat .irs-handle>i:first-child {

            background-color:#4a9e61;
        }
        .irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single {

            background-color:#4a9e61;

        }
        .irs--flat .irs-from:before, .irs--flat .irs-to:before, .irs--flat .irs-single:before {
            border-top-color: #4a9e61;
        }
        .irs--flat.irs-with-grid {
            margin-left: 10px;
            margin-right: 10px;
        }

        .choices__list--multiple .choices__item {

            background-color: #007b5e;
            border: 1px solid #007b5e;}
        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0b8f70;
            border-color: #007b5e;
        }
        .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(19, 176, 139,.5);
        }
.sec{

    height: 100%;
}
    </style>
    <title>Hi Paw</title>

</head>
<body style=" background: #eee">
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Choose your City</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="searchProcess.php">

                <select class="custom" name="city" id="city" required >
                    <option value="Nablus">Nablus</option>
                    <option value="Hebron">Hebron</option>
                    <option value="Jenin">Jenin</option>
                    <option value="Ramallah">Ramallah</option>
                    <option value="Jerusalem">Jerusalem</option>

                </select>
                    <input type="submit" class="btn btn-primary" value="Select">
                </form>

            </div>

            <!-- Modal footer -->
        </div>
    </div>
</div>




<div class="main-p container-fluid" style="padding-bottom: 50px">

    <nav class="navbar navbar-expand-md navbar-light" style="background-color: transparent;">
        <a class="navbar-brand" href="home.php">
            <img src="img/HiPaw black.png" width="45" height="45" class="d-inline-block align-top" alt="">
            <div class="superFont"> Hi Paw!</div>
        </a>
        <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">
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

                <li class="navbar-item">
                    <a class="nav-link" href="home.php#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 justify-content-center">
            <p class="moto"> Find Your Perfect <br> Pet Now!</p>
        </div>
        <div class="col-md-4"></div>
        <br><br><br>
    </div>

</div>
</div>



<section style="padding: 0px" id="team" class="sec pb-5">

    <div style="padding: 0px 0px" class="container-fluid">
        <!-- -->
        <form action="searchProcess.php" method="post" class="form-inline">
        <div class="select-row row" >

            <div class="select-col col-md-2">
                <div class="drop-div dropdown">
                    <button style="width:100%; height: 100%" class="drop-btn btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Pet
                    </button>
                    <ul  style="width:100%; height: 100%" class="dropdown-menu">
                        <li   class="selected" style="width:100%; height: 100%" >
                            <select name="type[]" class="custom" id="pet" multiple>
                                <option value="cat" >Cats</option>
                                <option value="dog">Dogs</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="select-col col-md-2">
                <div class="drop-div dropdown">
                    <button style="width:100%; height: 100%" class="drop-btn btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Gender
                    </button>
                    <ul  style="width:100%; height: 100%" class="dropdown-menu">
                        <li  class="selected" style="width:100%; height: 100%" >
                            <select class="custom" name="gender[]" id="gender" multiple>
                                <option value="female" >Female</option>
                                <option value="male">Male</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="select-col col-md-2">
                <div class="drop-div dropdown">
                    <button style="width:100%; height: 100%" class="drop-btn btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Fur Color
                    </button>
                    <ul  style="width:100%; height: 100%" class="dropdown-menu">
                        <li  style="width:100%; height: 100%" class="selected">
                            <select name="color[]" class="custom" id="color" placeholder="Select upto 5 tags"  multiple>
                                <option value="black">Black</option>
                                <option value="brown">Brown</option>
                                <option value="paige">Paige</option>
                                <option value="white">White</option>
                                <option value="grey">Grey</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="select-col col-md-2">
                <div class="drop-div dropdown">
                    <button style="width:100%; height: 100%" class="drop-btn btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Pet Size
                    </button>
                    <ul  style="width:100%; height: 100%" class="dropdown-menu">
                        <li  style="width:100%; height: 100%" class="selected">
                            <select name="size[]" class="custom" id="size" placeholder="Select upto 5 tags"  multiple>
                                <option value="L">Large</option>
                                <option value="M">Medium</option>
                                <option value="S">Small</option>

                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="select-col col-md-2" style=" ">

                <div class="drop-div dropdown">
                    <button style="width:100%; height: 100%" class="drop-btn btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Age
                    </button>
                    <ul  style="width:100%" class="dropdown-menu">
                        <li class="custom selected" style="width:100%">
                            <input type="number" name="age" class="custom slider-drop" id="rangeslider" data-extra-classes="irs-modern irs-primary">
                        </li>
                    </ul>
                </div>
            </div>
            <input type="hidden" name="minv" id="minv">
            <input type="hidden" name="maxv" id="maxv">
            <div class="select-col col-md-2">
                <input type="submit" class="drop-btn btn btn-primary" style="width: 100%; height: 100%; display: inline-block" value="Search">
            </div>
        </form>
        </div>


    </div>

    <!-- -->

    </div>
    <div class="footprints container" style="padding: 40px;">
        <h5 class="section-title h1" style="margin-top: 40px" data-aos="fade-up">SEARCH RESULTS</h5>
<div class="row">
<?php

if(isset($_SESSION['pet_ids_array'])) {
    if(!isset($_SESSION['no_pets'])) {

        $db = new mysqli("localhost", "root", "", "hipaw");
        if ($db->errno) {
            echo "error connecting to the database";
            exit;
        }
        $id_arr = [];
        $id_arr = $_SESSION['pet_ids_array'];
        foreach ($id_arr as $petid) {
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
                        <p class=\"heart\"><i  data-toggle=\"tooltip\" data-placement=\"top\" title=\"Like\" id='likedb' onclick=\"likepet(".$petid.")\" class=\"colorheart far fa-heart\"></i></p>
                        <button type=\"button\" onclick=\"window.location.href='petProfile.php?pet_id=".$petid."'\" class=\"btn btn-primary\">View Profile <i class=\"fas fa-paw\"></i> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";


        }
    }
    echo "<div class=\"col-md-12\" >
            <h3 style=\"text-align: center\">There's no more Results.</h3>
    </div>";
}
else {
echo "<div class=\"col-md-12\" >
            <h3 style=\"text-align: center\">There's no Result</h3>
    </div>";
}

?>



            </div>
    </div>
</section>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    AOS.init({
        offset: 100, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000 // values from 0 to 3000, with step 50ms
    });
</script>
</body>
</html>