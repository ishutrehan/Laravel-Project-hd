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
                        <h2 class="breadcrumb-titles">Property <small> View Details</small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active-page">View Details of Property</li>
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
                    <a href="{{ url('admin/property') }}" class="btn btn-danger back_btn_head">Back</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ ucfirst($property_details[0]->title) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ ucfirst($property_details[0]->description) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Features</th>
                                        <td>{{ ucfirst($property_details[0]->features) }}</td>
                                    </tr>
                                    <?php $prop_images = json_decode($property_details[0]->property_images, true); ?>
                                    <tr>
                                        <th>Property Images</th>
                                        <td>
                                            @foreach($prop_images as $key => $value)
                                                <img src="{{ url('uploads/property') }}/{{ $value['upload_filename'] }}" style="width: 120px; cursor: pointer; margin-right: 15px;" class="property-image-popup" data-id="{{$key+1}}" alt="{{ $value['original_filename'] }}" />
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Property Type</th>
                                        <td>{{ ucfirst($property_details[0]->property_type) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ ucfirst($property_details[0]->address) }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ ucfirst($property_details[0]->city_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>{{ ucfirst($property_details[0]->state_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Zip Code</th>
                                        <td>{{ $property_details[0]->zip_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Bedrooms</th>
                                        <td>{{ $property_details[0]->bedrooms }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Bathrooms</th>
                                        <td>{{ $property_details[0]->bathrooms }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Floors</th>
                                        <td>{{ $property_details[0]->floors }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dimesion (in Square Feet)</th>
                                        <td>{{ $property_details[0]->square_feet }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dimesion (in Lot Square Feet)</th>
                                        <td>{{ $property_details[0]->lot_square_feet }}</td>
                                    </tr>
                                    <tr>
                                        <th>Have Pool ?</th>
                                        <td>{{ ($property_details[0]->pool == 1) ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Have Garage ?</th>
                                        <td>{{ ($property_details[0]->garage == 1) ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Is in City ?</th>
                                        <td>{{ ($property_details[0]->in_city == 1) ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Distance From Main City (in km)</th>
                                        <td>{{ $property_details[0]->dis_from_main_city }} Kms</td>
                                    </tr>
                                    <tr>
                                        <th>Built In Year</th>
                                        <td>{{ $property_details[0]->built_in_year }} Kms</td>
                                    </tr>
                                    <tr>
                                        <th>Estimated Payoff (in $)</th>
                                        <td><b>$</b> {{ $property_details[0]->estimated_payoff }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ date('d F Y H:i a', strtotime($property_details[0]->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ date('d F Y H:i a', strtotime($property_details[0]->updated_at)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center;margin-top: 10px;"><button class="btn btn-danger" onclick="window.location.href = '{{ url('admin/property') }}'">Back</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_modal')

@foreach($prop_images as $key => $valu)
    <div class="modal fade property-image-modal-{{$key+1}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Property Image - {{$valu['original_filename']}}</h4>
                </div>
                <div class="modal-body">
                    <img src="{{ url('uploads/property') }}/{{$valu['upload_filename']}}" style="width: 100%" />
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endforeach

@endsection

@section('custom_script')

    <script type="text/javascript">
        jQuery(document).ready(function($) {

            $(".property-image-popup").click(function(){
                var data_id = $(this).attr("data-id");
                $(".property-image-modal-"+data_id).modal();
            });
        });
    </script>
	
@endsection