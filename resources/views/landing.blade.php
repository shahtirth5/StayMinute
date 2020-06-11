<!DOCTYPE html>
<html>

<head>
    <title>StayMinute!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Landing.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Anton|Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=East+Sea+Dokdo|Indie+Flower|Ubuntu" rel="stylesheet">
    <style>
        .container {
            text-align: center;
        }

        nav {
            font-family: 'Ubuntu', sans-serif;
        }

        p {
            margin-top: 0px;
        }

        body {
            position: relative;
        }

        #section1 h1 {
            font-size: 70px;
        }

        #section2 h1 {
            font-size: 70px;
        }

        #section1 {
            padding-top: 100px;
            height: 100%;
            color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
            font-size: 1.5em;
            font-family: 'Anton', sans-serif;
            font-family: 'Lobster', cursive;
        }

        #section2 {
            padding-top: 150px;
            height: 100vh;
            color: #000;
            background-color: #fff;
        }

        #section2 h3 {
            font-family: 'Ubuntu', sans-serif;
            font-family: 'Indie Flower', cursive;
            font-family: 'East Sea Dokdo', cursive;
            font-size: 30px;
        }

        #section2 h4 {
            font-family: 'Anton', sans-serif;
            font-family: 'Lobster', cursive;
        }

        #section3 {
            padding-top: 50px;
            height: 100vh;
            color: #fff;
            background-size: cover;
        }

        #section41 {
            padding-top: 50px;
            height: 100vh;
            color: #000;
            background-size: cover;
        }

        #section41 p {
            font-family: 'Anton', sans-serif;
            font-family: 'Lobster', cursive;
        }

        #section42 {
            padding-top: 50px;
            padding-left: 100px;
            padding-right: 100px;
            height: 200vh;
            color: #000;
            background-color: #fff;
            font-family: 'Ubuntu', sans-serif;
        }

        .parallax1 {
            background: url(https://images.unsplash.com/photo-1496568816309-51d7c20e3b21?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .parallax2 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .parallax3 {
            background: url(https://images.unsplash.com/photo-1494526585095-c41746248156?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .parallax4 {
            background: url(https://images.unsplash.com/photo-1481277542470-605612bd2d61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1390&q=80);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .parallax5 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <section>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Stay Minute</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contact <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Our Hotels</a></li>
                        <li><a href="#">Bookings</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="section1" class="container-fluid parallax1" id="one">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <h1>Stay Minute!</h1>
                    <p>Book Hotels By Minute<br>
                        Appartments By Night!</p>
                </div>
            </div>
        </div>
        <div id="section2" class="container-fluid parallax2">
            <div class="row" style="width:80%;margin:0 auto;">
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <img src="https://static.wixstatic.com/media/ecb1e5e028b641cea81e1d235cabcfcb.jpg/v1/crop/x_1120,y_0,w_4480,h_4480/fill/w_251,h_251,al_c,q_80,usm_0.66_1.00_0.01/Barefoot%20Couple.webp"
                        class="img-circle" alt="Cinque Terre" width="230" height="230">
                </div>
                <div class="col-lg-8 col-sm-8 col-md-8">
                    <h1>It's OYO just better</h1>
                    <h3>I'd like to pay only for the time I use it!</h3>
                    <h4>-Everyone</h4>
                </div>
            </div>

        </div>
        <div id="section3" class="container-fluid parallax3">

        </div>
        <div id="section41" class="container-fluid parallax4">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <h1 style="margin:0 auto; width:60%; text-align: center;">HAPPY CUSTOMERS</h1>
                    <p style="margin:0 auto; width:60%; text-align: center;">
                        Between my personal training clients in the morning and filming commercials and movies in the
                        afternoon, being able to grab a quick nap in the middle of the day to recharge has been a total
                        game changer! Thanks STAYMINUTE
                        <br>
                        !LIZ H.SAN FRANCISCO
                    </p>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <h1 style="width:60%;margin:0 auto;">WHY STAYMINUTE?</h1>
                    <p style="width:60%;margin:0 auto;">
                        Customers use Stayminute for a quiet, luxurious, and private place where they can take a nap,
                        take a shower, make a private call or recharge between meetings, or before evening events. It's
                        a more comfortable and useful alternative to working from a coffee shop, fighting commuter
                        traffic or freshening up in an office.
                    </p>
                </div>
            </div>

        </div>
        <div id="section42" class="container-fluid parallax5">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <h1 style="width:60%;margin:0 auto;">GET IN TOUCH</h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <br>
                            <p style="width:60%;margin:0 auto;">StayMinute, Riidl Incubation Centre, Somaiya Vidyavihar,
                                Vidyavihar, Mumbai, Maharashtra 400077
                            </p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <br>
                            <p style="width:60%;margin:0 auto;">Tel : 8421624941
                                <br> 9309138129
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form action="/#" style="width:60%;margin:0 auto;">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div>
                <p>© 2019 by StayMinute. All rights reserved.</p>
            </div>
        </div>
    </section>
</body>

</html>