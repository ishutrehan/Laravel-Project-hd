<section class="section-40 section-sm-top-75 section-sm-bottom-60 bg-cod-gray">
    <div class="shell text-center text-sm-left">
        <div class="range range-sm-middle range-md-center range-lg-left">
            <div class="cell-md-11 cell-lg-3 foot_logo"><a href="index.html" class="brand"><img src="{{ asset('frontend/images/logo.png') }}" width="139" height="22" alt="logo"/></a></div>
            <div class="cell-sm-7 cell-md-6 cell-lg-5 offset-top-30 offset-lg-top-0">
                <div class="wrap-justify">
                    <address class="contact-info text-left">
                        <div class="unit unit-horizontal unit-spacing-xs unit-middle unit-align-center unit-sm-left">
                            <div class="unit-left"><span class="icon icon-md-custom icon-gunsmoke material-icons-place"></span></div>
                            <div class="unit-body"><a href="#" class="link-white-03 reveal-inline text-light">17/11 MassiveAttack Street<br>Bristol, United Kingdom</a></div>
                        </div>
                    </address>
                    <address class="contact-info text-left">
                        <div class="unit unit-horizontal unit-spacing-xs unit-middle unit-align-center unit-sm-left">
                            <div class="unit-left"><span class="icon icon-md-custom icon-gunsmoke material-icons-phone"></span></div>
                            <div class="unit-body">
                                <div class="link-wrap"><a href="callto:#" class="link-white-03 text-light">+123 234 984 47 45</a></div>
                                <div class="link-wrap"><a href="mailto:#" class="link-white-03 text-light">info@demolink.com</a></div>
                            </div>
                        </div>
                    </address>
                </div>
            </div>
            <div class="cell-sm-5 cell-lg-4 offset-top-30 offset-lg-top-0 text-md-center">
                <ul class="list-inline list-inline-xs">
                    <li><a href="#" class="icon icon-sm-custom link-tundora-inverse fa-facebook"></a></li>
                    <li><a href="#" class="icon icon-sm-custom link-tundora-inverse fa-twitter"></a></li>
                    <li><a href="#" class="icon icon-sm-custom link-tundora-inverse fa-youtube"></a></li>
                    <li><a href="#" class="icon icon-sm-custom link-tundora-inverse fa-linkedin"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer class="page-foot page-foot-default section-35 bg-gray-base">
    <div class="shell">
        <div class="range text-center">
            <div class="cell-xs-12">
                <p class="rights small"><span>Houz dealz</span><span>&nbsp;&#169;&nbsp;</span><span id="copyright-year"></span><span>All Rights Reserved</span><br class="veil-sm"><a href="#" class="link-primary-inverse">Terms of Use</a><span>and</span><a href="#" class="link-primary-inverse">Privacy Policy</a>
                    <!-- {%FOOTER_LINK}-->
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- BEGIN # MODAL LOGIN -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" align="center">
							<p class="h7">Login to your account</p>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
						</div>
						
						<!-- Begin # DIV Form -->
						<div id="div-forms">
							<div class="alert alert-warning" id="log" style="display: none;">
							  <strong>Your email or password is not correct</strong>
							</div>
							<!-- Begin # Login Form -->
							<form id="login-form">
								<div class="modal-body">									
									<input id="login_email" class="form-control" type="text" name="email" placeholder="Email address" required>
									<input id="login_password" class="form-control" type="password" name="password" placeholder="Password" required>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Remember me
										</label>
										<button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
									</div>
								</div>
								<div class="modal-footer">
									<div>
										<button type="button" id="login_btn" class="btn btn-primary btn-lg btn-block">Login</button>
									</div>
									<div class="dont-account">
										<label>Don't have account ?</label>
										<a href="{{ url('register') }}">
											<button id="login_register_btn" type="button" class="btn btn-primary btn-lg btn-block offset-top-0">Sign Up</button>
										</a>
									</div>
								</div>
							</form>
							<!-- End # Login Form -->
							
						</div>
						<!-- End # DIV Form -->
						
					</div>
				</div>
			</div>
			<!-- END # MODAL LOGIN -->