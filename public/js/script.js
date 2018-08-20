// $.noConflict();
function setStyle(id, className) {
    localStorage.removeItem('lastId');
    localStorage.removeItem('lastClass');
    localStorage.setItem('lastId', id);
    localStorage.setItem('lastClass', className);

    var ids = ['showmenu', 'showmenu1', 'showmenu2', 'showmenu3', 'showmenu4', 'showmenu5'];
    var classes = ['menu', 'menu1', 'menu2', 'menu3', 'menu4', 'menu5'];

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
                                    // '<input type="text" name="member_position" placeholder="Position" class="_r_input_deco"></div>'+
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

});
