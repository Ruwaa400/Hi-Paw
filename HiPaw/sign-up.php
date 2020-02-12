<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hi Paw</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/signing.css">

    <link  rel="stylesheet" href="node_modules/aos/dist/aos.css">
    <script src="node_modules/aos/dist/aos.js"></script>
    <style>
        .radio_b {
            position: static;
            top: 10px;
            left: 10px;
        }
        label.radio_b{
            padding-left: 20px;
        }

    </style>

    <?php
    if(isset($_SESSION['error-duplication'])){
        if ($_SESSION['error-duplication'] == 'true') {
            echo
            "<script type=\"text/javascript\">
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
              $('#myModal') . modal('show');
             $(document).ready(function(){
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        });
        </script> ";

        }
    }
    ?>


    <script>

        function validate_pass(){
           if( document.getElementById("re_pass").value !== document.getElementById("pass").value){
               document.getElementById("re_pass").style.border = "2px solid #c93441";

               event.preventDefault();
               returnToPreviousPage();

               return false;
           }
           else {
               return true;
           }
        }

    </script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light" style="background: transparent;">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand" href="home.php" style="height: 40px">
            <img src="img/HiPaw black.png" width="40" height="40" class="d-inline-block align-top" alt="website icon" >
            <div class="superFontHome" > Hi Paw!</div>
        </a>
        <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="superFont collapse navbar-collapse justify-content-centre" id="collapse_target">
        <ul class="nav navbar-nav ml-auto" >
            <li class="navbar-item">
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
            <li class="navbar-item">
                <a class="nav-link" href="sign-up.php?q=adopter">Adopt</a>
            </li>
            <li class="navbar-item">
                <a class="nav-link" href="sign-up.php?q=guardian">Rehome</a>
            </li>
            <li class="navbar-item">
                <a class="nav-link" href="log-in.php">Login</a>
            </li>
            <li class="navbar-item">
                <a class="nav-link" href="home.php#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>


<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Invalid Email </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                There's a user that already exists with this email.
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<div class="main" data-aos="zoom-in-up">

    <!-- Sign up form -->
    <div class="signup">
        <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 10px; left: 20px; opacity: 50%"/>
        <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 10px; right: 20px; opacity: 50%"/>

        <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 250px; left: 20px; opacity: 50%"/>
        <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 250px; right: 20px; opacity: 50%"/>

        <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 490px; left: 20px; opacity: 50%"/>
        <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 490px; right: 20px; opacity: 50%"/>

        <div class="container" data-aos="zoom-in-up">


            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="sign-up">Sign up</h2>
                    <form onsubmit="validate_pass();" method="POST" action="sign-up-process.php" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input minlength="10" type="password" name="pass" id="pass" placeholder="Password"  required/>
                        </div>
                        <div class="form-group">
                            <label for="re_pass" ><i class="zmdi zmdi-lock-outline"></i></label>
                            <input minlength="10"  type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                        </div>
                        <div class="form-group">
                            <label for="city"></label>
                            <select style="font-size: 13px" class="form-control" id="city" name="city">
                                <option selected disabled>Choose your city...</option>
                                <option value="Nablus">Nablus</option>
                                <option value="Hebron">Hebron</option>
                                <option value="Jenin">Jenin</option>
                                <option value="Ramallah">Ramallah</option>
                                <option value="Jerusalem">Jerusalem</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input value="adopter" type="radio" id="adopter" name="aorg" class="radio_b custom-control-input" <?php if(isset($_GET['q'])){{
                                    if($_GET['q']=='adopter')
                                    echo "checked";}}
                                    else echo "checked";
                                        ?>>
                                <label class="radio_b custom-control-label" for="adopter" >I want to adopt a pet.</label>
                            </div>
                            <div class="radio_b custom-control custom-radio">
                                <input value="guardian" type="radio" id="guardian" name="aorg" class="radio_b custom-control-input"
                                    <?php if(isset($_GET['q'])){
                                        if($_GET['q']=='guardian')
                                            echo "checked";}
                                    ?>>
                                <label class="radio_b custom-control-label" for="guardian">I want to rehome a pet.</label>
                            </div>

                        </div>
                        <div class="form-group form-button ">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>

                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="img/sign-up2.jpg" alt="sing up image"></figure>
                    <a href="log-in.php" class="signup-image-link">I am already a member</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sing in  Form -->

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Initialize Bootstrap functionality -->
<script>
    AOS.init({
        offset: 100, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000 // values from 0 to 3000, with step 50ms
    });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
