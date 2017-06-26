@extends('backend.layouts.master')

@section('custom_style')

{{-- <link rel="stylesheet" href="{{ asset('backend/datatables/jquery.dataTables.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('backend/datatables/dataTables.bootstrap.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('backend/css/all-css/dataTables.responsive.css') }}"> --}}
<style type="text/css">
    
    .table-responsive{
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
    }
</style>

@endsection

@section('main_content')

	<div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-7">
                <div class="page-breadcrumb-wrap">
                    <div class="page-breadcrumb-info">
                        <h2 class="breadcrumb-titles">Surveyor <small>List all Surveyors </small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page"> Surveyor List</li>
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
                    <h4>List of All Surveyor</h4>
                    <a href="{{ url('admin/surveyor/create') }}" class="btn btn-primary add_btn"> Add Surveyor </a>
                </div>
                <div class="widget-container">
                    <div class=" widget-block">
                        <div class="panel panel-default" style="margin-bottom: 10px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Custom Filter</h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" id="search-form" class="form-inline" role="form">
                                    {{-- <div class="form-group col-md-3 col-sm-4 col-xs-12" style="padding: 0px 5px;">
                                        <label for="client_name">Realtor</label>
                                        <select name="client_name" id="client_name" class="form-control" style="width: 100%;">
                                            <option value=''></option>
                                            @if(isset($clients) && !empty($clients))
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->name }}">{{ ucwords($client->name) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-4 col-xs-12" style="padding: 0px 5px;">
                                        <label for="address">Address</label>
                                        <select name="address" id="address" class="form-control" style="width: 100%;">
                                            <option value=''></option>
                                            @if(isset($addresses) && !empty($addresses))
                                                @foreach($addresses as $address)
                                                    <option value="{{ $address->address }}">{{ ucwords($address->address) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12" style="padding:0px 5px;">
                                        <label>Date-time range:</label>
                                        <div class="input-group" style="width: 100%;">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" id="date_range" name="date_range" style="width: 100%;" placeholder="Select Date Range">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="padding: 0px 5px;">
                                        <button type="submit" class="btn btn-primary search_submit" style="display: none;">Search</button>
                                        <button type="button" class="btn btn-danger clear_content">Clear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-widget widget-module">
                <div class="widget-container">
                    <div class=" widget-block">
                        <div class="table-responsive">
                            <table id="datatable_surveyor" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Profile Pic</th>
                                    <th>Surveyor Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    {{-- <th>Address</th> --}}
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
	<script src="{{ asset('backend/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('backend/js/moment.js') }}"></script>
    <script src="{{ asset('backend/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/dataTables.bootstrap.min.js') }}"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			// alert("hello");

            /*$('#search-form #client_name').select2({
                placeholder: 'Select Client'
            });

            $('#search-form #address').select2({
                placeholder: 'Select Address'
            });*/

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

            oTable = $('#datatable_surveyor').DataTable({
                processing: true,
                serverSide: true,
                "order": [ 5, 'desc' ],
                headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                ajax:{
                  url: '{{ URL("admin/surveyor/fetch_surveyor") }}',
                  data: function(d){
                        // d.client = $('#search-form select[name=client_name]').val();
                        // d.address = $('#search-form select[name=address]').val();
                        d.date_range = $('#search-form input[name=date_range]').val();
                    }
                },
                columns: [
                    {data: 'profile_pic', name: 'profile_pic'},
                    {data: 'surveyor_name', name: 'surveyor_name'},
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
                var surveyor_unique_id = value['1'];
                window.location.href = "{{ URL('admin/surveyor/edit') }}/"+surveyor_unique_id;
            });

            // to redirect to the edit page
            $(document).on('click','.view',function(){
                // show_mask();
                var id = $(this).attr('id');
                var value = id.split('-');
                var surveyor_unique_id = value['1'];
                window.location.href = "{{ URL('admin/surveyor/view') }}/"+surveyor_unique_id;
            });

            $(document).on('click', '.delete', function(){
                // show_mask();
                var id = $(this).attr('id');
                var value = id.split('-');
                surveyor_id = value['1'];
                swal({
                    title: 'Are you sure..?',
                    text: "Do you really want to delete this surveyor..?",
                    type: 'warning',
                    showCancelButton: true,
                }, function(){
                    if(surveyor_id != '')
                    {
                        $.ajax({
                            url: '{{ url('admin/surveyor/delete') }}',
                            type: 'POST',
                            headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
                            data: {
                                surveyor_id: surveyor_id
                            },
                            success: function(response){
                                var resp = $.parseJSON(response);
                                if(resp.status == 1)
                                {
                                    swal({
                                        title: 'Deleted..!',
                                        text: "Surveyor deleted successfully.",
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