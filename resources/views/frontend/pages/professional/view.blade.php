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
			<h2>Profile</h2>
		</div>
	</div>
</section>
<pre>

	
</pre>
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
					
					<div class="cell-md-12">
					@if(count($user) > 0)
						<div class="rw_full">
							<div class="profile_pic">
								<?php
									$profile_pic = json_decode($user[0]->profile_pic, true); 
									echo "<img src='".url('uploads/professional/profile_pic')."/".$profile_pic['upload_filename']."' />";
								?>
							</div>
							<div class="detail">
							<h3> {{$user[0]->first_name}} {{$user[0]->last_name}}  </h3>
							<ul>
							 <li><i class="fa fa-phone" aria-hidden="true"></i>{{$user[0]->mobile}}</li>
							 <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>{{$user[0]->email}}</a></li>
							</ul>

								<div class="per_detail">
									<table>
										<tr>
											<td style="width: 120px;">Address</td>
											<td >{{$user[0]->address}}</td>
										</tr>										
										<tr>
											<td style="width: 120px;" >State</td>
											<td>{{$user[0]->state}}</td>
										</tr>										
										<tr>
											<td style="width: 120px;" >city</td>
											<td>{{$user[0]->city}}</td>
										</tr>										
										<tr>
											<td style="width: 120px;">Zip Code</td>
											<td>{{$user[0]->zip_code}}</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<a href="{{url('professional-pay')}}">Pay</a>
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
		
	});
</script>
@endsection