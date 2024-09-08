$(".city_check").on( "change", eventFilter );


function eventFilter() {

    $(".all-event-total").css("opacity",0);


    var mainarray = [];

    

    var state_check = [];
    $('#state_check :selected').each(function(){
        state_check.push($(this).val());

    });
    var state_checklist = "&state_check="+state_check;

    var city_check = [];
    $('#city_check :selected').each(function(){
        city_check.push($(this).val());

    });
    var city_checklist = "&city_check="+city_check;

    var main_string = state_checklist+city_checklist;
    main_string = main_string.substring(1, main_string.length);


    if(webpage_full_link != null){
        var link = webpage_full_link +'filter_event.php';
    }else{
        var link = 'filter_event.php';
    }

    $.ajax({
        type: "POST",
        url: link,
        data: main_string ,
        cache: false,
        success: function(html){
            //alert(html);


            $(".all-event-total").html(html);
            $(".all-event-total").css("opacity",1);
            // $("#loaderID").css("opacity",0);
        }
    });


}

// <!--    Listing Page Filter Script Ends-->


