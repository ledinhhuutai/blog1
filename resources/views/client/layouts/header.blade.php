<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('client/assets/img/logo/logo.png') }}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="#">Shop</a>
                                    <ul class="submenu">
                                            @foreach($cates as $c)
                                        <li><a href="{{ route('client.cate', ['id' => $c->id]) }}">{{ $c->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li> <a href="login.html"><span class="flaticon-user"></span></a></li>
                            <li><a href="{{ route('cart') }}"><span class="flaticon-shopping-cart"></span></a> </li>
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
