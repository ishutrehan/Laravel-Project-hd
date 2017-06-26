<!DOCTYPE html>
<html lang="en" class="wide wow-animation">
  <head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,700%7CLato:300,300italic,400,400italic,700,900%7CPlayfair+Display:700italic,900">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('frontend/images/ie8-panel/warning_bar_0000_us.jpg') }}" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
        <![endif]-->
  </head>
  <body style="">
    <div class="page">
      <div class="page-loader page-loader-variant-1">
        <div><a href="indexs.html" class="brand brand-md"><img src="{{ asset('frontend/images/logo.png') }}" width="250" height="151" alt="logo"/></a>
          <div class="page-loader-body">
            <div id="spinningSquaresG">
              <div id="spinningSquaresG_1" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_2" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_3" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_4" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_5" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_6" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_7" class="spinningSquaresG"></div>
              <div id="spinningSquaresG_8" class="spinningSquaresG"></div>
            </div>
          </div>
        </div>
      </div>
      
      @include('frontend.elements.top_navigation')

      <section>
        <div data-loop="false" data-autoplay="false" data-simulate-touch="true" class="swiper-container swiper-slider swiper-variant-1 bg-gray-base">
          <div class="swiper-wrapper text-center">
            <div data-slide-bg="{{ asset('frontend/images/banner.jpg') }}" class="swiper-slide">
              <div class="swiper-slide-caption">
                <div class="shell">
                  <div class="range range-sm-center">
                    <div class="cell-sm-12 cell-md-12 cell-lg-12">
                      <h2 data-caption-animate="fadeInUp" data-caption-delay="0s" class="slider-header">Welcome to Howz Dealz</h2>
                        <div class="range offset-top-40 users_main">
                            <div class="cell-sm-6 cell-md-4 height-fill">
                              <article class="icon-box responsive-centered">
                                <div class="box-top">
                                    <div class="box-icon">
                                        <span class="icon icon-md icon-primary fa-users"></span>
                                    </div>
                                    <div class="box-header">
                                        <h5><a href="#">Buyers</a></h5>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="box-body">
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  <a data-caption-animate="fadeInUp" data-caption-delay="250" href="register.html" class="min_button btn btn-xl btn-white-outline-variant-1">Sign Up</a>
                                </div>
                              </article>
                            </div>
                            <div class="cell-sm-6 cell-md-4 height-fill offset-top-40 offset-sm-top-0">
                              <article class="icon-box responsive-centered">
                                <div class="box-top">
                                  <div class="box-icon"><span class="icon icon-md icon-primary fa-users"></span></div>
                                  <div class="box-header">
                                    <h5><a href="#">Sellers</a></h5>
                                  </div>
                                </div>
                                <div class="divider"></div>
                                <div class="box-body">
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  <a data-caption-animate="fadeInUp" data-caption-delay="250" href="register.html" class="min_button btn btn-xl btn-white-outline-variant-1">Sign Up</a>
                                </div>
                              </article>
                            </div>
                            <div class="cell-sm-6 cell-md-4 height-fill offset-top-40 offset-md-top-0">
                              <article class="icon-box responsive-centered">
                                <div class="box-top">
                                  <div class="box-icon"><span class="icon icon-md icon-primary fa-users"></span></div>
                                  <div class="box-header">
                                    <h5><a href="#">Professionals</a></h5>
                                  </div>
                                </div>
                                <div class="divider"></div>
                                <div class="box-body">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  <a data-caption-animate="fadeInUp" data-caption-delay="250" href="register.html" class="min_button btn btn-xl btn-white-outline-variant-1">Sign Up</a>
                                </div>
                              </article>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @yield('main_content')

      @include('frontend.elements.footer')

    </div>
    <div id="form-output-global" class="snackbars"></div>
    <div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
            <button title="Share" class="pswp__button pswp__button--share"></button>
            <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
            <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
          <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="{{ asset('frontend/js/core.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
  </body>
</html>