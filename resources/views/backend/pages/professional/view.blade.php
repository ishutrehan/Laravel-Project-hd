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
                        <h2 class="breadcrumb-titles">Professional <small> View Details</small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page">View Details of Professional</li>
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
                    <h4>View Details</h4>
                    <a href="{{ url('admin/professional') }}" class="btn btn-danger back_btn_head">Back</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ ucfirst($professional_details[0]->first_name) }} {{ ucfirst($professional_details[0]->last_name) }}</td>
                                    </tr>
                                    <?php $profile_pic = json_decode($professional_details[0]->profile_pic, true); ?>
                                    <tr>
                                        <th>Profile Pic</th>
                                        <td><img src="{{ url('uploads/professional/profile_pic') }}/{{$profile_pic['upload_filename']}}" style="width: 100px; cursor: pointer;" class="profile-pic-popup" alt="{{ $profile_pic['original_filename'] }}" /></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ ucfirst($professional_details[0]->address) }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ ucfirst($professional_details[0]->city_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>{{ ucfirst($professional_details[0]->state_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Zip Code</th>
                                        <td>{{ ucfirst($professional_details[0]->zip_code) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{ ucfirst($professional_details[0]->username) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ ucfirst($professional_details[0]->email) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><button class="btn btn-warning pass_change" data-id="unique-{{ $professional_details[0]->user_id }}" style="padding: 4px 10px;"> Change Password </button></td>
                                    </tr>
                                    <tr>
                                        <th>Telephone No.</th>
                                        <td>{{ ucfirst($professional_details[0]->telephone) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile No.</th>
                                        <td>{{ ucfirst($professional_details[0]->mobile) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Licensed State</th>
                                        <td>{{ ucfirst($professional_details[0]->lstate_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>License Number</th>
                                        <td>{{ ucfirst($professional_details[0]->license_number) }}</td>
                                    </tr>
                                    <tr>
                                        <th>License Type</th>
                                        <td>{{ ucfirst($professional_details[0]->license_type) }}</td>
                                    </tr>
                                    <?php $attach = json_decode($professional_details[0]->id_proof_attachment, true); ?>
                                    <tr>
                                        <th>Personal ID Proof</th>
                                        <td><img src="{{ url('uploads/professional/id_proof') }}/{{$attach['upload_filename']}}" style="width: 100px; cursor: pointer;" class="id-proof-popup" alt="{{ $attach['original_filename'] }}" /></td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $professional_details[0]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $professional_details[0]->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center;margin-top: 10px;"><button class="btn btn-danger" onclick="window.location.href = '{{ url('admin/professional') }}'">Back</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_modal')
    
<div class="modal fade image-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Profile Pic</h4>
            </div>
            <div class="modal-body">
                <img src="{{ url('uploads/professional/profile_pic') }}/{{$profile_pic['upload_filename']}}" style="width: 100%" />
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade pass-change-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <form id="change-pass" method="post">
                  <div class="form-group">
                    <label for="email">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" class="form-control"/>
                    <input type="hidden" name="uid" value="{{$professional_details[0]->user_id}}">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Enter confirm password" class="form-control"/>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
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
                <img src="{{ url('uploads/professional/id_proof') }}/{{$attach['upload_filename']}}" style="width: 100%" />
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

            $(".pass_change").click(function(event) {
                $(".pass-change-modal").modal();

                $("#change-pass").validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 8,
                            maxlength: 20
                        },
                        confirm_pass: {
                            required: true,
                            equalTo: '#password'
                        }                  
                    },
                    submitHandler: function () {
                        $(".update_btn").prop("disabled", true);
                        $.ajax({
                            type: "POST",
                            headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                            url: "{{ url('admin/professional/update_password') }}",
                            data: new FormData($("#change-pass")[0]),
                            processData: false,
                            contentType: false,
                            dataType: 'JSON',
                            success: function(response){
                               if(response.status == 1) {
                                    swal({
                                        title: 'Updated',
                                        text: "Professional Updated Successfully.",
                                        type: 'success'
                                    }, function () {
                                        window.location.href = "{{ URL('admin/professional') }}";
                                    });
                                }
                                else
                                {
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
        });
    </script>

@endsection