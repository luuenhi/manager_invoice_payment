<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Quản Lý Hóa Đơn Thị Nhi')</title>

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="{{ asset('frontend/images/cr7.jpg') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('admins/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Open+Sans:300,400,600,700"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['{{ asset('admins/css/fonts.css') }}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admins/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/css/azzara.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('admins/css/demo.css') }}">
    @yield('inline_css')
</head>
<body>
<div class="wrapper">
    <!--
        Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
    -->
    <div class="main-header" data-background-color="dark">
        <!-- Logo Header -->
    @include('layouts.logo_header')
    <!-- End Logo Header -->

        <!-- Navbar Header -->
    @include('layouts.navbar')
    <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
        @yield('breadcrumb')
        @yield('content')
        @yield('alert')
        <div>
            @include('flash::message')
        </div>
        @include('layouts.footer')
    </div>
    <!-- Custom admin | don't include it in your project! -->
    @include('layouts.custom_template')
    <!-- End Custom admin -->
</div>

<!--   Core JS Files   -->
<script src="{{ asset('admins/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('admins/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admins/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('admins/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admins/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('admins/js/plugin/moment/moment.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('admins/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('admins/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('admins/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Bootstrap Toggle -->
<script src="{{ asset('admins/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('admins/js/plugin/dropzone/dropzone.min.js') }}"></script>

<!-- Fullcalendar -->
<script src="{{ asset('admins/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('admins/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- DateTimePicker -->
<script src="{{ asset('admins/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{ asset('admins/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Wizard -->
<script src="{{ asset('admins/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>

<!-- jQuery Validation -->
<script src="{{ asset('admins/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('admins/js/plugin/summernote/summernote-bs4.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('admins/js/plugin/select2/select2.full.min.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('admins/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Azzara JS -->
<script src="{{ asset('admins/js/ready.min.js') }}"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="{{ asset('admins/js/setting-demo.js') }}"></script>

@yield('inline_scripts')
</body>
</html>
