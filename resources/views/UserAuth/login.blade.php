<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | StayMinute</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body class="bg-white hide-scroll">
    <div class="row m-0">
        {{-- Image --}}
        <div class="right-diag-img col-lg-8 col-md-8 m-0 p-0" id="slideshow">
            <img src="{{ URL::to('/') }}/images/hotel-1.jpg" class="img-responsive m-0">
        </div>

        {{-- Form --}}
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0 pr-2 pt-2">
            <div>
                <img src="{{ URL::to('/') }}/images/Logo.png" class="mb-1">
                @if(session('status'))
                    <div class="alert alert-success">Please verify <strong>e-mail</strong> and login</div>
                    {{session()->forget('status')}}
                @endif
                <p style="font-size: 20px;"><strong>Login</strong></p>
                <form method="POST" action="{{URL::to('/verifylogin')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="login_email">Email</label>
                        <input type="email" name="login_email" id="login_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <input type="password" name="login_password" id="login_password" class="form-control">
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

                    <p class="mt-1">Don't Have An Account ? <span><a href="register">Sign Up Here</a></span></p>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>