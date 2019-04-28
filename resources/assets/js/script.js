$(document).ready(function () {
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
    $(".owl-carousel").each(function (index, el) {
        var containerHeight = $(el).height();
        $(el).find("img").each(function (index, img) {
                var w = $(img).prop('naturalWidth');
                var h = $(img).prop('naturalHeight');
                var aspectRatio = w/h;
                var img_width = aspectRatio * 50;
                var margin = aspectRatio * 9;
                $(img).css({
                    'width' : (img_width) + 'vw',
                    'height':  60 + 'vh'
                });
            }),
            $(el).owlCarousel({
               loop:true,
               nav:true,
               navText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
               navClass : ['owl-prev' , 'owl-next'],
               margin:10,
               responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
            });
    });

    // $('#hotel-images-carousel').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     nav: true,
    //     lazyLoad: true,
        // responsive: {
        //     0: {
        //         items: 1
        //     },
        //     600: {
        //         items: 1
        //     },
        //     1000: {
        //         items: 1
        //     }
        // }
    // })

    // Menu Toggle Script 
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //Time picker
    $(".time").timepicker({
        interval: 60
    });

    //Date picker
    $(".date").datepicker({
        todayBtn: true,
        format : "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    });
});