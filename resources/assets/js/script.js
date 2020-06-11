const base_url = 'http://localhost:8000/';
var cost = 0;
var bookings_array = [];
$(document).ready(function () {
    /*
    |------------------------------------|
    | Rating Hotel                       |
    |------------------------------------|
    */
    if(window.location.href.includes("/user/")){
        console.log(document.cookie.split(";"));
        var x = getCookie('user_id');
    }
    
    /*
    |------------------------------------|
    | Owl Carousel                       |
    |------------------------------------|
    */
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

    // Menu Toggle Script 
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //Time picker
    $(".time").timepicker({
        interval: 60,
        // timeFormat: 'HH:mm:ss'
    });

    //Date picker
    $(".date").datepicker({
        todayBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    });

    /*
    |------------------------------------|
    | Hotel Search                       |
    |------------------------------------|
    */
    var search_keyword = $("#search_keyword").val();
    $.ajax({
        type: "POST",
        url: base_url + "api/search/get-all-hotels",
        data: {
            keyword: search_keyword
        },
        success: function (response) {
            response = JSON.parse(response);
            for (let i = 0; i < response.length; i++) {
                $("#hotel_search_results").append(
                    "<div class='panel p-1'><p><strong>" + response[i].hotel_name + "</strong></p><p><strong>Address : </strong>" + response[i].hotel_address + "</p><p><strong>City : </strong>" + response[i].hotel_city + "</p><a href='" + base_url + "hotel/" + response[i].hotel_id + "' class='btn btn-default pull-right'> View Details >> </a><div class='clearfix'></div></div>"
                );
            }
        }
    });

    btnHotelSearchClicked = function (event) {
        event.preventDefault();
        $("#hotel_search_results").html("");
        var search_option = $("#search_options").val();
        var search_keyword = $("#search_keyword").val();
        switch (search_option) {
            case '1':
                // All hotels
                $.ajax({
                    type: "POST",
                    url: base_url + "api/search/get-all-hotels",
                    data: {
                        keyword: search_keyword
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        for (let i = 0; i < response.length; i++) {
                            $("#hotel_search_results").append(
                                "<div class='panel p-1'><p><strong>" + response[i].hotel_name + "</strong></p><p><strong>Address : </strong>" + response[i].hotel_address + "</p><p><strong>City : </strong>" + response[i].hotel_city + "</p><a href='" + base_url + "hotel/" + response[i].hotel_id + "' class='btn btn-default pull-right'> View Details >> </a><div class='clearfix'></div></div>"
                            );
                        }
                    }
                });
                break;
        }
    }

    /*
    |------------------------------------|
    | Hotel Booking                      |
    |------------------------------------|
    */
    $('#booking_date').change(function () {
        disableTimings();
        $("#booking_cost").html("Total cost would be : ₹ <strong>" + 0 + "</strong>");
        $("#booking_details").val("");
        showAvailableHotels();
    });

    $('#booking_room_type').change(function () {
        disableTimings();
        $("#booking_cost").html("Total cost would be : ₹ <strong>" + 0 + "</strong>");
        $("#booking_details").val("");
        showAvailableHotels();
        
    });

    $('#no_of_rooms').change(function () {
        disableTimings();
        $("#booking_cost").html("Total cost would be : ₹ <strong>" + 0 + "</strong>");
        $("#booking_details").val("");
        showAvailableHotels();
    });

    showAvailableHotels = function () {
        var booking_date = $("#booking_date").val();
        var booking_room_type = $("#booking_room_type").val();
        var no_of_rooms = $("#no_of_rooms").val();
        bookings_array = [];
        $.ajax({
            type: "POST",
            url: base_url + "api/booking-availabilities",
            data: {
                hotel_id: $("#hotel_id").html(),
                date: booking_date,
                room_type: booking_room_type,
                rooms: no_of_rooms
            },
            beforeSend: function () {
                $("#loader").removeClass("hidden");
            },
            success: function (response) {
                var bookings = JSON.parse(response);
                for (let i = 0; i < bookings.length; i++) {
                    var start = getHHFromTime(bookings[i].start_time);
                    var end = getHHFromTime(bookings[i].end_time);
                    var id = "#" + start + "-" + end;
                    $(id).removeAttr("disabled");
                }
                $("#loader").addClass("hidden");
                $("#timings input[type=checkbox]").change(function (event) {
                    bookings_array = [];
                    cost = 0;
                    var selected = [];
                    for (var i = 0; i < 24; i++) {
                        if ($('#' + i + "-" + (i + 1)).is(":checked")) {
                            selected.push((i + "-" + (i + 1)));
                        }
                    }
                    if ($("#23-0").is(":checked")) {
                        selected.push("23-0");
                    }

                
                    for (var i = 0; i < selected.length; i++) {
                        var times = selected[i].split('-');
                        var start_time = (parseInt(times[0]) > 9) ? times[0] + ":00:00" : "0" + times[0] + ":00:00";
                        var end_time = (parseInt(times[1]) > 9) ? times[1] + ":00:00" : "0" + times[1] + ":00:00";
                        for (var j = 0; j < bookings.length; j++) {
                            if (bookings[j].start_time == start_time && bookings[j].end_time == end_time) {
                                if(!bookings_array.includes[bookings[j]]){
                                    bookings_array.push(bookings[j]);
                                } else {
                                    console.log("Does not exist");
                                }
                            }
                        }
                    }

                    // $("#bookings").html();
                    $("#booking_details").val(JSON.stringify(bookings_array));
                    cost = getPricing(selected, bookings);
                    $("#booking_cost").html("Total cost would be : ₹ <strong>" + cost + "</strong>");
                    selected = [];
                });
            }
        });
    }
    
});

function getHHFromTime(time) {
    var t = time.split(":");
    var hour = parseInt(t[0]);
    return hour;
}

function getStringFromHH(HH) {
    if (HH < 10) {
        return "0" + HH + ":00:00";
    } else {
        return HH + ":00:00";
    }
}

function disableTimings() {
    for (var i = 0; i < 24; i++) {
        $('#' + i + "-" + (i + 1)).attr('disabled', true);
        $('#' + i + "-" + (i + 1)).prop('checked', false);
    }
    $('#23-0').attr('disabled', true);
    $('#23-0').prop('checked', false);

}

function getPricing(selected, bookings) {
    var price = 0;
    for (var i = 0; i < selected.length; i++) {
        var temp = selected[i].split("-");
        var start_time = getStringFromHH(temp[0]);
        var end_time = getStringFromHH(temp[1]);
        for (var j = 0; j < bookings.length; j++) {
            if (bookings[j].start_time == start_time && bookings[j].end_time == end_time) {
                price += bookings[j].pricing_per_hour;
            }
        }
    }
    return price;
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


/*
|------------------------------------|
| Responsive Carousel                |
|------------------------------------|
*/
// $('#hotel_images_carousel').owlCarousel({
    //     loop:true,
    //     nav:true,
    //     mouseDrag:true,
    //     touchDrag:true,
    //     navText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    //     navClass : ['owl-prev' , 'owl-next'],
    //     autoplay:true,
    //     autoplayHoverPause:true,
    //     autoHeight:true,
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:1
    //         },
    //         1000:{
    //             items:1
    //         }
    //     }
    // });
    // $(".owl-carousel").each(function (index, el) {
    //     var containerHeight = $(el).height();
    //     $(el).find("img").each(function (index, img) {
    //             var w = $(img).prop('naturalWidth');
    //             var h = $(img).prop('naturalHeight');
    //             var aspectRatio = w/h;
    //             var img_width = aspectRatio * 50;
    //             var margin = aspectRatio * 9;
    //             $(img).css({
    //                 'width' : (img_width) + 'vw',
    //                 'height':  60 + 'vh'
    //             });
    //         }),
    //         $(el).owlCarousel({
    //            loop:true,
    //            nav:true,
    //            navText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    //            navClass : ['owl-prev' , 'owl-next'],
    //            margin:10,
    //            responsive: {
    //             0: {
    //                 items: 1
    //             },
    //             600: {
    //                 items: 3
    //             },
    //             1000: {
    //                 items: 6
    //             }
    //         }
    //         });
    // });

    /*
|------------------------------------|
| Booking Form Changed               |
|------------------------------------|
*/
    // $('#booking_form').change(function () {
    //     console.log("CHANGED");
    //     disableTimings();
    //     var booking_date = $("#booking_date").val();
    //     var booking_room_type = $("#booking_room_type").val();
    //     $.ajax({
    //         type: "POST",
    //         url: base_url + "api/booking-availabilities",
    //         data: {
    //             hotel_id: $("#hotel_id").html(),
    //             date: booking_date,
    //             room_type: booking_room_type
    //         },
    //         success: function (response) {
    //             var bookings = JSON.parse(response);
    //             adjustBookings(bookings);
    //             for (let i = 0; i < bookings.length; i++) {
    //                 var start = getHHFromTime(bookings[i].start_time);
    //                 var end = getHHFromTime(bookings[i].end_time);
    //                 var id = "#" + start + "-" + end;
    //                 $(id).removeAttr("disabled");

    //             }

    //             $("#booking_timings").change(function (event) {
    //                 cost = 0;
    //                 var selected = [];
    //                 for (var i = 0; i < 24; i++) {
    //                     if ($('#' + i + "-" + (i + 1)).is(":checked")) {
    //                         selected.push((i + "-" + (i + 1)));
    //                     }
    //                 }
    //                 if ($("#23-0").is(":checked")) {
    //                     selected.push("23-0");
    //                 }
    //                 cost = getPricing(selected, bookings);
    //                 $("#booking_cost").html("Total cost would be : ₹ <strong>" + cost + "</strong>");
    //                 selected = [];
    //             });
    //         }
    //     });
    // });