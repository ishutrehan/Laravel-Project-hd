<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Houz Dealz">
    <meta name="author" content="Houz Dealz">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Houz Dealz</title>
    <style type="text/css">
        .add_btn, .back_btn_head
        {
            margin-top: 8px;
            margin-right: 8px;
            float: right;
        }

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
    @include('backend.elements.styles')

    @yield('custom_style')

</head>
<body>
    <div class="page-container iconic-view">
    <!--Leftbar Start Here -->

    @include('backend.elements.left_sidebar_nav')

        <div class="page-content">
        <!--Topbar Start Here -->
        <header class="top-bar"{{--  style="margin-top: -20px" --}}>

            @include('backend.elements.top_navigation')

        </header>
        <div class="main-container">
            <div class="container-fluid">

                @yield('main_content')

            </div>
        </div>

        <!--Footer Start Here -->

        @include('backend.elements.footer')

    </div>
</div>

<!--Rightbar Start Here -->

@include('backend.elements.right_sidebar_nav')

@yield('custom_modal')
<!-- All scripts Here -->

@include('backend.elements.scripts')

<!-- Custom Script Here -->

@yield('custom_script')

</body>
</html>