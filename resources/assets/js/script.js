$(document).ready(function () {
    $('#hotel_images_carousel').owlCarousel({
        loop:true,
        nav:true,
        mouseDrag:true,
        touchDrag:true,
        navText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        navClass : ['owl-prev' , 'owl-next'],
        autoplay:true,
        autoplayHoverPause:true,
        autoHeight:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});