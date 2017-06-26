@extends('frontend.layouts.master')

@section('main_content')

<section style="background-image: url({{ asset('frontend/images/listing-bg.jpg')}});" class="section-30 section-sm-40 section-md-66 section-lg-bottom-90 bg-gray-dark page-title-wrap">
			<div class="shell">
				<div class="page-title">
					<h2>Property Listing</h2>
				</div>
			</div>
		</section>

		<section>
			<div class="shop-panel">
				<div class="shell text-center">
					<div class="range range-xs-middle range-xs-justify">
						<div class="cell-xs-4 text-xs-left">
							<ul class="shop-panel-list">
								<li><a href="javascript:void(0);" id="property-listing" class="icon icon-sm material-icons-view_list"></a></li>
								<li><a href="javascript:void(0);" id="property-listing-grid" class="icon icon-sm material-icons-view_module"></a></li>
							</ul>
						</div>
						<div class="cell-xs-8 offset-top-15 offset-xs-top-0 text-xs-right">
							<div class="shop-panel-controls"><span>Show</span>
								<select data-minimum-results-for-search="Infinity" data-custom-theme="modern" class="form-control select-filter item-per-page">
									<option value="6">6</option>
									<option value="12">12</option>
									<option value="18">18</option>
									<option value="24">24</option>
									<option value="30">30</option>
									<option value="36">36</option>
								</select><span>items per page</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="section-50 section-sm-bottom-75 section-lg-bottom-100 bg-whisper">
				<div class="shell">
					<div class="range">
						<div class="cell-md-3 cell-sm-3 cell-xs-12">
							<div id="accordion" class="panel panel-primary behclick-panel">
								<div class="panel-heading">
									<h3 class="panel-title">Search</h3>
								</div>
								<div class="panel-body" >
									<div class="panel-heading " >
										<h4 class="panel-title">
											<a data-toggle="collapse" href="javascript:void(0);collapse0">
												<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Price
											</a>
										</h4>
									</div>
									<div id="collapse0" class="panel-collapse collapse in" >
										<ul class="list-group">
											<li class="list-group-item">
												<div class="checkbox">
													<label>
														<input type="checkbox" value="10000-15000">
														$10000 - $15000
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox" >
													<label>
														<input type="checkbox" value="15000-20000">
														$15000 - $20000
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox"  >
													<label>
														<input type="checkbox" value="20000-25000">
														$20000 - $25000
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox"  >
													<label>
														<input type="checkbox" value="25000-above">
														More Than $25000
													</label>
												</div>
											</li>
										</ul>
									</div>

									<div class="panel-heading " >
										<h4 class="panel-title">
											<a data-toggle="collapse" href="javascript:void(0);collapse1">
												<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Locations
											</a>
										</h4>
									</div>
									<div id="collapse1" class="panel-collapse collapse in" >
										<ul class="list-group">
											<li class="list-group-item">
												<div class="checkbox">
													<label>
														<input type="checkbox" value="">
														Lancaster
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox" >
													<label>
														<input type="checkbox" value="">
														Los Angeles
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox"  >
													<label>
														<input type="checkbox" value="">
														Somewhere
													</label>
												</div>
											</li>
										</ul>
									</div>
									<div class="panel-heading" >
										<h4 class="panel-title">
											<a data-toggle="collapse" href="javascript:void(0);collapse3"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> Property Types</a>
										</h4>
									</div>
									<div id="collapse3" class="panel-collapse collapse in">
										<ul class="list-group">
											<li class="list-group-item">
												<div class="checkbox">
													<label>
														<input type="checkbox" value="">
														Apartment
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox" >
													<label>
														<input type="checkbox" value="">
														Commercial
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox"  >
													<label>
														<input type="checkbox" value="">
														Condo
													</label>
												</div>
											</li>
										</ul>
									</div>
									<div class="panel-heading" >
										<h4 class="panel-title">
											<a data-toggle="collapse" href="javascript:void(0);collapse2"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> Features</a>
										</h4>
									</div>
									<div id="collapse2" class="panel-collapse collapse in">
										<ul class="list-group">
											<li class="list-group-item">
												<div class="checkbox">
													<label>
														<input type="checkbox" value="">
														2 Car Garage
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox" >
													<label>
														<input type="checkbox" value="">
														3 bedroom
													</label>
												</div>
											</li>
											<li class="list-group-item">
												<div class="checkbox">
													<label>
														<input type="checkbox" value="">
														Close to schools
													</label>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="cell-md-9">
							@if(count($property_list) > 0)
								@foreach($property_list as $property)
									<div class="product product-item-fullwidth">
										<div class="product-slider">
											<div class="product-slider-inner">
												<?php $images = json_decode($property->property_images, true); ?>
												<div data-items="1" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" class="owl-carousel owl-style-minimal">
													@foreach($images as $image)
														<div class="item">
															<figure><img src="{!! asset('uploads/property').'/'.$image['upload_filename'] !!}" alt="{{ $image['upload_filename'] }}" width="270" height="360"/>
															</figure>
														</div>
													@endforeach
													
												</div>
											</div>
										</div>
										<div class="product-main">
											<div class="product-main-inner">
												<div class="product-body">
													<p class="product-brand">{{ $property->property_type }}</p>
													<h5 class="product-header"><a href="javascript:void(0);">{{ ucwords($property->title) }}</a></h5>
													<div class="product-rating">
														<ul class="list-rating">
															<li><span class="icon icon-xxs material-icons-star"></span></li>
															<li><span class="icon icon-xxs material-icons-star"></span></li>
															<li><span class="icon icon-xxs material-icons-star"></span></li>
															<li><span class="icon icon-xxs material-icons-star_half"></span></li>
															<li><span class="icon icon-xxs material-icons-star_border"></span></li>
														</ul><span class="text-light">4 customer reviews</span>
													</div>
													<div class="product-description">
														<p>{{ $property->description }}</p>
													</div>
												</div>
												<div class="product-aside">
													<?php $payoff = explode('.', $property->estimated_payoff); ?>
													<div class="product-aside-top">
														<p class="price-irrelevant">Total Price</p>
														<p class="pricing-object pricing-object-xl price-current"><span class="small small-middle">$</span><span class="price">{{ $payoff[0] }}</span><span class="small small-bottom">.{{ $payoff[1] }}</span></p>
													</div>
													<div class="product-aside-bottom">
														<div class="stepper-wrap">
															<p>Quantity</p>
															<input type="number" data-zeros="false" value="1" min="1" max="40"/>
														</div>
														<a href="javascript:void(0);" class="btn btn-icon btn-icon-left btn-primary product-control">
															<span class="icon icon-sm fa-shopping-cart"></span>
															<span>Buy Now</span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							@endif
							<div class="product product-item-fullwidth">
								<div class="product-slider">
									<div class="product-slider-inner">
										<div data-items="1" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" class="owl-carousel owl-style-minimal">
											<div class="item">
												<figure><img src="{{ asset('frontend/images/list-2.jpg') }}" alt="" width="270" height="360"/>
												</figure>
											</div>
											<div class="item">
												<figure><img src="{{ asset('frontend/images/list-1.jpg') }}" alt="" width="270" height="360"/>
												</figure>
											</div>
											<div class="item">
												<figure><img src="{{ asset('frontend/images/list-3.jpg') }}" alt="" width="270" height="360"/>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<div class="product-main">
									<div class="product-main-inner">
										<div class="product-body">
											<p class="product-brand">Lorem Ipsum</p>
											<h5 class="product-header"><a href="javascript:void(0);">Lorem ipsum is dummy text</a></h5>
											<div class="product-rating">
												<ul class="list-rating">
													<li><span class="icon icon-xxs material-icons-star"></span></li>
													<li><span class="icon icon-xxs material-icons-star"></span></li>
													<li><span class="icon icon-xxs material-icons-star"></span></li>
													<li><span class="icon icon-xxs material-icons-star_half"></span></li>
													<li><span class="icon icon-xxs material-icons-star_border"></span></li>
												</ul><span class="text-light">4 customer reviews</span>
											</div>
											<div class="product-description">
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
											</div>
										</div>
										<div class="product-aside">
											<div class="product-aside-top">
												<p class="price-irrelevant">Total Price</p>
												<p class="pricing-object pricing-object-xl price-current"><span class="small small-middle">$</span><span class="price">1245</span><span class="small small-bottom">.00</span></p>
											</div>
											<div class="product-aside-bottom">
												<div class="stepper-wrap">
													<p>Quantity</p>
													<input type="number" data-zeros="false" value="1" min="1" max="40"/>
												</div><a href="javascript:void(0);" class="btn btn-icon btn-icon-left btn-primary product-control"><span class="icon icon-sm fa-shopping-cart"></span><span>Buy Now</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product product-item-fullwidth">
								<div class="product-slider">
									<div class="product-slider-inner">
										<div data-items="1" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" class="owl-carousel owl-style-minimal">
											<div class="item">
												<figure><img src="{{ asset('frontend/images/list-3.jpg') }}" alt="" width="270" height="360"/>
												</figure>
											</div>
											<div class="item">
												<figure><img src="{{ asset('frontend/images/list-2.jpg') }}" alt="" width="270" height="360"/>
												</figure>
											</div>
											<div class="item">
												<figure><img src="{{ asset('frontend/images/list-1.jpg') }}" alt="" width="270" height="360"/>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<div class="product-main">
									<div class="product-main-inner">
										<div class="product-body">
											<p class="product-brand">Lorem Ipsum</p>
											<h5 class="product-header"><a href="javascript:void(0);">Lorem ipsum is dummy text</a></h5>
											<div class="product-rating">
												<ul class="list-rating">
													<li><span class="icon icon-xxs material-icons-star"></span></li>
													<li><span class="icon icon-xxs material-icons-star"></span></li>
													<li><span class="icon icon-xxs material-icons-star"></span></li>
													<li><span class="icon icon-xxs material-icons-star_half"></span></li>
													<li><span class="icon icon-xxs material-icons-star_border"></span></li>
												</ul><span class="text-light">4 customer reviews</span>
											</div>
											<div class="product-description">
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
											</div>
										</div>
										<div class="product-aside">
											<div class="product-aside-top">
												<p class="price-irrelevant">Total Price</p>
												<p class="pricing-object pricing-object-xl price-current"><span class="small small-middle">$</span><span class="price">1545</span><span class="small small-bottom">.00</span></p>
											</div>
											<div class="product-aside-bottom">
												<div class="stepper-wrap">
													<p>Quantity</p>
													<input type="number" data-zeros="false" value="1" min="1" max="40"/>
												</div><a href="javascript:void(0);" class="btn btn-icon btn-icon-left btn-primary product-control"><span class="icon icon-sm fa-shopping-cart"></span><span>Buy Now</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="range">
						<div class="cell-xs-12 text-center">
							<ul class="pagination-custom">
								<li><a href="javascript:void(0);">Previous</a></li>
								<li><a href="javascript:void(0);">1</a></li>
								<li><a href="javascript:void(0);">2</a></li>
								<li class="active"><a href="javascript:void(0);">3</a></li>
								<li><a href="javascript:void(0);">4</a></li>
								<li ><a href="javascript:void(0);">Next</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection

@section('custom_javascript')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#property-listing').click(function(event){
				event.preventDefault();
				$('.cell-md-9 .product').addClass('property-list-item');
			});
			$('#property-listing-grid').click(function(event){
				event.preventDefault();
				$('.cell-md-9 .product').removeClass('property-list-item');
				$('.cell-md-9 .product').addClass('property-grid-item');
			});
			$('#property-listing').click(function(event){
				event.preventDefault();
				$('.cell-md-9 .property-grid-item.property-list-item').removeClass('property-grid-item');
			});
		});
	</script>

@endsection