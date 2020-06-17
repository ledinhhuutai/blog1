<!doctype html>
<html class="no-js" lang="zxx">

@include('client.layouts.head')

<body>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('client/assets/img/logo/logo.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
@include('client.layouts.header')
<main>
    @yield('client_content')

</main>
@include('client.layouts.footer')

<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

@include('client.layouts.script')
@yield('script')

</body>
</html>
