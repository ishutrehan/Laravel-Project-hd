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
                        <h2 class="breadcrumb-titles">Property Type <small> View Details</small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page">View Details of Property Type</li>
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
                    <a href="{{ url('admin/property_type') }}" class="btn btn-danger back_btn_head">Back</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Property Type</th>
                                        <td>{{ ucwords($property_type_details[0]->property_type) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ ucfirst($property_type_details[0]->description) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $property_type_details[0]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $property_type_details[0]->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center;margin-top: 10px;"><button class="btn btn-danger" onclick="window.location.href = '{{ url('admin/property_type') }}'">Back</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_modal')


@endsection

@section('custom_script')

	<script type="text/javascript">
        jQuery(document).ready(function($) {
             
        });
    </script>

@endsection