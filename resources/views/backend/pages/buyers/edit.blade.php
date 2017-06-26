@extends('backend.layouts.master')

@section('custom_style')

<style type="text/css">
    
</style>

@endsection

@section('main_content')

	<div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-7">
                <div class="page-breadcrumb-wrap">
                    <div class="page-breadcrumb-info">
                        <h2 class="breadcrumb-titles">Buyer <small>Edit Buyer </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page"> Edit Buyer </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
            <div class="box-widget widget-module">
                <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-slack"></i></span>
                    <h4> Edit Buyer </h4>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="edit_buyer" enctype="multipart/form-data">
                            {{-- {!! csrf_field() !!} --}}
                            <input type="hidden" name="buyer_id" value="{{ $buyer_details[0]->unique_id }}">
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Full Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ $buyer_details[0]->first_name }}" class="form-control"/>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ $buyer_details[0]->last_name }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea type="text" name="address" id="address" placeholder="Enter Address" class="form-control" style="resize: vertical; min-height: 100px; max-height: 100px">{{ $buyer_details[0]->address }}</textarea>
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
                                    <input type="text" name="zip_code" id="zip_code" placeholder="Enter Zip Code" value="{{ $buyer_details[0]->zip_code }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" id="email" placeholder="Enter Email Address" value="{{ $buyer_details[0]->email }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" id="username" placeholder="Enter Username" value="{{ $buyer_details[0]->username }}" class="form-control"/>
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
                                    <input type="text" class="form-control phone_us-mask" name="telephone" id="telephone" value="{{ $buyer_details[0]->telephone }}" placeholder="Enter Telephone Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Mobile</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control phone-mask" name="mobile" id="mobile" value="{{ $buyer_details[0]->mobile }}" placeholder="Enter Mobile Number" />
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
                                    <input type="text" name="spouse_name" id="spouse_name"  placeholder="Enter Spouse Name"  value="{{ $buyer_details[0]->spouse_name }}" class="form-control"/>
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
                            <?php $profile_pic = json_decode($buyer_details[0]->profile_pic, true); ?>
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
                            <?php $attach = json_decode($buyer_details[0]->fund_proof_attachment, true); ?>
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
                            <?php $attach = json_decode($buyer_details[0]->id_proof_attachment, true); ?>
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
                                        <option value="1" @if($buyer_details[0]->id_proof_attached == 1) selected @endif>Driving license</option>
                                        <option value="2" @if($buyer_details[0]->id_proof_attached == 2) selected @endif>State Proof</option>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_modal')
    
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

@endsection

@section('custom_script')
	<script src="{{ asset('backend/js/jquery.validate.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

            $(".profile-pic-popup").click(function(){
                $(".image-modal").modal();
            });

            $(".id-proof-popup").click(function(){
                $(".id-proof-modal").modal();
            });

            $(".fund-proof-popup").click(function(){
                $(".fund-proof-modal").modal();
            });

            $("#state option[value='{{ $buyer_details[0]->state }}']").attr('selected', true);
            $("#have_fund_proof option[value='{{ $buyer_details[0]->have_fund_proof }}']").attr('selected', true);
            $("#marital_status option[value='{{ $buyer_details[0]->marital_status }}']").attr('selected', true);
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
                                $("#city option[value='{{ $buyer_details[0]->city }}']").attr('selected', true);
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
	                    url: "{{ url('admin/buyer/update') }}",
	                    data: new FormData($("#edit_buyer")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
	                    success: function(response){
	                       if(response.status == 1) {
	                            //hide_mask();
								swal({
                                    title: 'Update Successfully',
                                    text: "Buyer Added Successfully.",
                                    type: 'success'
                                    }, function () {
                                    window.location.href = "{{ URL('admin/buyer') }}";
                                });
	                        }
	                        else
	                        {
	                            swal({
                                    title: 'Oops!',
                                    text: "Something went wrong. Please try again.",
                                    type: 'danger'
                                });
	                        }
	                    }
	                });
	            }
	        });
		});
	</script>
	
@endsection