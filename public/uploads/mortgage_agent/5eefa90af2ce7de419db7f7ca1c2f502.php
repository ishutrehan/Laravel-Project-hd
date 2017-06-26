@extends('backend.layouts.master')

@section('custom_style')

<style type="text/css">
    .logo-text, .logo-text:hover
    {
        font-size: 35px;
        padding: 6px 6px 3px 6px;
        text-decoration: none;
        color: #000000;
        /* font-weight: bold; */
        font-family: 'times new roman';
    }

    .large-logo-text, .large-logo-text:hover
    {
        font-size: 40px;
        padding: 10px 30px 6px 30px !important;
        text-decoration: none;
        font-family: 'times new roman';
        color: #000000;
    }
</style>

@endsection

@section('main_content')

	<div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-7">
                <div class="page-breadcrumb-wrap">
                    <div class="page-breadcrumb-info">
                        <h2 class="breadcrumb-titles">Mortgage Loan Officer <small>Add New Mortgage Loan Officer </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page"> Add New Mortgage Loan Officer</li>
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
                    <h4>Add New Mortgage Loan Officer</h4>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="add_mortgage_officer" enctype="multipart/form-data">
                            {{-- {!! csrf_field() !!} --}}
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Full Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control"/>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name"  class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea type="text" name="address" id="address" placeholder="Enter Address" class="form-control" style="resize: vertical; min-height: 100px; max-height: 100px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">&nbsp;</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="state" id="state" >
                                        <option ></option>
                                        {!! $all_states !!}
                                    </select>
                                    {{-- <label id="state-error" class="error" for="state" style="display: none"></label> --}}
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="city" id="city" required>
                                        <option></option>
                                    </select>
                                    {{-- <label id="city-error" class="error" for="city" style="display: none"></label> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Zip Code</label>
                                <div class="col-md-8">
                                    <input type="text" name="zip_code" id="zip_code" placeholder="Enter Zip Code" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" id="email" placeholder="Enter Email Address" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Confirm Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Enter Password Again" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Telephone</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control phone_us-mask" name="telephone" id="telephone" placeholder="Enter Telephone Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Mobile</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control phone-mask" name="mobile" id="mobile" placeholder="Enter Mobile Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Company Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Experience</label>
                                <div class="col-md-8">
                                    <input type="number" name="experience" id="experience" min="0" step="0.1" placeholder="Enter Total Experience" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Personal ID Proof</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="id_proof_attached" id="id_proof_attached">
                                        <option style="color:#aaaaaa;" value="" disabled>-- Select ID Proof --</option>
                                        <option value="1">Driving license</option>
                                        <option value="2">State Proof</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="filestyle" data-buttontext="Attach ID Proof" name="id_proof_file" id="id_proof_file" data-buttonname="btn-info">
                                    <label id="id_proof_file-error" class="error" for="id_proof_file" style="display: none"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Branch NMLS</label>
                                <div class="col-md-8">
                                    <input type="text" name="branch_nmls" id="branch_nmls" placeholder="Enter Branch NMLS" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">NMLS</label>
                                <div class="col-md-8">
                                    <input type="text" name="nmls" id="nmls" placeholder="Enter NMLS" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary"/>
                                    <button type="button" name="cancel_btn" id="cancel_btn" class="btn btn-danger">CANCEL</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
	<script src="{{ asset('backend/js/jquery.validate.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

            /*$.validator.addMethod("selectOption", function(value, element, arg){
                alert(arg);
                return arg != '';
            }, "Value must not equal arg.");*/

            $("#state").select2({
                placeholder: "-- Select State --"
            });

            $("#city").select2({
                placeholder: "-- Select City --"
            });

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

            $.validator.setDefaults({
                ignore: []
            });

			$("#add_mortgage_officer").validate({
                // ignore: '',
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
	                    email: true,
	                    /*remote: function(){

	                    }*/
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
					id_proof_file: {
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

	                $.ajax({
	                    type: "POST",
	                    headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
	                    url: "{{ url('admin/mortgage/create') }}",
	                    data: new FormData($("#add_mortgage_officer")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
	                    success: function(response){
	                       if(response.status == 1) {
	                            //hide_mask();
								BootstrapDialog.alert({
									title: 'SUCCESS',
									message: 'Task Added Successfully',
									type: BootstrapDialog.TYPE_SUCCESS,
									closable: false,
									callback: function(result){
										if(result)
										{
											//show_mask();
											window.location.href = "{{ URL('admin/mortgage') }}";
										}
									}
								});
	                        }
	                        else
	                        {
	                            //hide_mask();
	                            BootstrapDialog.alert({
									title: 'ERROR',
									message: 'Some error occured',
									type: BootstrapDialog.TYPE_DANGER,
									closable: false,
								});
	                        }
	                    }
	                });
	            }
	        });
		});
	</script>
	
@endsection