<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Login | StayMinute</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body style="
            background-image: url({{url('images/hotel-1.jpg')}});
            background-repeat : no-repeat;
            background-position : left center;
            background-size : cover;
            overflow-x : hidden;
            ">
    <div class="row">
        {{-- Form --}}
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 m-0 diag-div">
            <div class="bg-white ml-2 mr-2 p-4" style="height : 100vh !important;">
                <img src="{{ URL::to('/') }}/images/Logo.png" class="mb-1"> 
                @if(session('status'))
                    <div class="alert alert-success">Please verify <strong>e-mail</strong> and login</div>
                    {{session()->forget('status')}} 
                @endif
                <p style="font-size: 20px;"><strong>Login</strong></p>
                <form method="POST" action="{{URL::to('/verifyHotelLogin')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="hotel_name">Hotel Name</label>
                        <input type="text" name="hotel_name" id="hotel_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hotel_password">Password</label>
                        <input type="password" name="hotel_password" id="hotel_password" class="form-control">
                    </div>
                    @if (session()->has('error'))
                        <div>
                            <strong class="text-info">{!! session()->get('error') !!}</strong>
                        </div>
                        {{session()->forget('error')}}
                    @endif
                    <div style="form-group">
                        <button type="submit" class="form-control btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>