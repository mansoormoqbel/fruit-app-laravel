    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->
                        @guest
                       
                        @else
                            <!-- menu start -->
                            <nav class="main-menu">
                                <ul>
                                    <li  @if(request()->has('home')) class="current-list-item" @endif ><a href="{{Route('home')}}">Home</a>
                                    {{--  <ul class="sub-menu">
                                            <li><a href="index.html">Static Home</a></li>
                                            <li><a href="index_2.html">Slider Home</a></li>
                                        </ul> --}}
                                    </li>
                                    <li @if(request()->has('about')) class="current-list-item" @endif><a href="{{Route('about')}}">About</a></li>
                                    <li @if(request()->has('home')) class="current-list-item" @endif><a href="{{Route('home')}}">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{Route('ErrorPage')}}">404 page</a></li>
                                            <li><a href="{{Route('about')}}">About</a></li>
                                            <li><a href="{{Route('Cart')}}">Cart</a></li>
                                            <li><a href="{{Route('Checkout')}}">Check Out</a></li>
                                            <li><a href="{{Route('contact')}}">Contact</a></li>
                                            <li><a href="news.html">News</a></li>
                                            <li><a href="{{Route('shop')}}">Shop</a></li>
                                        </ul>
                                    </li>
                                   {{--  <li @if(request()->has('home')) class="current-list-item" @endif><a href="news.html">News</a>
                                        <ul class="sub-menu">
                                            <li><a href="news.html">News</a></li>
                                            <li><a href="single-news.html">Single News</a></li>
                                        </ul>
                                    </li> --}}
                                    <li @if(request()->has('home')) class="current-list-item" @endif><a href="{{Route('contact')}}">Contact</a></li>
                                    <li @if(request()->has('shop')) class="current-list-item" @endif><a href="{{Route('shop')}}">Shop</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="checkout.html">Check Out</a></li>
                                            <li><a href="single-product.html">Single Product</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Welcome  {{ Auth::user()->name }}</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                       
                                        
                                    
                                    <li>
                                        <div class="header-icons">
                                            <a class="shopping-cart" href="{{Route('Cart')}}"><i class="fas fa-shopping-cart"></i></a>
                                            {{-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
                                        </div>
                                    </li>
                                </ul>

                            </nav>
                        @endguest
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->