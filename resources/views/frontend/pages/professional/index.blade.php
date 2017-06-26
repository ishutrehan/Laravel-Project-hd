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
							</div>
						</div>
						<div class="cell-md-8">
							@if(count($professional_list) > 0)
								@foreach($professional_list as $professional)
									<div class="product product-item-fullwidth">
										<div class="dev_llo_b">  
									    	<div class="img_bbsx"><?php 
											$profile_pic = json_decode($professional->profile_pic, true); 
											echo "<img src='".url('uploads/professional/profile_pic')."/".$profile_pic['upload_filename']."' />";
										?></div>    
									     	<div class="cont_nt_rg">     
										        <h4>{{$professional->first_name}}</h4>
										        <h4>{{$professional->last_name}}</h4>
										        <span>{{$professional->address}}</span>
									         	<a href="<?php echo url('professional') ?>/{{$professional->user_id}}" class="view"> View More...</a>       
									       </div>
									  </div>									
									</div>
								@endforeach
							@endif
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