


// $.noConflict();
function setStyle(id, className) {
    localStorage.removeItem('lastId');
    localStorage.removeItem('lastClass');
    localStorage.setItem('lastId', id);
    localStorage.setItem('lastClass', className);

    var ids = ['showmenu', 'showmenu1', 'showmenu2', 'showmenu3', 'showmenu4','showmenu8',
    'showmenu9','showmenu12','showmenu13'];
    var classes = ['menu', 'menu1', 'menu2', 'menu3', 'menu4','menu8','menu9','menu12','menu13'];

    ids.forEach(function (item, index) {
        if(ids[index] === id) {
            $('.'+className).show();
            if(document.getElementById(id))
                document.getElementById(id).classList.add("active");
        } else {
            $('.'+classes[index]).hide();
            if(document.getElementById(ids[index]))
                document.getElementById(ids[index]).classList.remove("active");
        }
    });
}
var lastId = localStorage.getItem('lastId');
var lastClass = localStorage.getItem('lastClass');
setStyle(lastId, lastClass);

jQuery(document).ready(function($){

//  include jBox
    new jBox('Modal', {
        attach: '._r-main-logo',
        width: 'auto',
        title: 'History of KGC',
        overlay: false,
        createOnInit: true,
        content: 'The history of the Kurmitola Golf Club can be traced back to 1950. At that time club was located at Sahrawardy Uddyan named as Dhaka Golf Club. Due to increase of interest in golf it was later shifted to abandon Kurmitola Airfield in 1955 which is now Hazrat Shahjalal (RA) International Airport. That area was later selected for International Airport and as such a committee was formed to select a suitable place. Accordingly the committee had selected the present location, than the Golf course shifted to it’s present location in 1966 which is now known as Kurmitola Golf Club. Total area of this club is 126.20 acres. This area is Defense land. Organized tournaments are being held regularly at Kurmitola Golf Club (KGC) after independence of country. Bangladesh Amateur Golf Championship (BAGC) an international golf tournament is being held KGC since 1982. Approximate 35 international amateur and professional golf tournaments held at KGC including two Asian Tour, one Asian Development Tour (ADT) and Professional Golf Tour of India (PGTI).',
        draggable: '#dragElement',
        repositionOnOpen: false,
        repositionOnContent: false,
        position: {
            y: 56
        }
    });

//  show mobile menu
    $("._r-mobile-menu").click(function(){
        $("ul").addClass("_r-show-mobile");
        $("._r-menu-item").addClass("animated slideInRight");
    });

//  change button
    $("._r-mobile-menu").click(function(){
        $("._r-mobile-menu").hide();
    });
    $("._r-mobile-menu").click(function(){
        $("._r-mobile-menu-cross").show();
    });


    $("._r-mobile-menu-cross").click(function(){
        $("._r-mobile-menu-cross").hide();
    });
    $("._r-mobile-menu-cross").click(function(){
        $("._r-mobile-menu").show();
    });

//  remove mobile menu
    $("._r-mobile-menu-cross").click(function(){
        $("ul").removeClass("_r-show-mobile");
    });


//  click on logo and remove mobile menu also icon change
    $("._r-main-logo").click(function(){

        $("ul").removeClass("_r-show-mobile");
    });

    $("._r-main-logo").click(function(){
        if($(window).width() < 768){
        $("._r-mobile-menu-cross").hide();}
    });
    $("._r-main-logo").click(function(){
        if($(window).width() < 768){
        $("._r-mobile-menu").show();}
    });
    //notice slider
    
     // notice slider
     var _scroll = {
        delay: 1000,
        easing: 'linear',
        items: 1,
        duration: 0.07,
        timeoutDuration: 0,
        pauseOnHover: 'immediate'
    };
    $('#ticker-1').carouFredSel({
        width: 1000,
        align: false,
        items: {
            width: 'variable',
            height: 35,
            visible: 1
        },
        scroll: _scroll
    });
 
 
    //  set carousels to be 100% wide
    $('.caroufredsel_wrapper').css('width', '100%');
 
    //  set a large width on the last DD so the ticker won't show the first item at the end
    $('#ticker-2 dd:last').width(2000);

// single image input

    $("#single-file-input").change(function () {
           readURL(this, 'singleImageId');
           $('.upload-icon').css('border-style', 'none');
       });
        

    function readURL(input, id) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#' + id).attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
       }
   }


   // Multi image input
    var count = 1;
    $('.add_row').on('click', function() {
        $('.mytbody').append('<div class="col-md-4"><div class="_r_wrap_col">'+
                                    '<div class="_r_committee_member upload-icon"><img id="multiImageId'+count+'"></div>'+
                                    '<label> Insert Image <input type="file" name="filename[]" id="multi-file-input'+count+'"></label>'+
                                    '<input type="text" name="name[]" placeholder="Name" class="_r_input_deco">'+
                                    '<input type="text" name="title[]" placeholder="Position" class="_r_input_deco"></div>'+
                                    '<div class="_r_remove_deco"><i class="fa fa-trash remove_area"></i></div>'+
                                    '</div>');



        $(".remove_area").on('click', function(){
            $(this).parent().parent("div").remove();
        });


         $("#multi-file-input"+count).change(function () {
                readURL(this);
                // $('.upload-icon').css('border-style', 'none');
            });

         console.log("#multi-file-input"+count);
          function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    count--;
                    $('#multiImageId'+count).attr('src', e.target.result);
                    console.log("#multi-file-input"+count);
                    count++;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
            count++;
        });


    // signature show
        $("#multi-file-input").change(function () {
            readURL(this, 'multiImageId');
            $('.upload-icon').css('border-style', 'none');
        });

         console.log("#multi-file-input");
          function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }     
        
        
        // create menu for admin
    $("#_r_show_nav_1").show();
    $("#_r_navbar_1").click(function(){
        $("#_r_show_nav_1").show();
        $("#_r_show_nav_2").hide();
        $("#_r_show_nav_3").hide();
        $("#_r_show_nav_4").hide();
    });

    $("#_r_navbar_2").click(function(){
        $("#_r_show_nav_1").hide();
        $("#_r_show_nav_2").show();
        $("#_r_show_nav_3").hide();
        $("#_r_show_nav_4").hide();
    });

    $("#_r_navbar_3").click(function(){
        $("#_r_show_nav_1").hide();
        $("#_r_show_nav_2").hide();
        $("#_r_show_nav_3").show();
        $("#_r_show_nav_4").hide();
    });

    $("#_r_navbar_4").click(function(){
        $("#_r_show_nav_1").hide();
        $("#_r_show_nav_2").hide();
        $("#_r_show_nav_3").hide();
        $("#_r_show_nav_4").show();
    });
    
    // Create menu sub nav
    $('._r_kgc_grid').on('click', function() {
    
        // $(this).class("active");
        $(this).addClass('_r_kgc_grid_deco').siblings().removeClass('_r_kgc_grid_deco');
        $(this).children().addClass('_r_kgc_li_deco');
        $(this).siblings().children().removeClass('_r_kgc_li_deco');
    
    });


    $("#_r_show_shedule_1").show();
    $("#_r_shedule_1").click(function(){
        $("#_r_show_shedule_1").show();
        $("#_r_show_shedule_2").hide();
        $("#_r_show_shedule_3").hide();
        $("#_r_show_shedule_4").hide();
        $("#_r_show_shedule_5").hide();
    });

    $("#_r_shedule_2").click(function(){
        $("#_r_show_shedule_1").hide();
        $("#_r_show_shedule_2").show();
        $("#_r_show_shedule_3").hide();
        $("#_r_show_shedule_4").hide();
        $("#_r_show_shedule_5").hide();
    });

    $("#_r_shedule_3").click(function(){
        $("#_r_show_shedule_1").hide();
        $("#_r_show_shedule_2").hide();
        $("#_r_show_shedule_3").show();
        $("#_r_show_shedule_4").hide();
        $("#_r_show_shedule_5").hide();
    });

    $("#_r_shedule_4").click(function(){
        $("#_r_show_shedule_1").hide();
        $("#_r_show_shedule_2").hide();
        $("#_r_show_shedule_3").hide();
        $("#_r_show_shedule_4").show();
        $("#_r_show_shedule_5").hide();
    });
    
     $("#_r_shedule_5").click(function(){
        $("#_r_show_shedule_1").hide();
        $("#_r_show_shedule_2").hide();
        $("#_r_show_shedule_3").hide();
        $("#_r_show_shedule_4").hide();
        $("#_r_show_shedule_5").show();
    });
    
    // Create menu sub nav
    $('._r_kgc_grid_se').on('click', function() {
    
        // $(this).class("active");
        $(this).addClass('_r_kgc_grid_deco').siblings().removeClass('_r_kgc_grid_deco');
        $(this).children().addClass('_r_kgc_li_deco');
        $(this).siblings().children().removeClass('_r_kgc_li_deco');
    
    });

 // gallery page

    $("#_r_gallery_body_1").show();
    $("#_r_gallery_1").click(function(){
        $("#_r_gallery_body_1").show();
        $("#_r_gallery_body_2").hide();
        $("#_r_gallery_body_3").hide();
    });

    $("#_r_gallery_2").click(function(){
        $("#_r_gallery_body_1").hide();
        $("#_r_gallery_body_2").show();
        $("#_r_gallery_body_3").hide();
    });

    $("#_r_gallery_3").click(function(){
        $("#_r_gallery_body_1").hide();
        $("#_r_gallery_body_2").hide();
        $("#_r_gallery_body_3").show();
    });
    
    // Create menu sub nav
    $('._r_kgc_gallery').on('click', function() {
    
        // $(this).class("active");
        $(this).addClass('_r_kgc_grid_deco').siblings().removeClass('_r_kgc_grid_deco');
        $(this).children().addClass('_r_kgc_li_deco');
        $(this).siblings().children().removeClass('_r_kgc_li_deco');
    
    });
    
    
    // home page

    $("#_r_home_body_1").show();
    $("#_r_home_1").click(function(){
        $("#_r_home_body_1").show();
        $("#_r_home_body_2").hide();
    });

    $("#_r_home_2").click(function(){
        $("#_r_home_body_1").hide();
        $("#_r_home_body_2").show();
    });
    
    // Create menu sub nav
    $('._r_kgc_home').on('click', function() {
    
        // $(this).class("active");
        $(this).addClass('_r_kgc_grid_deco').siblings().removeClass('_r_kgc_grid_deco');
        $(this).children().addClass('_r_kgc_li_deco');
        $(this).siblings().children().removeClass('_r_kgc_li_deco');
    
    });





    
 $('.add_schedule').on('click', function() {

            $('.mytbody').last().after(

                '<tr class="mytbody">' +

                '<td class=""> <input type="date" name="date[]"></td>' +

                '<td class=""> <input type="file" name="front9[]" ></td>' +

                '<td class=""> <input type="file" name="back9[]" ></td>' +

                '<td style="text-align:center">' +

                '<i class="fa fa-times remove_note_sheet_area text-center" style="color: red;font-size: 20px ;line-height: 1.5;"></i>' +

                '</td>'+

                '</tr>');



            $(".remove_note_sheet_area").on('click', function(){

                $(this).parent().parent("tr").remove();

            });

        });
        
        
        
            var count_button = 1;

                $('.add_button').on('click', function() {



                            $('.mybutton').last().after(

                                '<tr class="mybutton">' +

                                '<td>'+count_button+'</td>' +

                                '<td> <p>Button Name</p></td>' +

                                '<td> <input type="input" name="button_name[]"></td>' +

                                '<td> <p>Button link</p></td>' +

                                '<td> <input type="input" name="button_link[]"></td>' +

                                '<td style="text-align:center">' +

                                '<i class="fa fa-times remove_button text-center" style="color: red;font-size: 20px ;line-height: 1.5;"></i>' +

                                '</td>'+

                                '</tr>');

                            $(".remove_button").on('click', function(){

                                $(this).parent().parent("tr").remove();
                                count_button = 1;

                            });
                            count_button++;
                        });
                        
                        
                        
                        
                        
                        
                        // video backend js



var count_video = 1;

$('.add_video').on('click', function() {



            $('.myvideo').last().after(

                '<tr class="myvideo">' +

                '<td>'+count_video+'</td>' +

                '<td> <p>Insert video link after (=) sign</p></td>' +

                '<td> <input type="input" name="link[]"></td>' +

                '<td style="text-align:center">' +

                '<i class="fa fa-times remove_video text-center" style="color: red;font-size: 20px ;line-height: 1.5;"></i>' +

                '</td>'+

                '</tr>');



            $(".remove_video").on('click', function(){

                $(this).parent().parent("tr").remove();

            });



            count_video++;

        });
        
          // Multi image input
    var count = 1;
    $('.add_gallery').on('click', function() {
        $('.myGallery').append('<div class="col-md-4"><div class="_r_wrap_col">'+
                                    '<div class="_r_committee_member upload-icon"><img id="multiImageId'+count+'"></div>'+
                                    '<label> Insert Image <input type="file" name="img_url[]" id="multi-file-input'+count+'"></label>'+
                                    // '<input type="text" name="name[]" placeholder="Name" class="_r_input_deco">'+
                                    // '<input type="text" name="title[]" placeholder="Position" class="_r_input_deco"></div>'+
                                    '<div class="_r_remove_deco"><i class="fa fa-trash remove_area"></i></div>'+
                                    '</div>');



        $(".remove_area").on('click', function(){
            $(this).parent().parent("div").remove();
        });


         $("#multi-file-input"+count).change(function () {
                readURL(this);
                // $('.upload-icon').css('border-style', 'none');
            });

         console.log("#multi-file-input"+count);
          function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    count--;
                    $('#multiImageId'+count).attr('src', e.target.result);
                    console.log("#multi-file-input"+count);
                    count++;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
            count++;
        });


    // signature show
        $("#multi-file-input").change(function () {
            readURL(this, 'multiImageId');
            $('.upload-icon').css('border-style', 'none');
        });

         console.log("#multi-file-input");
          function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }     
        





// Gallery image hover

$( ".img-wrapper" ).hover(

  function() {

    $(this).find(".img-overlay").animate({opacity: 1}, 600);

  }, function() {

    $(this).find(".img-overlay").animate({opacity: 0}, 600);

  }

);



// Lightbox

var $overlay = $('<div id="overlay"></div>');

var $image = $("<img>");

var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');

var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');

var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');



// Add overlay

$overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);

$("#gallery").append($overlay);



// Hide overlay on default

$overlay.hide();



// When an image is clicked

$(".img-overlay").click(function(event) {

  // Prevents default behavior

  event.preventDefault();

  // Adds href attribute to variable

  var imageLocation = $(this).prev().attr("href");

  // Add the image src to $image

  $image.attr("src", imageLocation);

  // Fade in the overlay

  $overlay.fadeIn("slow");

});



// When the overlay is clicked

$overlay.click(function() {

  // Fade out the overlay

  $(this).fadeOut("slow");

});



// When next button is clicked

$nextButton.click(function(event) {

  // Hide the current image

  $("#overlay img").hide();

  // Overlay image location

  var $currentImgSrc = $("#overlay img").attr("src");

  // Image with matching location of the overlay image

  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');

  // Finds the next image

  var $nextImg = $($currentImg.closest(".image").next().find("img"));

  // All of the images in the gallery

  var $images = $("#image-gallery img");

  // If there is a next image

  if ($nextImg.length > 0) { 

    // Fade in the next image

    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);

  } else {

    // Otherwise fade in the first image

    $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);

  }

  // Prevents overlay from being hidden

  event.stopPropagation();

});



// When previous button is clicked

$prevButton.click(function(event) {

  // Hide the current image

  $("#overlay img").hide();

  // Overlay image location

  var $currentImgSrc = $("#overlay img").attr("src");

  // Image with matching location of the overlay image

  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');

  // Finds the next image

  var $nextImg = $($currentImg.closest(".image").prev().find("img"));

  // Fade in the next image

  $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);

  // Prevents overlay from being hidden

  event.stopPropagation();

});



// When the exit button is clicked

$exitButton.click(function() {

  // Fade out the overlay

  $("#overlay").fadeOut("slow");

});

// count down

function makeTimer() {

            var sc = $('#sc_date').html();

            var endTime = new Date(sc);            
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400); 
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }

            $("#days").html(days + "<span></span>");
            $("#hours").html(hours + "<span></span>");
            $("#minutes").html(minutes + "<span></span>");
            $("#seconds").html(seconds + "<span></span>");       

    }

    setInterval(function() { makeTimer(); }, 1000);

//Home page button

                var count_button = 1;

                $('.add_home_button').on('click', function() {



                            $('.myHomebutton').last().after(

                                '<tr class="myHomebutton">' +

                                '<td>'+count_button+'</td>' +

                                '<td> <p>Button Name</p></td>' +

                                '<td> <input type="input" name="home_button_name[]"></td>' +

                                '<td> <p>Button link</p></td>' +

                                '<td> <input type="input" name="home_button_link[]"></td>' +

                                '<td style="text-align:center">' +

                                '<i class="fa fa-times remove_home_button text-center" style="color: red;font-size: 20px ;line-height: 1.5;"></i>' +

                                '</td>'+

                                '</tr>');

                            $(".remove_home_button").on('click', function(){

                                $(this).parent().parent("tr").remove();
                                count_button = 1;

                            });
                            count_button++;
                        });
                        
                        
                        

});



