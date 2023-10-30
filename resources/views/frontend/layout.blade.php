<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charter="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  </head>
  <body>
  <div class="site-wrap">

<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar pt-3" role="banner">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-8 col-xl-8 col-lg-6 col-md-6 col-sm-6 logo">
        <a href="{{url('/')}}" class="text-black h2 mb-0"><img src="{{asset('images/logo1.png')}}" class="d-block w-50 responsive" alt="Logo"></a>
      </div>
      
      <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 py-3 text-right" style="position: relative; top: 3px;">
        <div class="social-icons d-inline">
          <a href="#"><span class="icon-facebook"></span></a>
          <a href="#"><span class="icon-twitter"></span></a>
          <a href="#"><span class="icon-instagram"></span></a>
        </div>
        <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-xl-none"><span class="icon-menu h3"></span></a></div>
      </div>
      
      <div class="col-12 d-none d-xl-block border-top pr-0">
        <nav class="site-navigation text-center " role="navigation">

          <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block mb-0">
            <li class="nav-item {{ Request::path() == 'en' ? 'active' : '' }} || {{ Request::path() == 'kh' ? 'active' : '' }}"><a class="nav-link" href="/">{{trans('frontend.home')}}</a></li>
            <li class="nav-item {{ Request::path() == 'en/about-us' ? 'active' : '' }} || {{ Request::path() == 'kh/about-us' ? 'active' : '' }}"><a class="nav-link" href="/about-us">{{trans('frontend.about-us')}}</a></li>
            <li class="has-children">
              <a href="">{{trans('frontend.documents')}}</a>
              <ul class="dropdown">
                <li><a href="">{{trans('frontend.law&regulation')}}</a></li>
                <li><a href="">{{trans('frontend.prakas')}}</a></li>
                <li><a href="">{{trans('frontend.others')}}</a></li>
              </ul>
            </li>
            <li><a href="">{{trans('frontend.news&events')}}</a></li>
            <li><a href="">{{trans('frontend.public-service')}}</a></li>
            <li><a href="">{{trans('frontend.contact-us')}}</a></li>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                @if($localeCode =='kh')
                  <img src="{{asset('kh.png')}}" style="width: 30px">
                @endif
                @if($localeCode =='en')
                  <img src="{{asset('uk.png')}}" style="width: 30px">
                @endif
                <!-- {{ $properties['native'] }} -->
                    </a>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>

  </div>
</header>
</div>
  
  @yield('body')
  <div class="site-footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4">
        <h3 class="footer-heading mb-4">About Us</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
      </div>
      <div class="col-md-3 ml-auto">
        <h3 class="footer-heading mb-4">Quick Menu</h3>
        <ul class="list-unstyled float-left mr-5">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Advertise</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Subscribes</a></li>
        </ul>
        <ul class="list-unstyled float-left">
          <li><a href="#">Travel</a></li>
          <li><a href="#">Lifestyle</a></li>
          <li><a href="#">Sports</a></li>
          <li><a href="#">Nature</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="mb-5">
          <h3 class="footer-heading mb-4">Subscribe</h3>
          <form action="" method="post" class="form-footer-subscribe">
            <div class="form-group d-flex">
              <input type="text" class="form-control">
              <input type="submit" class="btn btn-primary text-white" value="Subscribe">
            </div>
          </form>
        </div>

        <div>
          <h3 class="footer-heading mb-4">Connect With Us</h3>
          <p>
            <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
            <a href="#"><span class="icon-twitter p-2"></span></a>
            <a href="#"><span class="icon-instagram p-2"></span></a>
            <a href="#"><span class="icon-rss p-2"></span></a>
            <a href="#"><span class="icon-envelope p-2"></span></a>
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          &copy; <script>document.write(new Date().getFullYear());</script> {{trans('frontend.footer')}} 
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
  </div>
</div>

  <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>

  <script src="{{asset('frontend/js/main.js')}}"></script>
    
  </body>
</html>