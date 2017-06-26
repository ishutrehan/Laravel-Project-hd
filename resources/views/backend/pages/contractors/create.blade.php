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
                        <h2 class="breadcrumb-titles">Contractors <small> Add New Contractors </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="active-page"> Add New Contractors</li>
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
                    <h4>Add New Contractors</h4>
                    <a href="{{ url('admin/contractors') }}" class="btn btn-danger add_btn">Cancel</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="add_contractors" enctype="multipart/form-data">
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
                                <label class="col-md-2 col-md-offset-1 control-label">Licensed State</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="licensed_state" id="licensed_state" >
                                        <option ></option>
                                        {!! $all_states !!}
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">License Number</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="license_number" id="license_number" placeholder="Enter License Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Classification</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="classification" id="classification" placeholder="Enter classification no." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 col-xs-12 control-label exp-label">Experience</label>
                                <div class="col-md-3 col-xs-9">
                                    <input type="number" name="experi_year" id="experi_year" placeholder="Enter number of years" min="0" class="form-control"/>
                                </div>
                                <div class="col-md-1 col-xs-3" style="font-size: 16px; padding-left: 0px;padding-top: 10px">years</div>
                                <div class="col-md-3 col-xs-9">
                                    <input type="number" name="experi_month" id="experi_month" placeholder="Enter number of months" min="0" max="11" class="form-control" title="Months of experience" />
                                </div>
                                <div class="col-md-1 col-xs-3" style="font-size: 16px; padding-left: 0px;padding-top: 10px">months</div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Profile Pic</label>
                                <div class="col-md-8">
                                    <input type="file" class="filestyle" data-buttontext="Attach Profile Pic" name="profile_pic" id="profile_pic" data-buttonname="btn-info">
                                    <label id="profile_pic-error" class="error" for="profile_pic" style="display: none"></label>
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
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary submit_btn"/>
                                    <button type="button" name="cancel_btn" id="cancel_btn" class="btn btn-danger" onclick="window.location.href = '{{ url('admin/contractors') }}'">CANCEL</button>
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
            $("#licensed_state").select2({
                placeholder: "-- Select License State --"
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

            $("#add_contractors").validate({
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
                    classification: {
                        required: true,
                        number: true
                    },
                    licensed_state :{
                       required: true
                    },
                    license_number :{
                       required: true,
                        number: true  
                    },
                    experi_year: {
                        required: true
                    },
                    experi_month: {
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
                    $(".submit_btn").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                        url: "{{ url('admin/contractors/create') }}",
                        data: new FormData($("#add_contractors")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        success: function(response){
                            if(response.status == 1) {
                                //hide_mask();
                                swal({
                                    title: 'Added Successfully',
                                    text: "Contractor Added Successfully.",
                                    type: 'success'
                                    }, function () {
                                    window.location.href = "{{ URL('admin/contractors') }}";
                                });
                            }
                            else
                            {
                                //hide_mask();
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