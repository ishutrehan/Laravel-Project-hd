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
                        <h2 class="breadcrumb-titles">Property Type <small>Add New Property Type </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="{{ url('admin') }}">Home</a>
                            </li>
                            <li class="active-page"> Add New Property Type</li>
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
                    <h4>Add New Property Type</h4>
                    <a href="{{ url('admin/property_type') }}" class="btn btn-danger add_btn">Cancel</a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="add_property_type" enctype="multipart/form-data">
                            {{-- {!! csrf_field() !!} --}}
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Property Type</label>
                                <div class="col-md-8">
                                    <input type="text" name="property_type" id="property_type" placeholder="Enter Property Type" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1 control-label">Description</label>
                                <div class="col-md-8">
                                    <textarea type="text" name="description" id="description" placeholder="Enter Description" class="form-control" style="resize: vertical; min-height: 100px; max-height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary submit_btn"/>
                                    <button type="button" name="cancel_btn" id="cancel_btn" class="btn btn-danger" onclick="window.location.href = '{{ url('admin/property_type') }}'">CANCEL</button>
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

            $.validator.setDefaults({
                ignore: []
            });

            $("#add_property_type").validate({

                rules: {
                    property_type:{
                      required: true,
                      maxlength: 50
                    },
                    description: {
                        maxlength: 255
                    }
                },
                submitHandler: function () {
                    $(".submit_btn").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                        url: "{{ url('admin/property_type/create') }}",
                        data: new FormData($("#add_property_type")[0]),
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        success: function(response){
                           if(response.status == 1) {
                                swal({
                                    title: 'Added',
                                    text: "Property Type Added Successfully.",
                                    type: 'success'
                                }, function () {
                                    window.location.href = "{{ URL('admin/property_type') }}";
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