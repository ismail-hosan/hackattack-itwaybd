

<!-- Header section -->
<header class="header-section">
    <div class="header-warp">
        <div class="header-social d-flex justify-content-end">
            <p>Follow us:</p>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
        </div>
        <div class="header-bar-warp d-flex">
            <!-- site logo -->
            <a href="{{Url('/')}}" class="site-logo">
                <img src="{{asset('font_assets/img/logo.png')}}" alt="" style="max-width: 26% !important;">
            </a>
            <nav class="top-nav-area w-100">
                <div class="user-panel">



                    @if(Auth::guard('customer')->user())
                        @if( Auth::guard('customer')->user()->image)
                            <a href="{{Route('user_profile')}}">
                                <img src="{{ Auth::guard('customer')->user()->image }}" alt="" style="width: 45px;border-radius:50%">
                            </a>
                        @else
                            <a href="{{Route('user_profile')}}">
                                <img src="{{asset('assets/images/faces-clipart/pic-1.png')}}" alt="" style="width: 45px;border-radius:50%">
                            </a>
                        @endif

                {{-- <img src="{{Auth::guard('customer')->user()->image}}" alt="Round Image" class="position-absolute top-0 end-1 round-image" > --}}
                    @elseif(Auth::user())
                    <a href="">
                        <img src="{{asset('assets/images/faces-clipart/pic-2.png')}}" alt="" style="width: 45px;border-radius:50%">
                    </a>
                    <a href="{{Route('home')}}">Dashboard</a>
                    @else
                    <a href="{{Route('user_show_page')}}">Login</a> / <a href="{{Route('register')}}">Register</a>
                    @endif
                </div>
                <!-- Menu -->
                <ul class="main-menu primary-menu">
                    <li><a href="{{Url('/')}}">Home</a></li>
                    <li><a href="games.html">Games</a>
                        <ul class="sub-menu">
                            <li><a href="game-single.html">Game Singel</a></li>
                        </ul>
                    </li>
                    <li><a href="review.html">Reviews</a></li>
                    <li><a href="blog.html">News</a></li>
                    <li><a href="{{Route('contact')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- Header section end -->


