
$(document).ready(function(){       
    var scroll_start = 0;
    var startchange = $('#startchange');
    var offset = startchange.offset();
    if (startchange.length){
        $(document).scroll(function() { 
            scroll_start = $(document).scrollTop();
            if(scroll_start > offset.top) {
                $(".navbar").css('background-color', '#f0f0f0');
            } else {
                $('.navbar').css('background-color', 'transparent');
            }
        });
    }
 });

rehomeImgW = new Image(40, 40);
rehomeImgB = new Image(40, 40);
browsePetsImgW = new Image(40, 40);
browsePetsImgB = new Image(40, 40);

rehomeImgW.src= "img/heart-sign-in-house-icon.png";
rehomeImgB.src = "img/heart-sign-in-house-icon  black.png";
browsePetsImgW.src = "img/cat_animal_-512.png";
browsePetsImgB.src = "img/cat_animal_-512 black.png";

function changeRTheme() {
    document.getElementById("rehomeImg").src= rehomeImgW.src;
}
function changeRTheme1() {
    document.getElementById("rehomeImg").src= rehomeImgB.src;    
}
function changeBTheme() {
    document.getElementById("browseImg").src= browsePetsImgW.src;    
}
function changeBTheme1() {
    document.getElementById("browseImg").src= browsePetsImgB.src;
}
