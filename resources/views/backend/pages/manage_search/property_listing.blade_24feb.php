@extends('backend.layouts.master')

@section('custom_style')

{{-- <link rel="stylesheet" href="{{ asset('backend/datatables/jquery.dataTables.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('backend/datatables/dataTables.bootstrap.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('backend/css/all-css/dataTables.responsive.css') }}"> --}}
<style type="text/css">
    
    /*.table-responsive{
      padding:0px;
    }

    .horizon-line{
      width:100%;
      border:1px solid #f4f4f4;
    }

    .box-title {
        font-size:22px !important;
        padding-top : 5px;
    }

    .error
    {
        color:#ff0000;
        font-weight:normal;
    }

    .search_submit, .clear_content
    {
        margin-top: 25px;
    }

    @media only screen and (max-width: 767px){
      .table-responsive{
        padding-top:10px;
      }

      .box-header{
        padding:10px 10px 0px 10px;
      }

      .horizon-line{
        display:none;
      }

      .search_submit, .clear_content
      {
          margin-top: 0px;
      }

    }

    @media only screen and (min-width: 768px ) and (max-width: 991px){

        .form-group
        {
            margin-bottom: 15px !important;
        }

        .search_submit, .clear_content
        {
            margin-top: 0px;
        }
    }*/
</style>

@endsection

@section('main_content')

	<div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-7">
                <div class="page-breadcrumb-wrap">
                    <div class="page-breadcrumb-info">
                        <h2 class="breadcrumb-titles">Property Search <small>List all Property Search Type </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="{{ url("admin") }}">Home</a>
                            </li>
                            <li class="active-page"> Property Search Type</li>
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
                    <h4>List of All Property Search Type</h4>
                    {{-- <a href="{{ url('admin/seller/create') }}" class="btn btn-primary add_btn"> Add Seller </a> --}}
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <form method="POST" class="form-horizontal" id="search_property_from" enctype="multipart/form-data">
                            @foreach($search_type as $search)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-widget widget-module no-border" style="margin-bottom: 10px;">
                                        <div class="widget-head clearfix" style="background: #fefefe; border-bottom: 1px solid #eeeeee">
                                            <span class="h-icon">
                                                <div class="widget-check ">
                                                    <input class="w-i-check" name="search_type[is_enabled][]" id="{{ $search->search_slug }}" value="{{ $search->search_slug }}" type="checkbox" @if($search->is_enabled == '1') checked @endif>
                                                </div>
                                            </span>
                                            <h4 style="font-size: 16px; font-weight: 500">{{ $search->search_type }}</h4>
                                        </div>
                                        <div class="widget-container" style="display: @if($search->is_enabled == '2') none @else block @endif">
                                            <div class="widget-block">
                                                @if($search->search_slug == 'property_type')
                                                    <div class="icheck-input">
                                                        <input class="i-min-check all_prop_type" type="checkbox" id="all_prop_type" value="all" name="search_type[property_type][]">
                                                        <label for="all_prop_type">All</label>
                                                    </div>
                                                    @foreach($property_type as $prop_type)
                                                        <div class="icheck-input">
                                                            <input class="i-min-check except_all_prop" type="checkbox" id="minimal-checkbox-1" value="{{ $prop_type->id }}" name="search_type[property_type][]">
                                                            <label for="minimal-checkbox-1">{{ $prop_type->property_type }}</label>
                                                        </div>
                                                    @endforeach
                                                @elseif($search->search_slug == 'price_range')

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label"> Extreme Maximum Value</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="search_type[price_range][xmax]" id="xtreme_max" placeholder="Enter Zip Code" value="{{ 'hello' }}" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label"> Extreme Minimum Value</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="search_type[price_range][xmin]" id="xtreme_min" placeholder="Enter Zip Code" value="{{ 'hello' }}" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label"> Default Maximum value</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="search_type[price_range][dmax]" id="default_max" placeholder="Enter Zip Code" value="{{ 'hello' }}" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label"> Default Minimum value</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="search_type[price_range][dmin]" id="default_min" placeholder="Enter Zip Code" value="{{ 'hello' }}" class="form-control"/>
                                                        </div>
                                                    </div>

                                                @elseif($search->search_slug == 'location')

                                                    Dropdown of State and City are visible on the Frontend
                                                
                                                @elseif($search->search_slug == 'garage')
                                                    <label class="control-label" style="margin-bottom: 10px">These two type of input are visible at the frontend as filter for Garage (if enable). Set the default value...</label>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Garage required</label>
                                                        <div class="col-md-8">
                                                            {{-- <input type="text" name="" id="zip_code" placeholder="Enter Zip Code" class="form-control"/> --}}
                                                            <div class="icheck-input">
                                                                <input name="no_use[]" class="i-min-check" type="radio" id="overwrite-yes" value="1" checked >
                                                                <label for="overwrite-yes" style="margin-right: 15px"> <b>Yes </b>{{-- (i.e. previous images replace by new images) --}}</label>
                                                                <input name="no_use[]" class="i-min-check" type="radio" id="overwrite-no" value="2">
                                                                <label for="overwrite-no"> <b>No </b>{{-- (i.e keep both previous and new images) --}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">No of Cars</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control select2" name="no_use[]" id="seller_id" >
                                                                <option value="1"> 1 Car</option>
                                                                <option value="2"> 2 Car</option>
                                                                <option value="3"> 3 Car</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @elseif($search->search_slug == 'bedroom')
                                                    <label class="control-label" style="margin-bottom: 10px"> Create Options from 1 to "x" bedrooms :-</label>
                                                    {{-- <label style="width: 100%"> X : <input type="number" name="search_type[bedroom][]"></label> --}}
                                                    <div class="form-group">
                                                        <label class="col-md-1 control-label">X : </label>
                                                        <div class="col-md-4">
                                                            <input class="form-control" type="number" name="search_type[bedroom][]">
                                                        </div>
                                                    </div>
                                                    <label class="control-label" style="">Last option will be "more than x" bedrooms (created automatically)</label>
                                                @elseif($search->search_slug == 'pool')
                                                    <label class="control-label" style="margin-bottom: 10px">This input is visible at the frontend as filter for Pool (if enable). Set the default value...</label>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Pool required</label>
                                                        <div class="col-md-8">
                                                            {{-- <input type="text" name="" id="zip_code" placeholder="Enter Zip Code" class="form-control"/> --}}
                                                            <div class="icheck-input">
                                                                <input name="overwrite_prop_img" class="i-min-check" type="radio" id="overwrite-yes" value="1" checked>
                                                                <label for="overwrite-yes" style="margin-right: 15px"> <b>Yes </b>{{-- (i.e. previous images replace by new images) --}}</label>
                                                                <input name="overwrite_prop_img" class="i-min-check" type="radio" id="overwrite-no" value="2">
                                                                <label for="overwrite-no"> <b>No </b>{{-- (i.e keep both previous and new images) --}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">No of Cars</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control select2" name="seller_id" id="seller_id" >
                                                                <option value="1"> 1 Car</option>
                                                                <option value="2"> 2 Car</option>
                                                                <option value="3"> 3 Car</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}
                                                @elseif($search->search_slug == 'in_city')
                                                    <label class="control-label" style="margin-bottom: 10px">This input is visible at the frontend as filter. Set the default value...</label>
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">In City..?</label>
                                                        <div class="col-md-8">
                                                            {{-- <input type="text" name="" id="zip_code" placeholder="Enter Zip Code" class="form-control"/> --}}
                                                            <div class="icheck-input">
                                                                <input name="overwrite_prop_img" class="i-min-check" type="radio" id="overwrite-yes" value="1" checked>
                                                                <label for="overwrite-yes" style="margin-right: 15px"> <b>Yes </b>{{-- (i.e. previous images replace by new images) --}}</label>
                                                                <input name="overwrite_prop_img" class="i-min-check" type="radio" id="overwrite-no" value="2">
                                                                <label for="overwrite-no"> <b>No </b>{{-- (i.e keep both previous and new images) --}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($search->search_slug == 'nearest_school')
                                                    <label class="control-label" style="margin-bottom: 20px">Create the Option like "Within 'x' km " or multiple option, seperated it by comma(,) like "5,10,15,20".</label>
                                                    <div class="form-group">
                                                        <label class="col-md-1 control-label">X : </label>
                                                        <div class="col-md-4">
                                                            <input class="form-control" type="number" name="search_type[bedroom][]" placeholder="e.g.  5,10,15,20">
                                                        </div>
                                                    </div>
                                                @elseif($search->search_slug == 'nearest_market')
                                                    <label class="control-label" style="margin-bottom: 20px">Create the Option like "Within 'x' km " or multiple option, seperated it by comma(,) like "5,10,15,20".</label>
                                                    <div class="form-group">
                                                        <label class="col-md-1 control-label">X : </label>
                                                        <div class="col-md-4">
                                                            <input class="form-control" type="number" name="search_type[bedroom][]" placeholder="e.g.  5,10,15,20">
                                                        </div>
                                                    </div>
                                                @elseif($search->search_slug == 'nearest_hostipal')
                                                    <label class="control-label" style="margin-bottom: 20px">Create the Option like "Within 'x' km " or multiple option, seperated it by comma(,) like "5,10,15,20".</label>
                                                    <div class="form-group">
                                                        <label class="col-md-1 control-label">X : </label>
                                                        <div class="col-md-4">
                                                            <input class="form-control" type="number" name="search_type[bedroom][]" placeholder="e.g.  5,10,15,20">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <input type="submit" class="btn btn-primary" name="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
	<script src="{{ asset('backend/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('backend/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			// alert("hello");

            /*$('#search-form #client_name').select2({
                placeholder: 'Select Client'
            });*/

            $("input[name='search_type[property_type][]']").change(function(){
                alert('hello');
            });

            $('#search-form #date_range').daterangepicker({
                
                timePicker: true,
                timePicker12Hour: false,
                timePickerIncrement: 1,
                ranges: {
                  'Today': [moment().startOf('days'), moment()],
                  'Yesterday': [moment().subtract(1, 'days').startOf('days'), moment().subtract(1, 'days').endOf('days')],
                  'Last 7 Days': [moment().subtract(6, 'days').startOf('days'), moment()],
                  'Last 30 Days': [moment().subtract(29, 'days').startOf('days'), moment()],
                  'This Month': [moment().startOf('month').startOf('days'), moment()],
                  'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                format: 'YYYY-MM-DD HH:mm:ss',
                startDate: moment().subtract(29, 'days'),
                endDate: moment() }, function (start, end) {
                    $('#search-form #date_range').val(start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss'));
                }
            );

            oTable = $('#datatable_sellers').DataTable({
                processing: true,
                serverSide: true,
                "order": [ 4, 'desc' ],
                headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                ajax:{
                  url: '{{ URL("admin/seller/fetch_sellers") }}',
                  data: function(d){
                        // d.client = $('#search-form select[name=client_name]').val();
                        // d.address = $('#search-form select[name=address]').val();
                        d.date_range = $('#search-form input[name=date_range]').val();
                    }
                },
                columns: [
                    {data: 'profile_pic', name: 'profile_pic'},
                    {data: 'seller_name', name: 'seller_name'},
                    {data: 'address', name: 'address'},
                    {data: 'email', name: 'email'},
                    // {data: 'address', name: 'address'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $('#search-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });

            // date range filter
            $(document).on('keyup change', '#search-form #date_range', function(){
                $('#search-form .search_submit').click();
            }); 

            // clear the filters
            $(document).on('click', '.clear_content', function(){
                // $('#search-form #project_name').select2('val', '');
                // $('#search-form #category_list').select2('val', '');
                $('#search-form #date_range').val('');
                $('#search-form .search_submit').click();
            });

            // to redirect to the edit page
            $(document).on('click','.edit',function(){
                // show_mask();
                var id = $(this).attr('id');
                var value = id.split('-');
                var seller_unique_id = value['1'];
                window.location.href = "{{ URL('admin/seller/edit') }}/"+seller_unique_id;
            });

            // to redirect to the edit page
            $(document).on('click','.view',function(){
                // show_mask();
                var id = $(this).attr('id');
                var value = id.split('-');
                var seller_unique_id = value['1'];
                window.location.href = "{{ URL('admin/seller/view') }}/"+seller_unique_id;
            });

            $(document).on('click', '.delete', function(){
                // show_mask();
                var id = $(this).attr('id');
                var value = id.split('-');
                seller_id = value['1'];
                swal({
                    title: 'Are you sure..?',
                    text: "Do you really want to delete this seller..?",
                    type: 'warning',
                    showCancelButton: true,
                }, function(){
                    if(seller_id != '')
                    {
                        $.ajax({
                            url: '{{ url('admin/seller/delete') }}',
                            type: 'POST',
                            headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                            data: {
                                seller_id: seller_id
                            },
                            success: function(response){
                                var resp = $.parseJSON(response);
                                if(resp.status == 1)
                                {
                                    swal({
                                        title: 'Deleted..!',
                                        text: "Seller deleted successfully.",
                                        type: 'success',
                                    }, function(){
                                        oTable.draw();
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
		});
	</script>
	
@endsection