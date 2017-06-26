@extends('frontend.layouts.master')

@section('custom_style')
	<link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeSlider.skinFlat.css') }}" />
	<style type="text/css">
		
	</style>
	<script type="text/javascript">
		function profile_view()
	{
	$("#mypmodel").modal("toggle");
	}
	</script>>
@endsection

@section('main_content')

<section style="background-image: url('{{ url('frontend/images/bg-profile.jpg') }}')" class="section-30 section-sm-40 section-md-66 section-lg-bottom-90 bg-gray-dark page-title-wrap">
        <div class="shell">
          <div class="page-title">
            <h2>Mortgage Loan Officer</h2>
          </div>
        </div>
      </section>
      <pre>
     
      </pre>
      <section class="section-35 section-sm-75 section-lg-100 bg-whisper">
        <div class="shell">
          <div class="range">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="profile-sidebar">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
						@if(empty($user_details[0]['profile_pic']))
							<img src="{{ asset('frontend/images/default-user-icon-profile.png') }}" class="img-responsive" alt="">
						@else
							<img src="{{ asset('uploads')}}/{{Auth::user()->user_type}}/profile_pic/{{$user_details[0]['profile_pic']}}" class="img-responsive" alt="">
						@endif
						</div>
						<!-- END SIDEBAR USERPIC -->
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								{{$user_details[0]['first_name']}} {{$user_details[0]['last_name']}}
							</div>
							<div class="profile-usertitle-job">
								{{Auth::user()->user_type}}
							</div>
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<button type="button" class="btn btn-blue btn-sm">Notification</button>
						<button type="button" class="btn btn-grey btn-sm mar-top">Message</button>
					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="#bio" data-toggle="tab">
								<i class="glyphicon glyphicon-home"></i>
								Overview </a>
							</li>
							<li>
								<a href="#settings" data-toggle="tab">
								<i class="glyphicon glyphicon-user"></i>
								Account Settings </a>
							</li>
							<li>
								<a href="#tasks" data-toggle="tab">
								<i class="glyphicon glyphicon-ok"></i>
								Tasks </a>
							</li>
							<li>
								<a href="#help" data-toggle="tab">
								<i class="glyphicon glyphicon-flag"></i>
								Help </a>
							</li>
						</ul>
					</div>
					<!-- END MENU -->
				</div>
			</div>
            <div class="cell-md-9 cell-lg-9">	
				<div class="col-md-8 col-sm-12 col-xs-12">	
					<ul class="nav nav-tabs" id="myTab">
					  	<li class="active"><a data-target="#bio" data-toggle="tab">Bio</a></li>
					  	<li><a data-target="#buyer" data-toggle="tab">Buyer</a></li>
					  	<li><a data-target="#seller" data-toggle="tab">Seller </a></li>
					</ul>

						<div class="tab-content">
							<div class="tab-pane" id="settings">
								<form method="POST" class="form-horizontal" id="edit_buyer" enctype="multipart/form-data">
                            {{-- {!! csrf_field() !!} --}}
                            <input type="hidden" name="buyer_id" value="{{ $user_details[0]->user_id }}">
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Full Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ $user_details[0]->first_name }}" class="form-control"/>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ $user_details[0]->last_name }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea type="text" name="address" id="address" placeholder="Enter Address" class="form-control" style="resize: vertical; min-height: 100px; max-height: 100px">{{ $user_details[0]->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">&nbsp;</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="state" id="state">
                                        <option ></option>
                                        {!! $all_states !!}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="city" id="city">
                                        <option ></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Zip Code</label>
                                <div class="col-md-8">
                                    <input type="text" name="zip_code" id="zip_code" placeholder="Enter Zip Code" value="{{ $user_details[0]->zip_code }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" id="email" placeholder="Enter Email Address" value="{{ $user_details[0]->email }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" id="username" placeholder="Enter Username" value="{{ $user_details[0]->username }}" class="form-control"/>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Confirm Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Enter Password Again" class="form-control placeholder-mask"/>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Telephone</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control phone_us-mask" name="telephone" id="telephone" value="{{ $user_details[0]->telephone }}" placeholder="Enter Telephone Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Mobile</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control phone-mask" name="mobile" id="mobile" value="{{ $user_details[0]->mobile }}" placeholder="Enter Mobile Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Marital Status</label>
                                <div class="col-md-8">
                                    <select type="text" class="form-control" name="marital_status" id="marital_status">
                                        <option>Select</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="separated">Separated</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Spouse Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="spouse_name" id="spouse_name"  placeholder="Enter Spouse Name"  value="{{ $user_details[0]->spouse_name }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Need Mortgage</label>
                                <div class="col-md-8">
                                    <select name="need_mortgage" id="need_mortgage" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <?php $profile_pic = json_decode($user_details[0]->profile_pic, true); ?>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Profile Pic</label>
                                <div class="col-md-8">
                                    <a href="javascript:void(0);" class="btn btn- btn-primary profile-pic-popup"><i class="fa fa-eye"> </i> {{ $profile_pic['original_filename'] }} </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">New Profile Pic</label>
                                <div class="col-md-8">
                                    <input type="file" class="filestyle" data-buttontext="Attach Profile Pic" name="profile_pic" id="profile_pic" data-buttonname="btn-info">
                                    <label id="profile_pic-error" class="error" for="profile_pic" style="display: none"></label>
                                </div>
                            </div>
                            <?php $attach = json_decode($user_details[0]->fund_proof_attachment, true); ?>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Previous Document</label>
                                <div class="col-md-8">
                                    {{-- <a href="{{ url('uploads/buyer') }}/{{$attach['uplaod_filename']}}" class="btn btn- btn-warning" download><i class="fa fa-download"> </i> {{ $attach['original_filename'] }} </a> --}}
                                    <a href="javascript:void(0);" class="btn btn- btn-info fund-proof-popup"><i class="fa fa-eye"> </i> {{ $attach['original_filename'] }} </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Have Fund Proof</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="have_fund_proof" id="have_fund_proof">
                                        <option style="color:#aaaaaa;" value="" disabled>-- Select ID Proof --</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="filestyle" data-buttontext="Fund Proof Attachment" name="fund_proof_attachment" id="fund_proof_attachment" data-buttonname="btn-info">
                                    <label id="fund_proof_attachment-error" class="error" for="fund_proof_attachment" style="display: none"></label>
                                </div>
                            </div>
                            <?php $attach = json_decode($user_details[0]->id_proof_attachment, true); ?>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Previous Document</label>
                                <div class="col-md-8">
                                    {{-- <a href="{{ url('uploads/buyer') }}/{{$attach['uplaod_filename']}}" class="btn btn- btn-warning" download><i class="fa fa-download"> </i> {{ $attach['original_filename'] }} </a> --}}
                                    <a href="javascript:void(0);" class="btn btn- btn-info id-proof-popup"><i class="fa fa-eye"> </i> {{ $attach['original_filename'] }} </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Personal ID Proof</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="id_proof_attached" id="id_proof_attached">
                                        <option style="color:#aaaaaa;" value="" disabled>-- Select ID Proof --</option>
                                        <option value="1" @if($user_details[0]->id_proof_attached == 1) selected @endif>Driving license</option>
                                        <option value="2" @if($user_details[0]->id_proof_attached == 2) selected @endif>State Proof</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="filestyle" data-buttontext="Attach ID Proof" name="id_proof_file" id="id_proof_file" data-buttonname="btn-info">
                                    <label id="id_proof_file-error" class="error" for="id_proof_file" style="display: none"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit"  value="UPDATE" class="btn btn-primary update_btn"/>
                                    <button type="button"  id="cancel_btn" class="btn btn-danger" onclick="window.location.href = '{{ url('admin/buyer') }}'">CANCEL</button>
                                </div>
                            </div>
                        </form>
							</div>
							<div class="tab-pane active" id="bio">
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-user-information">
											<tbody>
												<tr>
													<td> <h6 class="text-blue">PERSONAL INFORMATION: </h6></td>
													<td></td>
												</tr>
												<tr>
													<td><b>Name:</b></td>
													<td> {{$user_details[0]['first_name']}} {{$user_details[0]['last_name']}}</td>
												</tr>
												<tr>
													<td><b>Address:</b></td>
													<td>{{$user_details[0]['address']}}</td>
												</tr>
												<tr>
													<td><b>Email Address:</b></td>
													<td> {{Auth::user()->email}}</td>
												</tr>
												<tr>
													<td><b>Username:</b></td>
													<td>{{Auth::user()->name}}</td>
												</tr>
												<tr>
													<td><b>Copy of ID proof for authentication:</b></td>
													<td>Lorem Ipsum</td>
												</tr>
												<tr>
													<td><b>Company:</b></td>
													<td> Lorem </td>
													   
												</tr>
												 
												<tr>
													<td><b>Contact:</b></td>
													<td>{{$user_details[0]['mobile']}} </td>
												</tr>
												<tr>
													<td><b> Experience:</b></td>
													<td> 5 years </td>
												</tr>
												<tr>
													<td><b>Branch NMLS:</b></td>
													<td> Lorem Ipsum</td>
													   
												</tr>
												<tr>
													<td><b>NMLS</b></td>
													<td> Lorem Ipsum</td>
												</tr>
												<tr>
													<td> <h6 class="text-blue">PAYMENT DETAILS: </h6></td>
													<td></td>
												</tr>
												<tr>
													<td><b>Card Holder's Name:</b></td>
													<td> John Doh</td>
												</tr>
												<tr>
													<td><b>Card Number:</b></td>
													<td>5005005305105100</td>
												</tr>
												<tr>
													<td><b>Card Expiry Date:</b></td>
													<td> January 2019</td>
												</tr>
												<tr>
													<td> <h6 class="text-blue">DOWNLOAD FILE: </h6></td>
													<td>
														
													</td>
												</tr>
												<tr>
													<td><b>property-locations.pdf</b></td>
													<td>
														<button type="button" class="download_btn">
														  <i class="fa fa-download" aria-hidden="true"></i> Download
														</button>
													</td>
												</tr>
											</tbody>
										  </table>
									</div><!--/col-->
								</div><!--/row-->		
							</div>
							<div class="tab-pane" id="buyer">
								<ul class="friends-list clearfix">
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Lukasz Holeczek</div>
											<span class="label label-success">active</span>
											<a onclick="profile_view(); "href="#"><span class="label label-success">Profile</span></a>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Ann Polansky</div>
											<span class="label label-warning">busy</span>
											<a onclick="profile_view(); "href="#"><span class="label label-success">Profile</span></a>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">May Lin</div>
											<span class="label label-important">blocked</span>
											<a onclick="profile_view(); "href="#"><span class="label label-success">Profile</span></a>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Kate Norman</div>
											<span class="label label-default">offline</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Lukasz Holeczek</div>
											<span class="label label-success">active</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Ann Polansky</div>
											<span class="label label-warning">busy</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">May Lin</div>
											<span class="label label-important">blocked</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Kate Norman</div>
											<span class="label label-default">offline</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
								</ul>
							
							</div>
							<div class="tab-pane" id="seller">
								<ul class="friends-list clearfix">
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Lukasz Holeczek</div>
											<span class="label label-success">active</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Ann Polansky</div>
											<span class="label label-warning">busy</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">May Lin</div>
											<span class="label label-important">blocked</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Kate Norman</div>
											<span class="label label-default">offline</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Lukasz Holeczek</div>
											<span class="label label-success">active</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Ann Polansky</div>
											<span class="label label-warning">busy</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">May Lin</div>
											<span class="label label-important">blocked</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
									<li>
										<span class="col-xs-12 col-sm-2">
											<a class="avatar" href="#"><img src="{{ asset('frontend/images/avatar2.jpg') }}"></a>
										</span>
										<span class="col-sm-10">
											<div class="text-blue">Kate Norman</div>
											<span class="label label-default">offline</span>
											<a href="#" class="fa fa-facebook-square"></a>
											<a href="#" class="fa fa-twitter-square"></a>
											<a href="#" class="fa fa-linkedin-square"></a>
											<ul class="list-rating disp-in">
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star"></span></li>
												<li><span class="icon icon-xxs material-icons-star_half"></span></li>
												
											</ul>
											<span class="info_extra">
												<span class="col-sm-3">$890.00 </span>
												<span class="col-sm-6">$2000k+ invested </span>
												
												<span class="col-sm-3">
													<i class="fa fa-map-marker" aria-hidden="true"></i> USA
												</span>
											</span>
											<p>
												We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.
											</p>
										</span>
									</li>
								</ul>
						
							</div>
						</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 prop_sidebar">	
					<h6 class="text-blue text-center">RECENTLY VIEWED </h6>
					<div data-items="1" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" class="owl-carousel owl-style-minimal">
						<div class="product product-item-fullwidth property-grid-item">
							<div class="product-slider">
								<div class="product-slider-inner">
								  <div data-items="1" data-stage-padding="0" data-loop="true" data-margin="3" data-mouse-drag="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" class="owl-carousel owl-style-minimal">
									<div class="item">
									  <figure><img src="{{ asset('frontend/images/list-1.jpg') }}" alt="" width="270" height="360"/>
									  </figure>
									</div>
									<div class="item">
									  <figure><img src="{{ asset('frontend/images/list-2.jpg') }}" alt="" width="270" height="360"/>
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
								<h5 class="product-header"><a href="#">Lorem ipsum is dummy text</a></h5>
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
								  <p class="pricing-object pricing-object-xl price-current"><span class="small small-middle">$</span><span class="price">1150</span><span class="small small-bottom">.00</span></p>
								</div>
								<div class="product-aside-bottom">
								  <div class="stepper-wrap">
									<p>Quantity</p>
									<input type="number" data-zeros="false" value="1" min="1" max="40"/>
								  </div><a href="#" class="btn btn-icon btn-icon-left btn-primary product-control"><span class="icon icon-sm fa-shopping-cart"></span><span>Buy Now</span></a>
								</div>
							  </div>
							</div>
						  </div>
						</div>
						<div class="product product-item-fullwidth property-grid-item">
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
								<h5 class="product-header"><a href="#">Lorem ipsum is dummy text</a></h5>
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
								  <p class="pricing-object pricing-object-xl price-current"><span class="small small-middle">$</span><span class="price">1150</span><span class="small small-bottom">.00</span></p>
								</div>
								<div class="product-aside-bottom">
								  <div class="stepper-wrap">
									<p>Quantity</p>
									<input type="number" data-zeros="false" value="1" min="1" max="40"/>
								  </div><a href="#" class="btn btn-icon btn-icon-left btn-primary product-control"><span class="icon icon-sm fa-shopping-cart"></span><span>Buy Now</span></a>
								</div>
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
<div id="mypmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none; margin-top:7%;">


        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Profile</h4>
                </div>
                <div class="modal-body">
                    <div id="frmTasks" name="frmTasks" class="form-horizontal">
                        <div class="form-group">
                            <label for="inputTask" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
                                <p>$890.00</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputTask" class="col-sm-3 control-label">Invested</label>
                            <div class="col-sm-9">
                                <p>$2000k+ invested</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputTask" class="col-sm-3 control-label">Location</label>
                            <div class="col-sm-9">
                                 <p>USA</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputTask" class="col-sm-3 control-label">Review</label>
                            <div class="col-sm-9">
                                <p>We work with the companies that have established a stainless reputation in what they do.We work with the companies that have established a stainless reputation in what they do.</p>
                            </div>
                        </div>
						
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="saveprofile()" type="button" class="btn btn-info waves-effect waves-light"
                            id="btn-savecomm" value="add">Update Now
                    </button>
                   
                    <input type="hidden" id="idnew" name="idnew" value="0">


                </div>
            </div>
        </div>


    </div>
@endsection


<div class="modal fade  image-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Profile Pic</h4>
            </div>
            <div class="modal-body">
                <img src="{{ url('uploads/buyer/profile_pic') }}/{{$profile_pic['upload_filename']}}" style="width: 100%" />
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade id-proof-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">ID proof Attached</h4>
            </div>
            <div class="modal-body">
                <img src="{{ url('uploads/buyer/id_proof') }}/{{$attach['upload_filename']}}" style="width: 100%" />
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade fund-proof-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Fund proof Attached</h4>
            </div>
            <div class="modal-body">
                <img src="{{ url('uploads/buyer/fund_proof') }}/{{$attach['upload_filename']}}" style="width: 100%" />
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@section('custom_javascript')

	<script type="text/javascript" src="{{ asset('frontend/js/ion.rangeSlider.min.js') }}" ></script>
	<script src="{{ asset('backend/js/jquery.validate.js') }}" type="text/javascript"></script>

	<script type="text/javascript">
		// alert("hello");
		$(document).ready(function() {

             $(".profile-pic-popup").click(function(){
                $(".image-modal").modal();
            });

            $(".id-proof-popup").click(function(){
                $(".id-proof-modal").modal();
            });

            $(".fund-proof-popup").click(function(){
                $(".fund-proof-modal").modal();
            });

            $("#state option[value='{{ $user_details[0]->state }}']").attr('selected', true);
            $("#have_fund_proof option[value='{{ $user_details[0]->have_fund_proof }}']").attr('selected', true);
            $("#marital_status option[value='{{ $user_details[0]->marital_status }}']").attr('selected', true);
            $("#state").select2({
                placeholder: "-- Select State --"
            });
            setTimeout(function(){
                $("#state").change();
            }, 200);
            
            $("#state").change(function(){
                var chkval = $(this).val();
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
                                $("#city").html(allOption);
                                $("#city option[value='{{ $user_details[0]->city }}']").attr('selected', true);
                                $("#city").select2({
                                    placeholder: "-- Select City --"
                                });
                            }
                        }
                    })
                }
            });
            
            $("#city").change(function(){
                var zipcode = $("#city option:selected").attr("data-zip");
                $("input[name='zip_code']").val(zipcode);
            });



            $("#edit_buyer").validate({

	            rules: {
	                first_name:{
	                  required: true,
	                  maxlength: 100
	                },
	                last_name: {
	                    maxlength: 100
	                },
	                address: {
	                    required: true
	                },
					state: {
	                    required: true
	                },
					city: {
	                    required: true
	                },
					zip_code: {
	                    required: true
	                },
					email: {
	                    required: true,
	                    email: true
	                },
					username: {
	                    required: true,
	                    minlength: 6,
	                    maxlength: 20
	                },
					password: {
	                    required: true,
	                    minlength: 8,
	                    maxlength: 20
	                },
					confirm_pass: {
	                    required: true,
	                    equalTo: '#password'
	                },
					telephone: {
	                    required: true
	                },
					mobile: {
	                    required: true
	                },
					company_name: {
	                    required: true
	                },
					experience: {
	                    required: true
	                },
					id_proof_attached: {
	                    required: true
	                },
					branch_nmls: {
	                    required: true,
                        digits: true
	                },
					nmls: {
	                    required: true,
                        digits: true
	                }
	            },
	            submitHandler: function () {
                    $(".update_btn").prop("disabled", true);
                    $.ajax({
	                    type: "POST",
	                    headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
	                    url: "{{ url('update-user') }}",
	                    data: new FormData($("#edit_buyer")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
	                    success: function(response){
	                       if(response.status == 1) {
								swal({
                                    title: 'Update Successfully',
                                    text: "Buyer Added Successfully.",
                                    type: 'success'
                                    }, function () {
                                    window.location.href = "{{ URL('user-profile') }}";
                                });
	                        }
	                        else
	                        {
	                        	$(".update_btn").prop("disabled", false);
	                            swal({
                                    title: 'Oops!',
                                    text: "Something went wrong. Please try again.",
                                    type: 'error'
                                });
	                        }
	                    }
	                });
	            }
	        });

        });
	</script>

@endsection