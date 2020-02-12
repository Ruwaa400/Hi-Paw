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
    <link rel="stylesheet" href="css/nav_css.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/creatPetProfile.css">
    <link  rel="stylesheet" href="node_modules/aos/dist/aos.css">
    <script src="node_modules/aos/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/e6e9f20ee5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- links for phto upload \__(`_`)__/ -->



    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#textarea_div').on( 'change keyup keydown paste cut', 'textarea', function (){
                $(this).height(0).height(this.scrollHeight);
            }).find( 'textarea' ).change();
        });
        $(document).ready(function(){
            $('#text_add').on( 'change keyup keydown paste cut', 'textarea', function (){
                $(this).height(0).height(this.scrollHeight);
            }).find( 'textarea' ).change();
        });
        $(document).ready(function(){
            $('#medical').change(function(){
                if(this.checked)
                    $('#textarea_medical').fadeIn('slow');
                else
                    $('#textarea_medical').fadeOut('slow');

            });
            $('#textarea_medical').on( 'change keyup keydown paste cut', 'textarea', function (){
                $(this).height(0).height(this.scrollHeight);
            }).find( 'textarea' ).change();
        });

        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

    </script>


    <style>

        input[type=radio].with-font{
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        input[type=radio].with-font:checked +label.type:not(:checked){
            color: #3880d6;
            border: 1px solid #3880d6;
            border-radius: 5px;
        }
        input[type=radio].with-font:checked +label.type:before{
            color: #3880d6;
        }

        input[type=radio].with-font:focus +label.type:before ,
        input[type=radio].with-font:focus +label.type
        {
            color: #3880d6;
        }
        .icon{

            font-size: 80px;

        }
        label.type{
            position: static;
            padding: 15px;
            height: max-content;
        }
        .test{
            overflow: visible;
            text-align: center;
            height: max-content;
            width: 60%;
            padding: 0;
            margin-left: 20%;
            margin-right: 20%;
            margin-bottom: 0;
        }
        legend{
            font-size: 1.3rem;
        }
        .radio_b {
            position: static;
            top: 10px;
            left: 10px;
        }
        label.radio_b{
            padding-left: 20px;
            font-size: 17.6px;
        }
.info_span{
    display: block;
    font-size: 17px; color: #373737; margin-right: -5px; margin-bottom: -15px;
}
        #textarea_medical{
            display: none;
        }
        .uploadImg {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            /* width: 150px; */
            width: 100%;
            height: fit-content;
            max-height: 500px;
            overflow-y: hidden;
        }
        .uploadImg img {
            width: 100%;

        }
        .image_label{
           position: relative;
            top: 0;
            left: 0;
        }
        .bg_img{
            position: absolute; opacity: 80%;
        }

    </style>
</head>
<body>


<div class="main" data-aos="zoom-in-up">
    <div style="position: absolute; top: 20px; left: 20px" class="d-flex w-50 order-0">
        <a class="navbar-brand" href="home.php" style="height: 40px">
            <img src="img/HiPaw black.png" width="40" height="40" class="d-inline-block align-top" alt="website icon" >
            <div style="color: #0a0a0a; font-size: 25px" class="superFont d-inline-block" > Hi Paw!</div>
        </a>
        <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <img class="bg_img" src="img/photo44.png" style="top: 250px; right: 20px;"/>
    <img class="bg_img" src="img/dotted_line_2.png" style=" height:200px; top: 450px; right: 130px;"/>
    <img class="bg_img" src="img/dotted_line.png" style=" height:200px;top: 750px; left: 40px;"/>
    <img class="bg_img" src="img/photo22.png" style="position: absolute; top: 900px; left: 20px;"/>
    <img class="bg_img" src="img/dotted_line.png" style=" height:200px; top: 1250px; left: 140px;"/>
    <img class="bg_img" src="img/dotted_line_2.png" style=" height:200px; top: 1300px; right: 110px;"/>
    <img class="bg_img"src="img/photo1.png" style="top: 1500px; right: 10px;"/>
    <img class="bg_img" src="img/dotted_line_2.png" style=" height:200px; top: 1800px; right: 200px;"/>
    <img class="bg_img" src="img/dotted_line.png" style=" height:200px;top: 2200px; left: 40px;"/>
    <img class="bg_img"src="img/photo11.png" style="top: 1900px; left: 20px;"/>
    <img class="bg_img" src="img/dotted_line.png" style=" height:200px; top: 2700px; left: 40px;"/>
    <img class="bg_img" src="img/dotted_line_2.png" style=" height:200px; top: 2500px; right: 110px;"/>
    <img class="bg_img"src="img/photo4.png" style="top: 2500px; right: 15px;"/>

    <!-- Sing in  Form -->
    <div class="row justify-content-center" style="margin: 30px">
        <div class="col-12-md justify-content-center">
            <h1> Creat your Pet's Profile </h1></div>
    </div>

    <div class="sign-in" >


        <div class="content container" data-aos="zoom-in-up">

            <form method="POST" action="creatpetProfileProcess.php" enctype="multipart/form-data" class="register-form" id="login-form">
                <br><br><br>
                <div class="test form-group justify-content-center"  >
                    <div class="row">
                        <div class="col-md-6">
                            <input id="cat" name="type" type="radio" class="with-font" value="cat" checked/>
                            <label for="cat" class="type"><i class="icon fas fa-cat"></i> Cat </label>
                        </div>
                        <div class="col-md-6">

                            <input id="dog" name="type" type="radio" class="with-font" value="dog" />
                            <label for="dog" class="type"><i class="icon fas fa-dog"></i> Dog </label>

                        </div>
                    </div>

                    <br>
                </div>
                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> What is your Pet's name ?</legend>

                        <input id="name" name="pet_name" type="text" placeholder="Your Pet's name" required><br>
                        <label for="name"></label>
                    </fieldset>
                </div>
                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> How old is your Pet?</legend>
                        <div>
                            <input style="width: 45%; display: inline" id="age_year" type="number" min="0" max="20" name="age_year" placeholder="years" required>
                            <input style="width: 45%; display: inline" id="age_month" type="number" min="0" max="12" name="age_mon" placeholder="months" required>
                        </div>
                        <span style="display: inline-block; color: #7d7d7d; margin-left: 20px">use approximate age if necessary</span>
                    </fieldset>
                </div>

                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> What is your Pet's Story ?</legend>
                        <div >In a few sentences, tell potential Adopters the things about your
                            cat that make your cat most endearing.
                            Fun behaviors, quirky habits: things that make your cat lovable.
                            Make it long enough and specific enough to make your cat stand out.
                            Prospective Adopters will see
                            this when they view your cat’s profile.</div><br>
                        <div id="textarea_div">
                                <textarea name="story" id="story" type="text" cols="10" placeholder="Your Pet's Story..." required>
                                </textarea></div><br>

                    </fieldset>
                </div>

                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> General Information </legend>
                        <span class="info_span" >Gender :</span>
                        <div class="row" >
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline; margin-left: 15px">
                                    <input value="female" type="radio" id="female" name="gender" class="radio_b custom-control-input" checked>
                                    <label class="radio_b custom-control-label" for="female" > Female </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="male" type="radio" id="male" name="gender" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="male">Male</label>
                                </div>
                            </div>
                        </div>
                        <span class="info_span" >Size :</span>
                        <div class="row" >
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline; margin-left: 15px">
                                    <input value="L" type="radio" id="L" name="size" class="radio_b custom-control-input" checked>
                                    <label class="radio_b custom-control-label" for="L" > Large </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="M" type="radio" id="M" name="size" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="M">Medium</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="S" type="radio" id="S" name="size" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="S">Small</label>
                                </div>
                            </div>
                        </div>
                        <span class="info_span">What kind of food does your Pet normally eat?</span>
                        <div class="row" >
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline; margin-left: 15px">
                                    <input value="canned" type="radio" id="canned" name="food" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="canned" > Canned </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="dry" type="radio" id="dry" name="food" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="dry">Dry</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="both" type="radio" id="both" name="food" class="radio_b custom-control-input" checked>
                                    <label class="radio_b custom-control-label" for="both">Both</label>
                                </div>
                            </div>
                        </div>
                        <span class="info_span">Where does your Pet stay when home alone?</span>
                        <div class="row" >
                            <div class="col-md-3">
                                <div class="custom-control custom-radio" style="display: inline; margin-left: 15px">
                                    <input value="inside loose" type="radio" id="inside_loose" name="alone" class="radio_b custom-control-input" checked>
                                    <label class="radio_b custom-control-label" for="inside_loose" > Inside Loose </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="inside confined" type="radio" id="inside_confined" name="alone" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="inside_confined">Inside Confined</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-control custom-radio" style="display: inline;">
                                    <input value="outside" type="radio" id="outside" name="alone" class="radio_b custom-control-input">
                                    <label class="radio_b custom-control-label" for="outside">Outside</label>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>

                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> Personality</legend>
                        <span class="info_span">your pet is . . .</span>
                        <div class="row">
                            <div class="boxes">

                                <input name="pet_is_list[]" type="checkbox" id="box-1" value="Active" checked>
                                <label for="box-1">Active (lots of energy)</label>

                                <input name="pet_is_list[]" type="checkbox" id="box-5" value="Calm" checked >
                                <label for="box-5">Calm </label>

                                <input name="pet_is_list[]" type="checkbox" id="box-6" value="Friendly" checked >
                                <label for="box-6">Friendly</label>

                                <input name="pet_is_list[]" type="checkbox" id="box-9" value="Shy">
                                <label for="box-9">Shy (hides)</label>

                                <input name="pet_is_list[]" type="checkbox" id="box-4" value="Nervous">
                                <label for="box-4">Nervous</label>
                                <br>
                                <input name="pet_is_list[]" type="checkbox" id="box-2" value="Quiet">
                                <label for="box-2">Quiet (laid back) </label>

                                <input name="pet_is_list[]" type="checkbox" id="box-3" value="Sensitive">
                                <label for="box-3">Sensitive</label>

                                <input name="pet_is_list[]" type="checkbox" id="box-7" value="Eager to please">
                                <label for="box-7">Eager to please</label>

                                <input name="pet_is_list[]" type="checkbox" id="box-8" value="Affectionate ">
                                <label for="box-8">Affectionate </label>
                            </div>
                        </div>
                        <span class="info_span">your pet likes . . .</span>
                        <div class="row">
                            <div class="boxes">

                                <input name="pet_likes_list[]" type="checkbox" id="likes-1" value="To be held or carried ">
                                <label for="likes-1">To be held or carried </label>

                                <input name="pet_likes_list[]" type="checkbox" id="likes-2" value="To be brushed">
                                <label for="likes-2">To be brushed</label>

                                <input name="pet_likes_list[]" type="checkbox" id="likes-3" value="To hunt">
                                <label for="likes-3">To hunt</label>

                                <input name="pet_likes_list[]" type="checkbox" id="likes-4" value="To be with people">
                                <label for="likes-4">To be with people</label>

                                <input name="pet_likes_list[]" type="checkbox" id="likes-5" value="To be petted">
                                <label for="likes-5">To be petted</label>

                                <input name="pet_likes_list[]" type="checkbox" id="likes-6" value="To ride in the car">
                                <label for="likes-6">To ride in the car</label>


                            </div>
                        </div>
                        <span class="info_span">your pet is good with . . .</span>
                        <div class="row">
                            <div class="boxes" >

                                <input name="pet_good_list[]" type="checkbox" id="goodwith-1" value="Dogs">
                                <label for="goodwith-1">Dogs</label>

                                <input name="pet_good_list[]" type="checkbox" id="goodwith-2" value="Cats">
                                <label for="goodwith-2">Cats</label>

                                <input name="pet_good_list[]" type="checkbox" id="goodwith-3" value="Children under 5">
                                <label for="goodwith-3">Children under 5</label>

                                <input name="pet_good_list[]" type="checkbox" id="goodwith-5" value="Children over 5">
                                <label for="goodwith-5">Children over 5</label>

                                <input name="pet_good_list[]" type="checkbox" id="goodwith-6" value="New People">
                                <label for="goodwith-6">New People</label>

                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> Health</legend>
                        <span class="info_span">Does you pet have any medical issues?</span>
                        <br>
                        <div>
                            <input value="yes" name="medical" type="checkbox" id="medical" >
                            <label for="medical">Yes</label>
                            <div id="textarea_medical">
                                <textarea name="medical_des" id="health" type="text" cols="10" required>
                                </textarea></div><br>
                        </div>
                  </fieldset>
                </div>
                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> Additional Information</legend>
                        <div>Add anything else you’d like potential adopters to know about your cat.
                            Be truthful and be positive. </div>
                        <br>
                        <div>
                            <div id="text_add">
                                <textarea name="additional" id="textarea_add" type="text" cols="10">
                                </textarea></div><br>
                        </div>
                    </fieldset>
                </div>

                <div class="form-group">
                    <fieldset style="width: 100%;">
                        <legend style="width: max-content; margin-left: 10px"> A picture of your pet</legend>
                        <span class="info_span">your pet colors . . . (choose your pet's most prominent colors)</span>
                        <div class="row">
                            <div class="boxes">

                                <input name="pet_color[]" type="checkbox" id="color-1" value="black">
                                <label for="color-1">Black</label>

                                <input name="pet_color[]" type="checkbox" id="color-2" value="brown">
                                <label for="color-2">Brown</label>

                                <input name="pet_color[]" type="checkbox" id="color-3" value="paige">
                                <label for="color-3">Paige</label>

                                <input name="pet_color[]" type="checkbox" id="color-4" value="white">
                                <label for="color-4">white</label>

                                <input name="pet_color[]" type="checkbox" id="color-5" value="grey">
                                <label for="color-5">Grey</label>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                <label for="file" class="image_label" style="cursor: pointer;">Upload Image</label><br>
                                <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" required>
                                <div class="uploadImg"><img id="output"/></div>

                            </div>

                        </div>


                    </fieldset>
                </div>
                <div class="form-group form-button justify-content-center" style="align-content: center; align-items: center; display: flex">

                            <input style="width: 40%" type="submit" name="save" id="save" class="form-submit" value="Save"/>

                </div>


            </form>

        </div>
    </div>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>


<script>
    AOS.init({
        offset: 100, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000 // values from 0 to 3000, with step 50ms
    });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
