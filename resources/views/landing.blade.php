<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StayMinute</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    <!-- HEADER SECTION -->
    <header>
        <!-- Second navbar for categories -->
        <nav class="navbar navbar-default">
            <div class="mr-1">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{{ URL::to('/') }}/images/Logo.png" class="mb-1"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Philosphy</a></li>
                    <li><a href="#">Dogma</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Our Hotels</a></li>
                    <li><a href="#">Bookings</a></li>
                    {{-- <li>
                        <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">Categories</a>
                    </li> --}}
                </ul>
                {{-- <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Development</a></li>
                    <li><a href="#">Graphic design</a></li>
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Motion</a></li>
                    <li><a href="#">Mobile apps</a></li>
                </ul> --}}
            </div>
            <!-- /.navbar-collapse -->
        </div>
            <!-- /.container -->
        </nav>
        <!-- /.navbar -->
    </header>

    <!-- END OF HEADER SECTION -->
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>