<!--HEADER ROW-->
<!--HEADER ROW-->
<div id="header-row">
    <div class="container">
        <div class="row">
            <!--LOGO-->
            <div class="span3"><a class="brand" href="#"><img src="{{URL::asset('fornax/img/logo.png')}}"/></a></div>
            <!-- /LOGO -->

            <!-- MAIN NAVIGATION -->
            <div class="span9">
                <div class="navbar  pull-right">
                    <div class="navbar-inner">
                        <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li class="active"><a href="/">Home</a></li>
                                @if(auth()->check())
                                    <li><a href="{{URL('/calendar')}}">Calendar</a></li>
                                    {{--todo:settings--}}
                                    <li><a href="{{URL('/logout')}}">Logout</a></li>
                                @else
                                    <li><a href="{{URL('/login')}}">Login</a></li>
                                    <li><a href="{{URL('/register')}}">Register</a></li>
                                @endif

                                {{--<li class="dropdown">--}}
                                {{--<a href="about.html" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="about.html">History</a></li>--}}
                                {{--<li><a href="about.html">Team</a></li>--}}
                                {{--</ul>--}}

                                {{--</li>--}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAIN NAVIGATION -->
        </div>
    </div>
</div>
<!-- /HEADER ROW -->