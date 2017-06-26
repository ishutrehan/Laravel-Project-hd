<header class="page-head">
        <div class="rd-navbar-wrap">
          <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-body-class="rd-navbar-static-smooth" data-md-stick-up-offset="60px" data-lg-stick-up-offset="60px" data-md-stick-up="true" data-lg-stick-up="true" class="rd-navbar rd-navbar-default">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-panel">
                <button data-custom-toggle=".rd-navbar-nav-wrap" data-custom-toggle-disable-on-blur="true" class="rd-navbar-toggle"><span></span></button><a href="index.html" class="rd-navbar-brand brand"><img src="{{ asset('frontend/images/logo.png') }}" width="139" height="22" alt="logo"/></a>
              </div>
              <div class="rd-navbar-group rd-navbar-search-wrap">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-inner">
                    <div class="rd-navbar-search">
                      <form action="search-results.html" method="GET" data-search-live="rd-search-results-live" class="rd-search">
                        <div class="form-group">
                          <label for="rd-search-form-input" class="form-label">Search...</label>
                          <input id="rd-search-form-input" type="text" name="s" autocomplete="off" class="form-control">
                          <div id="rd-search-results-live" class="rd-search-results-live"></div>
                        </div>
                        <button type="submit" class="rd-search-submit"></button>
                      </form>
                      <button data-rd-navbar-toggle=".rd-navbar-search, .rd-navbar-search-wrap" class="rd-navbar-search-toggle"></button>
                    </div>
                    <ul class="rd-navbar-nav">
                      <li class="active"><a href="index.html">Home</a>
                      </li>
                      <li><a href="#">Location</a>
                      </li>
                      <li><a href="#">All Listing</a>
                      </li>
                      <li><a href="#">Buy</a>
                      </li>
                      <li><a href="#">Rental</a>
                      </li>
                      <li><a href="#">Selling</a>
                      </li>
                      <li><a href="#">Blog</a>
                      </li>
                      <li><a href="{{ url('login') }}">Login</a>
                      </li> 
                      <li><a href="{{ url('register') }}">Signup</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>