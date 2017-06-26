@extends('backend.layouts.master')

@section('custom_style')

<style type="text/css">
    @media screen and (max-width: 767px)
    {
        .pool-label
        {
            font-weight: bold !important;
        }

        .style_dimen
        {
            margin-bottom: 10px;
        }
    }
</style>

@endsection

@section('main_content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-7">
                <div class="page-breadcrumb-wrap">
                    <div class="page-breadcrumb-info">
                        <h2 class="breadcrumb-titles">Property <small>Edit Property </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page"> Edit Property </li>
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
                    <h4>Edit Property </h4>
                    <a href="{{ url('admin/property') }}" class="btn btn-danger add_btn">Cancel</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="edit_property" enctype="multipart/form-data">
                            {{-- {!! csrf_field() !!} --}}
                            <input type="hidden" name="property_id" value="{{ $property_details[0]->unique_id }}">
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Seller Name</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="seller_id" id="seller_id" >
                                        <option ></option>
                                        {!! $all_sellers !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Title</label>
                                <div class="col-md-8">
                                    <input type="text" name="title" id="title" placeholder="Enter Title" value="{{ $property_details[0]->title }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Description</label>
                                <div class="col-md-8">
                                    <textarea  name="description" id="description" placeholder="Enter Description" style="resize: vertical; min-height: 100px; max-height: 100px;" class="form-control">{{ $property_details[0]->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Features</label>
                                <div class="col-md-8">
                                    <textarea  name="features" id="features" placeholder="Enter Description" style="resize: vertical; min-height: 100px; max-height: 100px;" class="form-control">{{ $property_details[0]->features }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Property Type</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="property_type" id="property_type" >
                                        <option ></option>
                                        {!! $all_sellers !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea type="text" name="address" id="address" placeholder="Enter Address" class="form-control" style="resize: vertical; min-height: 100px; max-height: 100px;">{{ $property_details[0]->address }}</textarea>
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
                                    <input type="text" name="zip_code" id="zip_code" placeholder="Enter Zip Code" value="{{ $property_details[0]->zip_code }}" class="form-control"/>
                                </div>
                            </div>
                            <?php $prop_images = json_decode($property_details[0]->property_images, true); ?>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Previous Images</label>
                                <div class="col-md-8">
                                    @if($property_details[0]->property_images != '')
                                        @foreach($prop_images as $key => $value)
                                            <img src="{{ url('uploads/property') }}/{{ $value['upload_filename'] }}" style="width: 120px; cursor: pointer; margin-right: 15px;" class="property-image-popup" data-id="{{$key+1}}" alt="{{ $value['original_filename'] }}" />
                                        @endforeach
                                    @else
                                        <p style="margin: 8px 0px; color: #ff4839"> No previous images found</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Property Images</label>
                                <div class="col-md-8">
                                    <input type="file" class="filestyle" data-buttontext="Upload Property Images" name="property_images[]" id="property_images[]" data-buttonname="btn-info" multiple>
                                    <label id="property_images[]-error" class="error" for="property_images[]" style="display: none"></label>
                                </div>
                                {{-- <label id="property_images[]-error" class="error" for="property_images[]" style="display: none;"></label> --}}
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Overwrite Previous images</label>
                                <div class="col-md-8">
                                    {{-- <input type="text" name="" id="zip_code" placeholder="Enter Zip Code" class="form-control"/> --}}
                                    <div class="icheck-input">
                                        <input name="overwrite_prop_img" class="i-min-check" type="radio" id="overwrite-yes" value="1" checked>
                                        <label for="overwrite-yes" style="margin-right: 15px"> <b>Yes </b>(i.e. previous images replace by new images)</label>
                                    </div>
                                    <div class="icheck-input">
                                        <input name="overwrite_prop_img" class="i-min-check" type="radio" id="overwrite-no" value="2">
                                        <label for="overwrite-no"> <b>No </b>(i.e keep both previous and new images)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Number of Bedrooms</label>
                                <div class="col-md-8">
                                    <input type="number" name="bedrooms" id="bedrooms" placeholder="Enter Number of Bedrooms" value="{{ $property_details[0]->bedrooms }}" class="form-control" min="1" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Number of Bathrooms</label>
                                <div class="col-md-8">
                                    <input type="number" name="bathrooms" id="bathrooms" placeholder="Enter Number of Bathrooms" value="{{ $property_details[0]->bathrooms }}" class="form-control" min="1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Number of Floors</label>
                                <div class="col-md-8">
                                    <input type="number" name="floors" id="floors" placeholder="Enter Number of Floors" value="{{ $property_details[0]->floors }}" class="form-control" min="1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Dimesion (in Square Feet)</label>
                                <div class="col-md-8">
                                    <input type="text" name="square_feet" id="square_feet" placeholder="Enter Dimesion (in Square Feet)" value="{{ $property_details[0]->square_feet }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Dimesion (in Lot Square Feet)</label>
                                <div class="col-md-8">
                                    <input type="text" name="lot_square_feet" id="lot_square_feet" placeholder="Enter Dimesion (in Lot Square Feet)" value="{{ $property_details[0]->lot_square_feet }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Have Pool ?</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="pool" id="pool">
                                        <option value="2" @if($property_details[0]->pool == 2) selected @endif>No</option>
                                        <option value="1" @if($property_details[0]->pool == 1) selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group have_pool" style="display: {{ ($property_details[0]->pool == 1) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Pool Shape</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="pool_shape" id="pool_shape">
                                        <option value="rectangle">Rectangle</option>
                                        <option value="square">Square</option>
                                        <option value="circle">Circle</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group have_pool" style="display: {{ ($property_details[0]->pool == 1) ? 'block' : 'none' }};">
                            <?php
                                if($property_details[0]->pool == 1 && !is_null($property_details[0]->pool_dimension))
                                {
                                    $pool_dimension = json_decode($property_details[0]->pool_dimension, true);
                                }
                            ?>
                                <label class="col-md-2 col-md-offset-1 control-label pool-label">Pool Dimension (in feet)</label>
                                <div class="col-md-8">
                                    <div class="col-sm-4 style_dimen" style="padding: 0px;">
                                        <label class="control-label" for="pool_length">Pool Length (in feet)</label>
                                        <input type="number" name="pool_length" id="pool_length" placeholder="Length (in feet)" value="{{ (isset($pool_dimension) && is_array($pool_dimension) && !empty($pool_dimension['length'])) ? $pool_dimension['length'] : '' }}" class="form-control" min="0" step="1" />
                                    </div>
                                    <div class="col-sm-4 style_dimen" style="padding: 0px;">
                                        <label class="control-label" for="pool_width">Pool Width (in feet)</label>
                                        <input type="number" name="pool_width" id="pool_width" placeholder="Width (in feet)" value="{{ (isset($pool_dimension) && is_array($pool_dimension) && !empty($pool_dimension['width'])) ? $pool_dimension['width'] : '' }}" class="form-control" min="0" step="1" />
                                    </div>
                                    <div class="col-sm-4" style="padding: 0px;">
                                        <label class="control-label" for="pool_depth">Pool Depth (in feet)</label>
                                        <input type="number" name="pool_depth" id="pool_depth" placeholder="Depth (in feet)" value="{{ (isset($pool_dimension) && is_array($pool_dimension) && !empty($pool_dimension['depth'])) ? $pool_dimension['depth'] : '' }}" class="form-control" min="0" step="1" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Have Garage ?</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="garage" id="garage">
                                        <option value="2" @if($property_details[0]->garage == 2) selected @endif>No</option>
                                        <option value="1" @if($property_details[0]->garage == 1) selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group have_garage" style="display: {{ ($property_details[0]->garage == 1) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Garage Capacity</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="garage_capacity" id="garage_capacity">
                                        <option value="1">1 Car</option>
                                        <option value="2">2 Car</option>
                                        <option value="3">3 Car</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Is in City ?</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="in_city" id="in_city">
                                        <option value="2" @if($property_details[0]->in_city == 2) selected @endif>No</option>
                                        <option value="1" @if($property_details[0]->in_city == 1) selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group yes_in_city" style="display: {{ ($property_details[0]->in_city == 1) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance of Nearest School (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="in_city_school" id="in_city_school" placeholder="Enter Distance of school (in km)" value="{{ (isset($property_details[0]->in_city_school) && !is_null($property_details[0]->in_city_school)) ? $property_details[0]->in_city_school : '' }}" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group yes_in_city" style="display: {{ ($property_details[0]->in_city == 1) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance of Nearest Market (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="in_city_market" id="in_city_market" placeholder="Enter Distance of Market (in km)" value="{{ (isset($property_details[0]->in_city_market) && !is_null($property_details[0]->in_city_market)) ? $property_details[0]->in_city_market : '' }}" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group yes_in_city" style="display: {{ ($property_details[0]->in_city == 1) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance of Nearest Hospital (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="in_city_hospital" id="in_city_hospital" placeholder="Enter Distance of Hospital (in km)" value="{{ (isset($property_details[0]->in_city_hospital) && !is_null($property_details[0]->in_city_hospital)) ? $property_details[0]->in_city_hospital : '' }}" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group not_in_city" style="display: {{ ($property_details[0]->in_city == 2) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance From Main City (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="dis_from_main_city" id="dis_from_main_city" placeholder="Enter Distance From Main City (in km)" value="{{ (isset($property_details[0]->dis_from_main_city) && !is_null($property_details[0]->dis_from_main_city)) ? $property_details[0]->dis_from_main_city : '' }}" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group not_in_city" style="display: {{ ($property_details[0]->in_city == 2) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance of Nearest School (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="not_in_city_school" id="not_in_city_school" placeholder="Enter Distance of School (in km)" value="{{ (isset($property_details[0]->not_in_city_school) && !is_null($property_details[0]->not_in_city_school)) ? $property_details[0]->not_in_city_school : '' }}" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group not_in_city" style="display: {{ ($property_details[0]->in_city == 2) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance of Nearest Market (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="not_in_city_market" id="not_in_city_market" placeholder="Enter Distance of Market (in km)" value="{{ (isset($property_details[0]->not_in_city_market) && !is_null($property_details[0]->not_in_city_market)) ? $property_details[0]->not_in_city_market : '' }}" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group not_in_city" style="display: {{ ($property_details[0]->in_city == 2) ? 'block' : 'none' }};">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance of Nearest Hospital (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="not_in_city_hospital" value="{{ (isset($property_details[0]->not_in_city_hospital) && !is_null($property_details[0]->not_in_city_hospital)) ? $property_details[0]->not_in_city_hospital : '' }}" id="not_in_city_hospital" placeholder="Enter Distance of Hospital (in km)" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Built In Year</label>
                                <div class="col-md-8">
                                    <input type="text" name="built_in_year" value="{{ $property_details[0]->built_in_year }}" id="built_in_year" placeholder="Built In Year" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">  Estimated Payoff</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" name="estimated_payoff" id="estimated_payoff" value="{{ $property_details[0]->estimated_payoff }}" placeholder="Enter Estimated Payoff" />
                                    </div>
                                    <label id="estimated_payoff-error" class="error" for="estimated_payoff" style="display: none;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="UPDATE" class="btn btn-primary update_btn"/>
                                    <button type="button" name="cancel_btn" id="cancel_btn" class="btn btn-danger" onclick="window.location.href = '{{ url('admin/property') }}'">CANCEL</button>
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

@if($property_details[0]->property_images != '')
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
@endif

@endsection

@section('custom_script')
    <script src="{{ asset('backend/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            $(".property-image-popup").click(function(){
                var data_id = $(this).attr("data-id");
                $(".property-image-modal-"+data_id).modal();
            });

            $("#state").select2({
                placeholder: "-- Select State --"
            });

            $("#seller_id").select2({
                placeholder: "-- Select Seller Name --"
            });

            $("#property_type").select2({
                placeholder: "-- Select Property Type --"
            });

            $("#city").select2({
                placeholder: "-- Select City --"
            });

            $("#garage").change(function(){
                var garVal = $(this).val();
                if(garVal == 1)
                {
                    $(".have_garage").show();
                }
                else
                {
                    $(".have_garage").hide();
                }
            });

            $("#in_city").change(function(){
                var garVal = $(this).val();
                if(garVal == 1)
                {
                    $(".yes_in_city").show();
                    $(".not_in_city").hide();
                }
                else
                {
                    $(".not_in_city").show();
                    $(".yes_in_city").hide();
                }
            });

            $("#pool").change(function(){
                var garVal = $(this).val();
                if(garVal == 1)
                {
                    $(".have_pool").show();
                }
                else
                {
                    $(".have_pool").hide();
                }
            });

            $("#state option[value='{{ $property_details[0]->state }}']").prop('selected', true);
            $("#seller_id option[value='{{ $property_details[0]->seller_id }}']").prop('selected', true);
            $("#property_type option[value='{{ $property_details[0]->property_type }}']").prop('selected', true);
            @if(!is_null($property_details[0]->pool_shape))
                $("#pool_shape option[value='{{ $property_details[0]->pool_shape }}']").prop('selected', true);
            @endif

            @if(!is_null($property_details[0]->garage_capacity))
                $("#garage_capacity option[value='{{ $property_details[0]->garage_capacity }}']").prop('selected', true);
            @endif

            $("#pool_shape").select2({
                placeholder: "-- Select Pool Shape --"
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
                                $("#city option[value='{{ $property_details[0]->city }}']").attr('selected', true);
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

            $.validator.addMethod('Decimal', function(value, element) {
                return this.optional(element) || /^(?=.*\d)\d{0,2}(\.\d{0,2}?)?$/.test(value);
            }, "Please enter distance between 0 and 99.99");

            $.validator.setDefaults({
                ignore: []
            });

            $("#edit_property").validate({
                // ignore: '',
                rules: {
                    seller_id:{
                      // required: true,
                    },
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    features: {
                        required: true,
                    },
                    property_type: {
                        // required: true,
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
                    'property_images[]': {
                        // required: true,
                    },
                    bedrooms: {
                        required: true,
                    },
                    bathrooms: {
                        required: true,
                    },
                    floors: {
                        required: true,
                    },
                    square_feet: {
                        required: true,
                        number: true
                    },
                    lot_square_feet: {
                        required: true,
                        number: true
                    },
                    pool: {
                        required: true
                    },
                    garage: {
                        required: true
                    },
                    in_city: {
                        required: true
                    },
                    in_city_school: {
                        Decimal: true
                    },
                    in_city_market: {
                        Decimal: true
                    },
                    in_city_hospital: {
                        Decimal: true
                    },
                    not_in_city_school: {
                        Decimal: true
                    },
                    not_in_city_market: {
                        Decimal: true
                    },
                    not_in_city_hospital: {
                        Decimal: true
                    },
                    dis_from_main_city: {
                        Decimal: true
                    },
                    built_in_year: {
                        required: true,
                        digits: true,
                        maxlength: 4,
                        minlength: 4
                    },
                    estimated_payoff: {
                        required: true,
                        number: true
                    }
                },
                submitHandler: function () {
                    $(".update_btn").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                        url: "{{ url('admin/property/update') }}",
                        data: new FormData($("#edit_property")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        success: function(response) {
                           if(response.status == 1) {
                                swal({
                                    title: 'Updated Successfully',
                                    text: "Property Updated Successfully.",
                                    type: 'success'
                                }, function () {
                                    window.location.href = "{{ URL('admin/property') }}";
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