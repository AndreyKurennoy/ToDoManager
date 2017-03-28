<!--HEADER ROW-->
<!--HEADER ROW-->
<div id="header-row">
    <div class="container">
        <div class="row">
            <!--LOGO-->
            <div class="span3">
                @if(auth()->check())
                    <a class="brand" href="{{URL('/history/create')}}">
                @else
                    <a class="brand" href="{{URL('/')}}">
                @endif
                        {{--<img src="{{URL::asset('fornax/img/logo.png')}}"/>--}}
                        <h2>Planmee</h2>
                    </a>
            </div>
            <!-- /LOGO -->

            <!-- MAIN NAVIGATION -->
            <div class="span9">
                <div class="navbar  pull-right">
                    <div class="navbar-inner">
                        <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span
                                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                @if(auth()->check())
                                    @if(auth()->user()->is_admin == 1)
                                        {{--todo: здесь будет админка--}}
                                        {{--<li><a href="{{URL('/admin/')}}">Админка</a></li>--}}
                                    @endif
                                    <li><a href="{{URL('/calendar')}}">Календарь</a></li>
                                    {{--todo:settings--}}
                                    <li><a href="{{URL('/logout')}}">Выйти</a></li>
                                @else
                                    <li class="active"><a href="/">Главная</a></li>
                                    <li><a href="{{URL('/login')}}">Войти</a></li>
                                    <li><a href="{{URL('/register')}}">Регистрация</a></li>
                                @endif
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