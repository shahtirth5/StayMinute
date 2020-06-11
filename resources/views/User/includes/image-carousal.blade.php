{{-- <div id="imageCarousel" class="carousel slide stretchy" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#imageCarousel" data-slide-to="1"></li>
        <li data-target="#imageCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ URL::to('/') }}/images/hotel-1.jpg"
                class="img-responsive" />
        </div>
        <div class="item">
            <img src="{{ URL::to('/') }}/images/hotel-2.jpg"
                class="img-responsive" />
        </div>
        <div class="item">
            <img src="{{ URL::to('/') }}/images/hotel-1.jpg"
                class="img-responsive" />
        </div>
    </div>
    <a class="left carousel-control" href="#imageCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
    <a class="right carousel-control" href="#imageCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
</div> --}}

{{-- <div id="hotel_images_carousel" class="owl-carousel">
    <img src="{{ URL::to('/') }}/images/hotel-1.jpg" class="img-responsive" />
    <img src="{{ URL::to('/') }}/images/hotel-2.jpg" class="img-responsive" />
    <img src="{{ URL::to('/') }}/images/hotel-1.jpg" class="img-responsive" />
</div> --}}

<div id="hotel-images-carousel" class="owl-carousel owl-theme">
    <div class="item"><img src="{{ URL::to('/') }}/images/hotel-1.jpg" class="img-responsive" /></div>
    <div class="item"><img src="{{ URL::to('/') }}/images/hotel-2.jpg" class="img-responsive" /></div>
    <div class="item"><img src="{{ URL::to('/') }}/images/hotel-1.jpg" class="img-responsive" /></div>
    <div class="item"><img src="{{ URL::to('/') }}/images/hotel-3.jpeg" class="img-responsive" /></div>
</div>