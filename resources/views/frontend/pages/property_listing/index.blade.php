@extends('frontend.layouts.master')

@section('custom_style')
	<link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeSlider.skinFlat.css') }}" />
	<style type="text/css">
		
	</style>
@endsection

@section('main_content')

<section style="background-image: url({{ asset('frontend/images/listing-bg.jpg')}});" class="section-30 section-sm-40 section-md-66 section-lg-bottom-90 bg-gray-dark page-title-wrap">
			<div class="shell">
				<div class="page-title">
					<h2>Property Listing</h2>
				</div>
			</div>
		</section>

		<section>
			<form method="POST" id="search_form">
			<div class="shop-panel">
				<div class="shell text-center">
					<div class="range range-xs-middle range-xs-justify">
						<div class="cell-xs-4 text-xs-left">
							<ul class="shop-panel-list">
								<li><a href="javascript:void(0);" id="property-listing" class="icon icon-sm material-icons-view_list"></a></li>
								<li><a href="javascript:void(0);" id="property-listing-grid" class="icon icon-sm material-icons-view_module"></a></li>
							</ul>
						</div>
						{{-- <form method="POST" id="search_form"> --}}
							<div class="cell-xs-8 offset-top-15 offset-xs-top-0 text-xs-right">
								<div class="shop-panel-controls"><span>Show</span>
									<select data-minimum-results-for-search="Infinity" data-custom-theme="modern" class="form-control select-filter item-per-page" name="search[paginate]">
										<option value="6">6</option>
										<option value="12">12</option>
										<option value="18">18</option>
										<option value="24">24</option>
										<option value="30">30</option>
										<option value="36">36</option>
									</select>
									<span>items per page</span>
								</div>
							</div>
						{{-- </form> --}}
					</div>
				</div>
			</div>

			<div class="section-50 section-sm-bottom-75 section-lg-bottom-100 bg-whisper">
				<div class="shell">
					<div class="range">
						<div class="cell-md-4 cell-sm-3 cell-xs-12">
							<div id="accordion" class="panel panel-primary behclick-panel">
								<div class="panel-heading">
									<h3 class="panel-title">Search</h3>
								</div>
								{{-- <form method="POST" id="search_form"> --}}
									<div class="panel-body">
										@foreach($search_list as $search)
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" href="javascript:void(0);collapse0">
													<i class="indicator fa fa-caret-down" aria-hidden="true"></i> {{ $search->search_type }}
												</a>
											</h4>
										</div>
										@if($search->search_slug == 'property_type')
											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group">

													<?php $prop_type = json_decode($search->search_params); ?>

													@foreach($property_type as $ptype)
														@if(in_array($ptype->id, $prop_type))
															<li class="list-group-item">
																<div class="checkbox">
																	<label>
																		<input type="checkbox" name="search[property_type][]" value="{{ $ptype->id }}">
																		{{ ucwords($ptype->property_type) }}
																	</label>
																</div>
															</li>
														@endif
													@endforeach
												</ul>
											</div>
										@elseif($search->search_slug == 'price_range')
											<?php $pric_rang = json_decode($search->search_params); ?>
											<div id="collapse0" class="panel-collapse collapse in" >
												<input type="text" name="search[price_range]" id="range_44">
											</div>
										@elseif($search->search_slug == 'location')
											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="padd-both">
													<li class="list-group-item">
														<div>
															<label class="">
																Select State
															</label>
															<select class="select2" name="search[state]" id="state_sel">
																<option></option>
																{!! $all_states !!}
															</select>
														</div>
													</li>
													<li class="list-group-item">
														<div>
															<label class="">
																Select City
															</label>
															<select class="select2" name="search[city]" id="city_all">
																<option></option>
															</select>
														</div>
													</li>
												</ul>
											</div>
										@elseif($search->search_slug == 'garage')
											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group padd-left">
													<li class="list-group-item">
														<div class="checkbox">
															<label>
																<input type="radio" name="search[garage]" value="1">
																 Yes
															</label>
															<label>
																<input type="radio" name="search[garage]" value="2">
																 No
															</label>
														</div>
													</li>
													<li class="list-group-item">
														<div class="checkbox">
															<label class="">No of Cars</label>
	                                                        <div class="">
	                                                            <select class="form-control select2" name="search[num_car]" id="search[num_car]" >
	                                                                <option value="1"> 1 Car</option>
	                                                                <option value="2"> 2 Car</option>
	                                                                <option value="3"> 3 Car</option>
	                                                            </select>
	                                                        </div>
														</div>
													</li>
												</ul>
											</div>
										@elseif($search->search_slug == 'bedroom')
											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group">
													@for($i=1; $i <= $search->search_params; $i++)
														<li class="list-group-item">
															<div class="checkbox">
																<label>
																	@if($i == $search->search_params)
																		<input type="checkbox" name="search[bedroom][]" value="{{ $i }}"> 
																		Greater than or equal to {{ $i }} @if($i > 1){{ 'Bedrooms' }} @else {{ 'Bedroom' }}@endif 
																	@else
																		<input type="checkbox" name="search[bedroom][]" value="{{ $i }}"> 
																		{{ $i }} @if($i > 1){{ 'Bedrooms' }} @else {{ 'Bedroom' }}@endif 
																	@endif
																</label>
															</div>
														</li>
													@endfor
												</ul>
											</div>
										@elseif($search->search_slug == 'pool')
											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group padd-left">
													<li class="list-group-item">
														<div class="checkbox">
															<label>
																<input type="radio" name="search[pool]" value="1">
																 Yes
															</label>
															<label>
																<input type="radio" name="search[pool]" value="2">
																 No
															</label>
														</div>
													</li>
												</ul>
											</div>
										@elseif($search->search_slug == 'in_city')
											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group padd-left">
													<li class="list-group-item">
														<div class="checkbox">
															<label>
																<input type="radio" name="search[in_city]" value="1">
																 Yes
															</label>
															<label>
																<input type="radio" name="search[in_city]" value="2">
																 No
															</label>
														</div>
													</li>
												</ul>
											</div>
										@elseif($search->search_slug == 'nearest_school')

											<?php $school_distance = explode(',', trim($search->search_params)); ?>

											<div id="collapse0" class="panel-collapse collapse in">
												<ul class="list-group">
													@foreach($school_distance as $school_dist)
														<li class="list-group-item">
															<div class="radio">
																<label>
																	<input type="radio" name="search[nearest_school]" value="{{ $school_dist }}">
																	 Within {{ $school_dist }} kms
																</label>
															</div>
														</li>
													@endforeach
													<li class="list-group-item">
														<div class="radio">
															<label>
																<input type="radio" name="search[nearest_school]" value="{{ $school_dist }}+">
																 More than {{ $school_dist }} kms
															</label>
														</div>
													</li>
												</ul>
											</div>
										@elseif($search->search_slug == 'nearest_market')

											<?php $nearest_market = explode(',', trim($search->search_params)); ?>

											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group">
													@foreach($nearest_market as $near_mark)
														<li class="list-group-item">
															<div class="radio">
																<label>
																	<input type="radio" name="search[nearest_market]" value="{{ $near_mark }}">
																	 Within {{ $near_mark }} kms
																</label>
															</div>
														</li>
													@endforeach
													<li class="list-group-item">
														<div class="radio">
															<label>
																<input type="radio" name="search[nearest_market]" value="{{ $near_mark }}+">
																 More than {{ $near_mark }} kms
															</label>
														</div>
													</li>
												</ul>
											</div>
										@elseif($search->search_slug == 'nearest_hospital')

											<?php $nearest_hospital = explode(',', trim($search->search_params)); ?>

											<div id="collapse0" class="panel-collapse collapse in" >
												<ul class="list-group">
													@foreach($nearest_hospital as $nearest_hos)
														<li class="list-group-item">
															<div class="radio">
																<label>
																	<input type="radio" name="search[nearest_hospital]" value="{{ $nearest_hos }}">
																	 Within {{ $nearest_hos }} kms
																</label>
															</div>
														</li>
													@endforeach
													<li class="list-group-item">
														<div class="radio">
															<label>
																<input type="radio" name="search[nearest_hospital]" value="{{ $nearest_hos }}+">
																 More than {{ $nearest_hos }} kms
															</label>
														</div>
													</li>
												</ul>
											</div>
										@endif
										@endforeach
									</div>
								{{-- </form> --}}
							</div>
						</div>
						<div class="cell-md-8">
							@if(count($property_list) > 0)
								@foreach($property_list as $property)
									<div class="product product-item-fullwidth">
										<div class="product-slider">
											<div class="product-slider-inner">
											
												<!-- New slider start  -->
												<div id="myCarousel-{{ $property->unique_id }}" class="carousel slide" data-ride="carousel">
														<?php $images = json_decode($property->property_images, true); ?>
														@if(is_array($images) && count($images) > 0)
														<!-- Indicators -->
														<ol class="carousel-indicators">
															@foreach($images as $key => $image)
																<li data-target="#myCarousel-{{ $property->unique_id }}" data-slide-to="{{ $key }}" class="@if($key == 0){{'active'}}@endif"></li>
															@endforeach
														</ol>
														<!-- Wrapper for slides -->
														<div class="carousel-inner" role="listbox">
															@foreach($images as $key => $image)
														  		<div class="item @if($key == 0){{'active'}}@endif">
																	<img src="{!! asset('uploads/property').'/'.$image['upload_filename'] !!}" alt="{{ $image['original_filename'] }}" width="460" height="345" />
														  		</div>
														  	@endforeach
														</div>
														@else
															<div> </div>
														@endif
													<!-- Left and right controls -->
													<a class="left carousel-control" href="#myCarousel-{{ $property->unique_id }}" role="button" data-slide="prev">
													  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
													  <span class="sr-only">Previous</span>
													</a>
													<a class="right carousel-control" href="#myCarousel-{{ $property->unique_id }}" role="button" data-slide="next">
													  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
													  <span class="sr-only">Next</span>
													</a>
												</div>
												<!-- New slider end  -->
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
										<!-- New slider start  -->
										<div id="myCarousel3" class="carousel slide" data-ride="carousel">
											
												<!-- Indicators -->
												<ol class="carousel-indicators">
												  <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
												  <li data-target="#myCarousel3" data-slide-to="1"></li>
												  <li data-target="#myCarousel3" data-slide-to="2"></li>
												</ol>

												<!-- Wrapper for slides -->
												<div class="carousel-inner" role="listbox">
												  <div class="item active">
													<img src="{{ asset('frontend/images/list-1.jpg') }}" alt="Chania" width="460" height="345">
												  </div>

												  <div class="item">
													<img src="{{ asset('frontend/images/list-2.jpg') }}" alt="Chania" width="460" height="345">
												  </div>
												
												  <div class="item">
													<img src="{{ asset('frontend/images/list-3.jpg') }}" alt="Flower" width="460" height="345">
												  </div>
												</div>
											<!-- Left and right controls -->
											<a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
											  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
											  <span class="sr-only">Previous</span>
											</a>
											<a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
											  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
											  <span class="sr-only">Next</span>
											</a>
										</div>
										<!-- New slider end  -->
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
										<!-- New slider start  -->
										<div id="myCarousel4" class="carousel slide" data-ride="carousel">
											
												<!-- Indicators -->
												<ol class="carousel-indicators">
												  <li data-target="#myCarousel4" data-slide-to="0" class="active"></li>
												  <li data-target="#myCarousel4" data-slide-to="1"></li>
												  <li data-target="#myCarousel4" data-slide-to="2"></li>
												</ol>

												<!-- Wrapper for slides -->
												<div class="carousel-inner" role="listbox">
												  <div class="item active">
													<img src="{{ asset('frontend/images/list-1.jpg') }}" alt="Chania" width="460" height="345">
												  </div>

												  <div class="item">
													<img src="{{ asset('frontend/images/list-2.jpg') }}" alt="Chania" width="460" height="345">
												  </div>
												
												  <div class="item">
													<img src="{{ asset('frontend/images/list-3.jpg') }}" alt="Flower" width="460" height="345">
												  </div>
												</div>
											<!-- Left and right controls -->
											<a class="left carousel-control" href="#myCarousel4" role="button" data-slide="prev">
											  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
											  <span class="sr-only">Previous</span>
											</a>
											<a class="right carousel-control" href="#myCarousel4" role="button" data-slide="next">
											  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
											  <span class="sr-only">Next</span>
											</a>
										</div>
										<!-- New slider end  -->
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
			</form>
		</section>

@endsection

@section('custom_javascript')

	<script type="text/javascript" src="{{ asset('frontend/js/ion.rangeSlider.min.js') }}" ></script>
	
	<script type="text/javascript">
		// alert("hello");
		$(document).ready(function() {

			$("select[name='search[paginate]'], input[name='search[property_type][]'], select[name='search[city]'], input[name='search[garage]'], select[name='search[num_car]'], input[name='search[bedroom][]'], input[name='search[pool]'], input[name='search[in_city]'], input[name='search[nearest_school]'], input[name='search[nearest_market]'], input[name='search[nearest_hospital]']").change(function(){ //  input[name='search[price_range]']
				// alert($(this).val());
				$.ajax({
					url: "{{ url('search_property') }}",
					type: "POST",
					data: $("#search_form").serialize(),
					success: function(response) {
						// console.log(response);
						
					}
				});
			});

			$('#property-listing').click(function(event){
				event.preventDefault();
				$('.cell-md-8 .product').addClass('property-list-item');
			});

			$('#property-listing-grid').click(function(event){
				// event.preventDefault();
				$('.cell-md-8 .product').removeClass('property-list-item');
				$('.cell-md-8 .product').addClass('property-grid-item');
			});

			$('#property-listing').click(function(event){
				event.preventDefault();
				$('.cell-md-8 .property-grid-item.property-list-item').removeClass('property-grid-item');
			});
			<?php if(isset($pric_rang)) { ?>
			$("#range_44").ionRangeSlider({
			    type: "double",
			    min: {{ $pric_rang->xmin }},
			    max: {{ $pric_rang->xmax }},
			    from: {{ $pric_rang->dmin }},
			    to: {{ $pric_rang->dmax }},
			    step: 10
			});
			<?php } ?>

			// alert("helo");
            $("#state_sel").change(function(){
                var chkval = $(this).val();
              	// alert("hello");
                if(chkval != '')
                {
                    $.ajax({
                        url: "{{ url('common/fetch_cities') }}",
                        data: {
                            state_code : chkval
                        },
                        type: "POST",
                        success: function(data){
                            if(data)
                            {
                                var allOption = $.parseJSON(data);
                                $("#city_all").html(allOption);
                                $("#city_all").select2({
                                    placeholder: "-- Select City --"
                                });
                            }
                        }
                    });
                }
            });

            $("#city_all").change(function(){
                var chkval = $(this).val();
              	// alert("hello");
                if(chkval != '')
                {
                    $.ajax({
						url: "{{ url('hello') }}",
						type: "POST",
						data: $("#search_form").serialize(),
						success: function(response) {
							console.log(response);
						}
					});
                }
            });
		});
	</script>

@endsection