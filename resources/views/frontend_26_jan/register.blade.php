<!DOCTYPE html>
<html lang="en" class="wide wow-animation">
  <head>
    <title>Register</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,700%7CLato:300,300italic,400,400italic,700,900%7CPlayfair+Display:700italic,900">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
  </head>
  <body style="background-image: url(frontend/images/register.jpg);" class="one-screen-page bg-gray-darker bg-image">
    <div class="page">
      <div class="page-loader page-loader-variant-1">
        <div><a href="index.html" class="brand brand-md"><img src="{{ asset('frontend/images/logo.png') }}" width="139" height="22" alt="logo"/></a>
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
      <div class="page-inner">
        <header class="page-head">
          <div class="divider-spectrum"></div>
          <div class="page-head-inner">
            <div class="shell text-center"><a href="index.html" class="brand brand-md"><img src="{{ asset('frontend/images/logo.png') }}" width="139" height="22" alt="logo"/></a>
            </div>
          </div>
        </header>
        <section class="page-content">
          <div class="shell">
            <div class="range range-sm-center">
              <div class="cell-sm-7 cell-md-5 cell-lg-4">
                <div class="block-shadow text-center">
                  <div class="block-inner">
                    <p class="h7">Create your account</p>
                    <div class="offset-top-40 offset-sm-top-60"><span class="icon icon-xl icon-gray-base material-icons-face"></span></div>
                  </div>
                  <form class="rd-mailform form-modern form-darker offset-top-40">
                    <div class="block-inner">
                      <div class="form-group">
                        <input id="register-form-name" type="text" name="name" data-constraints="@Required" class="form-control" placeholder="Username">
                      </div>
                      <div class="form-group offset-top-22">
                        <input id="feedback-email" type="email" name="email" data-constraints="@Email @Required" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group offset-top-22">
                        <input id="register-form-password" type="password" name="pass" data-constraints="@Required" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group offset-top-22">
                        <input id="register-form-password-confirm" type="password" name="pass-confirm" data-constraints="@Required" class="form-control" placeholder="Repeat a password">
                      </div> 
					  <div class="form-group offset-top-22">
					  <label>Sign Up As:</label>
                        <select name="user-type" class="dark-color">
							<option value="buyers">Buyers</option>
							<option value="sellers">Sellers</option>
							<option value="professional">Professionals</option>
						</select>
                      </div>
                      <div class="offset-top-22 text-left text-secondary">
                        <label class="checkbox-inline checkbox-small">
                          <input name="input-checkbox" value="checkbox-1" type="checkbox">I agree with the&nbsp;<a href="privacy-policy.html" class="link-primary-inline">Terms of use</a>.
                        </label>
                      </div>
                    </div>
                    <div class="offset-top-30 offset-sm-top-40">
                      <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </div>
                  </form>
                </div>
				<div class="group-inline offset-top-15 text-center"><span class="text-white">Already registered?</span><a href="login.html" class="link link-primary-inverse">Login here.</a></div>
              </div>
            </div>
          </div>
        </section>

        <footer class="page-foot">
          <div class="page-foot-inner">
            <div class="shell text-center">
              <div class="range">
                <div class="cell-xs-12">
                  <p class="rights"><span>Houz dealz</span><span>&nbsp;&#169;&nbsp;</span><span id="copyright-year"></span><span>All Rights Reserved</span><br class="veil-sm"><a href="#" class="link-primary-inverse">Terms of Use</a><span>and</span><a href="#" class="link-primary-inverse">Privacy Policy</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="divider-spectrum"></div>
        </footer>

      </div>
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