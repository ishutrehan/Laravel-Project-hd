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
                        <h2 class="breadcrumb-titles">Appraisers <small> View Details</small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page">View Details of Appraisers</li>
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
                    <a href="{{ url('admin/appraisers') }}" class="btn btn-danger back_btn_head">Back</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ ucfirst($appraisers_details[0]->first_name) }} {{ ucfirst($appraisers_details[0]->last_name) }}</td>
                                    </tr>
                                    <?php $profile_pic = json_decode($appraisers_details[0]->profile_pic, true); ?>
                                    <tr>
                                        <th>Profile Pic</th>
                                        <td><img src="{{ url('uploads/appraisers/profile_pic') }}/{{$profile_pic['upload_filename']}}" style="width: 100px; cursor: pointer;" class="profile-pic-popup" alt="{{ $profile_pic['original_filename'] }}" /></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ ucfirst($appraisers_details[0]->address) }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ ucfirst($appraisers_details[0]->first_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>{{ ucfirst($appraisers_details[0]->state_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Zip Code</th>
                                        <td>{{ ucfirst($appraisers_details[0]->zip_code) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{ ucfirst($appraisers_details[0]->username) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ ucfirst($appraisers_details[0]->email) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><button class="btn btn-warning pass_change" data-id="unique-{{ $appraisers_details[0]->unique_id }}" style="padding: 4px 10px;"> Change Password </button></td>
                                    </tr>
                                    <?php $experience = json_decode($appraisers_details[0]->experience, true); ?>
                                    <tr>
                                        <th>Experience</th>
                                        <td>{{ $experience['year'] }} @if($experience['year'] > 1) years @else year @endif and {{ $experience['month'] }} @if($experience['month'] > 1) months @else month @endif</td>
                                    </tr>
                                    <tr>
                                        <th>Licensed State</th>
                                        <td>{{ ucfirst($appraisers_details[0]->lstate_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>License Number</th>
                                        <td>{{ ucfirst($appraisers_details[0]->license_number) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Classification</th>
                                        <td>{{ ucfirst($appraisers_details[0]->classification) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telephone No.</th>
                                        <td>{{ ucfirst($appraisers_details[0]->telephone) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile No.</th>
                                        <td>{{ ucfirst($appraisers_details[0]->mobile) }}</td>
                                    </tr>
                                    <?php $attach = json_decode($appraisers_details[0]->id_proof_attachment, true); ?>
                                    <tr>
                                        <th>Personal ID Proof</th>
                                        <td><img src="{{ url('uploads/appraisers/id_proof') }}/{{$attach['upload_filename']}}" style="width: 100px; cursor: pointer;" class="id-proof-popup" alt="{{ $attach['original_filename'] }}" /></td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $appraisers_details[0]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $appraisers_details[0]->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center;margin-top: 10px;"><button class="btn btn-danger" onclick="window.location.href = '{{ url('admin/appraisers') }}'">Back</button></div>
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
                <img src="{{ url('uploads/appraisers/profile_pic') }}/{{$profile_pic['upload_filename']}}" style="width: 100%" />
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
                <img src="{{ url('uploads/appraisers/id_proof') }}/{{$attach['upload_filename']}}" style="width: 100%" />
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('custom_script')

    <script type="text/javascript">
        jQuery(document).ready(function($) {
             $(".profile-pic-popup").click(function(){
                $(".image-modal").modal();
            });

            $(".id-proof-popup").click(function(){
                $(".id-proof-modal").modal();
            });
        });
    </script>

@endsection