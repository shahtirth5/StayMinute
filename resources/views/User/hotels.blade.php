@extends('User.layouts.layout')

@section('page')
    <div class="container-fluid">
        <form class="mb-1">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-sm-3 col-xs-4">
                    <select name="" id="search_options" class="form-control">
                            <option value="1">All Hotels</option>
                            <option value="2">Popular Hotels</option>
                            <option value="3">Most Liked By You</option>
                            {{-- TODO : By Location--}}
                    </select>
                    
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-4">
                    <input type="text" class="form-control" placeholder="Keyword" id="search_keyword">
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <button class="btn btn-default" id="hotel_search" onclick="btnHotelSearchClicked(event)">Search</button>
                </div>
            </div>
        </form>
        <div id="hotel_search_results">

        </div>

        {{-- <div>
            <div class='panel p-1'><p><strong>Hotel</strong></p><p><strong>Address : </strong> b102,Aajikripa Bldg, Panchpakhadi, Thane(W) - 400602</p><p><strong>City : </strong>Thane</p><a href='#' class='btn btn-default pull-right'>View Details >></a><div class='clearfix'></div></div>
        </div> --}}
    </div>
@endsection