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
                        <h2 class="breadcrumb-titles">Property <small>Add New Property </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page"> Add New Property </li>
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
                    <h4>Add New Property </h4>
                    <a href="{{ url('admin/property') }}" class="btn btn-danger add_btn">Cancel</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="add_property" enctype="multipart/form-data">
                            {{-- {!! csrf_field() !!} --}}
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
                                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Description</label>
                                <div class="col-md-8">
                                    <textarea  name="description" id="description" placeholder="Enter Description" style="resize: vertical; min-height: 100px; max-height: 100px;" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Features</label>
                                <div class="col-md-8">
                                    <textarea  name="features" id="features" placeholder="Enter Description" style="resize: vertical; min-height: 100px; max-height: 100px;" class="form-control"></textarea>
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
                                <label class="col-md-2 col-md-offset-1 control-label">Property Images</label>
                                <div class="col-md-8">
                                    <input type="file" class="filestyle" data-buttontext="Upload Property Images" name="property_images[]" id="property_images[]" data-buttonname="btn-info" multiple>
                                    <label id="property_images-error" class="error" for="property_images" style="display: none"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Number of Bedrooms</label>
                                <div class="col-md-8">
                                    <input type="number" name="bedrooms" id="bedrooms" placeholder="Enter Number of Bedrooms" class="form-control" min="1" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Number of Bathrooms</label>
                                <div class="col-md-8">
                                    <input type="number" name="bathrooms" id="bathrooms" placeholder="Enter Number of Bathrooms" class="form-control" min="1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Number of Floors</label>
                                <div class="col-md-8">
                                    <input type="number" name="floors" id="floors" placeholder="Enter Number of Floors" class="form-control" min="1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Dimesion (in Square Feet)</label>
                                <div class="col-md-8">
                                    <input type="text" name="square_feet" id="square_feet" placeholder="Enter Dimesion (in Square Feet)" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Dimesion (in Lot Square Feet)</label>
                                <div class="col-md-8">
                                    <input type="text" name="lot_square_feet" id="lot_square_feet" placeholder="Enter Dimesion (in Lot Square Feet)" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Have Pool ?</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="pool" id="pool">
                                        <option value="2">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Have Garage ?</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="garage" id="garage">
                                        <option value="2">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Is in City ?</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="in_city" id="in_city">
                                        <option value="2">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Distance From Main City (in km)</label>
                                <div class="col-md-8">
                                    <input type="number" name="dis_from_main_city" id="dis_from_main_city" placeholder="Enter Distance From Main City (in km)" class="form-control" min="0" step="0.1" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Built In Year</label>
                                <div class="col-md-8">
                                    <input type="text" name="built_in_year" id="built_in_year" placeholder="Built In Year" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">  Estimated Payoff</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" name="estimated_payoff" id="estimated_payoff" placeholder="Enter Estimated Payoff" />
                                    </div>
                                    <label id="estimated_payoff-error" class="error" for="estimated_payoff" style="display: none;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary submit_btn"/>
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

            $("#seller_id").select2({
                placeholder: "-- Select Seller Name --"
            });

            $("#property_type").select2({
                placeholder: "-- Select Property Type --"
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

            $("#add_property").validate({
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
                        required: true
                    },
                    lot_square_feet: {
                        required: true
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
                    dis_from_main_city: {
                        required: true
                    },
                    built_in_year: {
                        required: true,
                        digits: true,
                        maxlength: 4,
                        minlength: 4
                    },
                    estimated_payoff: {
                        required: true,
                        digits: true
                    }
                },
                submitHandler: function () {
                    $(".submit_btn").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                        url: "{{ url('admin/property/create') }}",
                        data: new FormData($("#add_property")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        success: function(response) {
                           if(response.status == 1) {
                                swal({
                                    title: 'Added Successfully',
                                    text: "Property Added Successfully.",
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