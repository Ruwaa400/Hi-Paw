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

    <?php
    if(isset($_SESSION['not_signed_up'])){
        if ($_SESSION['not_signed_up'] == 'true') {
            echo
            "<script type=\"text/javascript\">
        $(window).on('load',function(){
            $('#notsigned').modal('show');
        });
              $('#notsigned') . modal('show');
             $(document).ready(function(){
        $('#notsigned').modal({
            backdrop: 'static',
            keyboard: false
        })
        });
        </script> ";

        }
    }
    ?>

    <?php
    if(isset($_SESSION['password'])){
        if ($_SESSION['password'] == 'wrong') {
            echo
            "<script type=\"text/javascript\">
        $(window).on('load',function(){
            $('#wrongpass').modal('show');
        });
              $('#wrongpass') . modal('show');
             $(document).ready(function(){
        $('#wrongpass').modal({
            backdrop: 'static',
            keyboard: false
        })
        });
        </script> ";

        }
    }
    ?>


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
                <a class="nav-link" href="sign-up.php">Adopt</a>
            </li>
            <li class="navbar-item">
                <a class="nav-link" href="sign-up.php">Rehome</a>
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


<div class="modal" id="notsigned">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Invalid Email </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                This email is not signed up.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='sign-up.php'">Sign up</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="wrongpass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Wrong Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                please re-enter your password.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >close</button>
            </div>

        </div>
    </div>
</div>



<div class="main" data-aos="zoom-in-up">
<!-- Sing in  Form -->
<div class="sign-in" >
    <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 10px; left: 20px; opacity: 50%"/>
    <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 10px; right: 20px; opacity: 50%"/>

    <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 250px; left: 20px; opacity: 50%"/>
    <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 250px; right: 20px; opacity: 50%"/>

    <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 490px; left: 20px; opacity: 50%"/>
    <img src="img/footprint.png" height="150" width="150" style="position: absolute; top: 490px; right: 20px; opacity: 50%"/>

    <div class="container" data-aos="zoom-in-up">
          <div class="signin-content">
            <div class="signin-image">
                <figure><img src="img/log-in2.jpg" alt="sing in image"></figure>
                <a href="sign-up.php" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>
                <form method="POST" action="loginProcess.php" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
               <!-- <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
</div>

</div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    AOS.init({
        offset: 100, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000 // values from 0 to 3000, with step 50ms
    });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
