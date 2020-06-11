<!-- HEADER SECTION -->
<header>
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Welcome <strong>{{session()->get('hotel_name')}}</strong></a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class={{Request::path() == 'hotel/dashboard' ? 'active' : ''}}><a href="{{url('/hotel/dashboard')}}">Home</a></li>
                <li class={{Request::path() == 'hotel/publishAvailability' ? 'active' : ''}}><a href="{{url('/hotel/publishAvailability')}}">Publish Availabilities</a></li>
                <li class={{Request::path() == 'hotel/viewPublishedAvailability' ? 'active' : ''}}><a href="{{url('/hotel/viewPublishedAvailability')}}">View Published Availabilities</a></li>
                <li class={{Request::path() == 'hotel/checkin' ? 'active' : ''}}><a href="{{url('/hotel/checkin')}}">Check In</a></li>
                {{-- <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li> --}}
            </ul>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('/hotel/logout')}}">Logout</a></li>
            </ul>    
        </div>
    </nav>
</header>