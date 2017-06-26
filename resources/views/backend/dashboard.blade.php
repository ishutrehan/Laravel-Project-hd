@extends('backend.layouts.master')

@section('custom_style')

<style type="text/css">
    .logo-text, .logo-text:hover
    {
        font-size: 35px;
        padding: 6px 6px 3px 6px;
        text-decoration: none;
        color: #000000;
        /* font-weight: bold; */
        font-family: 'times new roman';
    }

    .large-logo-text, .large-logo-text:hover
    {
        font-size: 40px;
        padding: 10px 30px 6px 30px !important;
        text-decoration: none;
        font-family: 'times new roman';
        color: #000000;
    }
</style>

@endsection

@section('main_content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-7">
                <div class="page-breadcrumb-wrap">

                    <div class="page-breadcrumb-info">
                        <h2 class="breadcrumb-titles">Dashboard <small>Admin Backend</small></h2>
                        <ul class="list-page-breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active-page"> Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap number-rotate">
                <span class="stat-w-title">Buyers Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-cart-plus"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="330" data-animation-duration="1500">0</span>
                    <span class="w-meta-title">New Buyers</span>
                    <span class="w-previos-stat">Last Day : 21</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Viewed Mortgage Agent</span>
                <a href="#" class="ico-cirlce-widget w_bg_grey">
                    <span><i class="ico-users"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="127" data-animation-duration="1500">0</span>
                    <span class="w-meta-title">New Mortgage Agent</span>
                    <span class="w-previos-stat">Last Day : 110</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Properties Viewed Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_blue_grey">
                    <span><i class="fa fa-dollar"></i></span>
                </a>
                <div class="w-meta-info w-currency">
                    <span class="w-meta-value number-animate" data-value="6127" data-animation-duration="1500">0</span>
                    <span class="w-meta-title">New Properties</span>
                    <span class="w-previos-stat">Last Day : 158</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Visitors Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_green">
                    <span><i class="ico-chart"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="20000" data-animation-duration="1500">0</span>
                    <span class="w-meta-title">New Visitors</span>
                    <span class="w-previos-stat">Last Day : 14,000</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="w-info-graph">
                <div class="row">
                    <div class="col-md-7">
                        <div class="w-info-chart">
                            <div class="w-info-chart-header">
                                <h2>Earning Graph</h2>
                                <p>
                                    This is a income chart for the Matmix products
                                </p>
                            </div>
                            <div class="mini-chart-list">
                                <ul>
                                    <li>
                                        <span class="epie-chart" data-percent="69" data-barcolor="#00acc1" data-tcolor="#e0e0e0" data-scalecolor="#e0e0e0" data-linecap="round" data-linewidth="5" data-size="120" data-animate="2000"><span class="percent"></span></span>
                                        <span class="chart-sub-title">Visit</span>
                                    </li>
                                   <li>
                                        <span class="epie-chart" data-percent="25" data-barcolor="#ffb74d" data-tcolor="#e0e0e0" data-scalecolor="#e0e0e0" data-linecap="round" data-linewidth="5" data-size="120" data-animate="2000"><span class="percent"></span></span>
                                        <span class="chart-sub-title">Members</span>
                                    </li>
                                   <li>
                                        <span class="epie-chart" data-percent="45" data-barcolor="#4caf50" data-tcolor="#e0e0e0" data-scalecolor="#e0e0e0" data-linecap="round" data-linewidth="5" data-size="120" data-animate="2000">
                                            <span class="percent"></span>
                                        </span>
                                        <span class="chart-sub-title">Sales</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chart-container">
                                <div id="ocean-flot">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="w-info-chart-meta">
                            <h2>Alltime Earning</h2>
                            <span class="info-meta-value">$90,808</span>
                            <div id="ocean-flot-legend">

                            </div>
                            <span class="w-meta-title">Traffic Source</span>
                            <div class="progress-wrap">
                                <div class="clearfix progress-meta">
                                    <span class="pull-left progress-label">google.com</span><span class="pull-right progress-percent label label-info"></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" data-progress="40">
                                    </div>
                                </div>
                            </div>
                            <div class="progress-wrap">
                                <div class="clearfix progress-meta">
                                    <span class="pull-left progress-label">yahoo.com</span><span class="pull-right progress-percent label label-danger"></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" data-progress="25">
                                    </div>
                                </div>
                            </div>
                            <div class="progress-wrap">
                                <div class="clearfix progress-meta">
                                    <span class="pull-left progress-label">jaman.me</span><span class="pull-right progress-percent label label-primary"></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" data-progress="20">
                                    </div>
                                </div>
                            </div>
                            <div class="progress-wrap">
                                <div class="clearfix progress-meta">
                                    <span class="pull-left progress-label">envato.com</span><span class="pull-right progress-percent label label-success"></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-progress="10">
                                    </div>
                                </div>
                            </div>
                            <div class="progress-wrap">
                                <div class="clearfix progress-meta">
                                    <span class="pull-left progress-label">Others</span><span class="pull-right progress-percent label label-warning"></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" data-progress="5">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="box-widget widget-module">
                <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-cart-arrow-down"></i></span>
                    <h4>Order Received</h4>
                    <ul class="widget-action-bar pull-right">
                        <li><span class="waves-effect w-reload"><i class="fa fa-spinner"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="widget-container">
                    <div class="table-responsive">
                        <table class="table w-order-list table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Order ID
                                    </th>
                                    <th>
                                        Titile
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#">#36542</a>
                                    </td>
                                    <td>
                                        Gold
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        $50/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">#38544</a>
                                    </td>
                                    <td>
                                        Silver
                                    </td>
                                    <td>
                                        <span class="label label-success">Confirmed</span>
                                    </td>
                                    <td>
                                        $20/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#"> #39545</a>
                                    </td>
                                    <td>
                                        <span>Platinum</span>
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        $80/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#"> #39548</a>
                                    </td>
                                    <td>
                                        <span>Platinum</span>
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        $80/m
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#"> #39550</a>
                                    </td>
                                    <td>
                                        <span>Platinum</span>
                                    </td>
                                    <td>
                                        <span class="label label-danger">canceled</span>
                                    </td>
                                    <td>
                                        $80/m
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box-widget widget-module">
                <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-users"></i></span>
                    <h4>New Users</h4>
                    <ul class="widget-action-bar pull-right">
                        <li><span class="waves-effect w-reload"><i class="fa fa-spinner"></i></span>
                        </li>
                        <li><span class="widget-remove waves-effect w-remove"><i class="ico-cross"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="widget-container">
                    <div class="w-user-widget">
                        <div class="w-user-list">
                            <div class="w-user-list-item">
                                <div class="w-user-thumbnail">
                                    <a href="#"><img src="backend/images/avatar/allisongrayce.jpg" alt="user">
                                    </a>
                                </div>
                                <div class="w-user-info">
                                    <ul>
                                        <li>Name:<span><a href="#">Jean J. Thomas <span class="label label-default">Free</span></a></span>
                                        </li>
                                        <li>Date: <span>18th June 2015</span>
                                        </li>
                                        <li>Package: <span>Basic</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="w-user-action">
                                    <a href="#" data-tooltip="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="#" data-tooltip="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="w-user-list-item">
                                <div class="w-user-thumbnail">
                                    <a href="#"><img src="backend/images/avatar/bobbyjkane.jpg" alt="user">
                                    </a>
                                </div>
                                <div class="w-user-info">
                                    <ul>
                                        <li>Name:<span><a href="#">Michael H. Russell <span class="label label-default">Free</span></a></span>
                                        </li>
                                        <li>Date: <span>18th June 2015</span>
                                        </li>
                                        <li>Package: <span>Basic</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="w-user-action">
                                    <a href="#" data-tooltip="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="#" data-tooltip="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="w-user-list-item">
                                <div class="w-user-thumbnail">
                                    <a href="#"><img src="backend/images/avatar/coreyweb.jpg" alt="user">
                                    </a>
                                </div>
                                <div class="w-user-info">
                                    <ul>
                                        <li>Name:<span><a href="#">Tyler B. Falcon <span class="label label-success">Paid</span></a></span>
                                        </li>
                                        <li>Date: <span>18th June 2015</span>
                                        </li>
                                        <li>Package: <span>Gold</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="w-user-action">
                                    <a href="#" data-tooltip="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="#" data-tooltip="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="box-widget widget-module">
                <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-list"></i></span>
                    <h4>Activities</h4>
                    <ul class="widget-action-bar pull-right">
                        <li><span class="waves-effect w-reload"><i class="fa fa-spinner"></i></span>
                        </li>
                        <li><span class="widget-remove waves-effect w-remove"><i class="ico-cross"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="widget-container">
                    <div class="activities-timeline">
                        <ul class="activities-list">
                            <li>
                                <div class="activities-badge">
                                    <span></span>
                                </div>
                                <div class="activities-details">
                                    <h3 class="activities-header"><a href="#">10 Tickets Resolved</a></h3>
                                    <div class="activities-meta"><i class="fa fa-clock-o"></i> 30 min ago </div>
                                    <p>All are resolved</p>
                                </div>
                            </li>
                            <li>
                                <div class="activities-badge">
                                    <span></span>
                                </div>
                                <div class="activities-details">
                                    <h3 class="activities-header"><a href="#">New Files Added</a></h3>
                                    <div class="activities-meta"><i class="fa fa-clock-o"></i> 1 hour ago </div>
                                    <p>Check following files: </p>
                                    <div class="attachement-list">
                                        <ul>
                                            <li>
                                                <div class="attachment-thumb">
                                                    <a href="#"><i class="fa fa-file-pdf-o"></i></a>
                                                </div>
                                                <div class="attachment-info">
                                                    <div class="attachment-file-name">
                                                        01-wireframe-sample.pdf
                                                    </div>
                                                    <div class="attachment-action-bar">
                                                        <span class="list-file-download"><a href="#"><i class="fa fa-download"></i> Download</a></span><span class="list-file-del"><a href="#"><i class="fa fa-trash"></i> Delete</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="activities-badge">
                                    <span></span>
                                </div>
                                <div class="activities-details">
                                    <h3 class="activities-header"><a href="#">New Post Added</a> </h3>
                                    <div class="activities-meta"><i class="fa fa-clock-o"></i> July 22 at 1:12pm  </div>
                                    <p>Donec porta, elit vestibulum vulputate bibendum, sem felis varius quam, eget placerat neque diam quis tortor. Suspendisse eu posuere nunc. Aliquam erat volutpat. Duis quis elit felis.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="activities-load">
                        <a class="load-more" href="#">Load More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box-widget widget-module">
                <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-tasks"></i></span>
                    <h4>To Do</h4>
                    <ul class="widget-action-bar pull-right">
                        <li><span class="waves-effect w-reload"><i class="fa fa-spinner"></i></span>
                        </li>
                        <li><span class="widget-remove waves-effect w-remove"><i class="ico-cross"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="widget-container">
                    <div class="todo-list">
                        <div class="todo-list-item">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Send payments to all sellers </h4>
                                    <div class="todo-date">
                                        <label class="label label-info"> New</label>
                                        <label class="label label-warning"> High</label>
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="todo-list-item">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Fix jQuery $noConflict issue </h4>
                                    <div class="todo-date">
                                        <label class="label label-info"> New</label>
                                        <label class="label label-default"> low</label>
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="todo-list-item">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Fix all database errors </h4>
                                    <div class="todo-date">
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="todo-list-item">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Create a backup sever </h4>
                                    <div class="todo-date">
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="todo-list-item">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Add a offloaded mysql to users </h4>
                                    <div class="todo-date">
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="todo-list-item todo-completed">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Setup git on new VPS </h4>
                                    <div class="todo-date">
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                        <div class="todo-complete-date">
                                            <i class="fa fa-calendar-o"></i>Completed By: Jun 18 at 11:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="todo-list-item todo-due">
                            <div class="todo-list-action">
                                <input type="checkbox" name="todo-select" class="todo-select">
                            </div>
                            <div class="todo-list-details">
                                <div class="todo-intro">
                                    <h4>Check load balancer</h4>
                                    <div class="todo-date">
                                        <label class="label label-danger"> Past Due</label>
                                        <label class="label label-warning"> High</label>
                                        <div class="todo-due-date">
                                            <i class="fa fa-clock-o"></i>Due By: Jun 16 at 12:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="todo-load">
                        <a class="load-more" href="#">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_script')

@endsection