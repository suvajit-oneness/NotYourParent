<header class="{{(request()->routeIs('front.experts.*') || request()->routeIs('front.experts' ))?'experts_header':'main_header'}}">
    <div class="container">
        <div class="header_top position-relative">
            <div class="row no-gutters justify-content-center">
                <div class="logo">
                    <a href="{{route('front.home')}}">
                        <img src="{{asset('front/images/logo.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="header_right">
                    <ul>
                        <li class="expart_btn"><a href="{{route('front.sign-up',['userType' => 2])}}">Become an Expert</a></li>
                        <li class="sign_up_btn"><a href="{{route('front.sign-up',['userType' => 3])}}"><img src="{{asset('front/images/sign-up-icon.png')}}" alt=""> Sign Up</a></li>							
                    </ul>
                </div>
            </div>
            <button type="button" class="menu_btn"><img src="{{asset('front/images/menu.svg')}}"></button>
        </div>
        <nav class="main_navigation">
            <ul>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Knowledge Bank</a></li>
                <li><a href="#">How It Works?</a></li>
                <li><a href="{{route('front.about-us')}}">About Us</a></li>
            </ul>
        </nav>
    </div>
    <div class="menu_overlay"></div>
</header>