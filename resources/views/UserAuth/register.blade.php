<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up | StayMinute</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="bg-white hide-scroll">
        <div class="row m-0">
            {{-- Form --}}
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0 pl-2 pt-2">
                <div>
                    <img src="{{ URL::to('/') }}/images/Logo.png" class="mb-1">
                    <p style="font-size: 20px;"><strong>Sign Up</strong></p>
                    <form method="POST" action="{{URL::to('/unverified-register')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                    <label for="sign_up_first_name">First Name</label>
                                    <input type="text" name="sign_up_first_name" id="sign_up_first_name" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                    <label for="sign_up_last_name">Last Name</label>
                                    <input type="text" name="sign_up_last_name" id="sign_up_last_name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="sign_up_email">E-mail</label>
                                <input type="email" name="sign_up_email" id="sign_up_email" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="sign_up_phone">Phone No.</label>
                                <input type="text" name="sign_up_phone" id="sign_up_phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sign_up_password">Password</label>
                            <input type="password" name="sign_up_password" id="sign_up_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sign_up_confirm_password">Confirm Password</label>
                            <input type="password" name="sign_up_confirm_password" id="sign_up_confirm_password" class="form-control">
                        </div>
                        <div style="form-group">
                            <button type="submit" class="form-control btn btn-primary">Sign Up</button>
                        </div>
        
                        <p class="mt-1">Already Have An Account ? <span><a href="login">Log In Here</a></span></p>
                    </form>
                </div>
            </div>

            {{-- Image --}}
            <div class="col-lg-8 col-md-8 m-0 p-0 left-diag-img">
                <img src="{{ URL::to('/') }}/images/hotel-2.jpg" class="img-responsive m-0">
            </div>
        </div>
</body>
</html>