<html>
    <head>
        <title>App Name - @yield('title')</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="manifest" href="{{asset('manifest.json')}}" />

        <!-- CSS Files -->
        <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            .product__image {
                width: 150px;
                height: auto;
            }
            .fileinput-new .img-rounded,
            .fileinput-preview.fileinput-exists.img-rounded img {
                min-width: 200px;
                max-width: 500px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper ">
            @section('sidebar')
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="">
              <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                Tip 2: you can also add an image using data-image tag
            -->
              <div class="logo">
                <a href="https://github.com/railsgem" class="simple-text logo-normal">
                  Product Management
                </a>
              </div>
              <div class="sidebar-wrapper">
                <ul class="nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="/products">
                      <i class="material-icons">dashboard</i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                </ul>
              </div>
            <div class="sidebar-background" style=""></div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                {{-- <a class="navbar-brand" href="#pablo">Product List</a> --}}
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
            </nav>
            <!-- End Navbar -->
            @show

            <div class="content">
                {{-- Start Notification --}}
                @if (\Session::has('message'))
                    <input class="info-bar" type="hidden" id="success_message" value="{{Session::get('message')}}"/>
                @endif
                @if (\Session::has('error'))
                    <input class="info-bar" type="hidden" id="error_message" value="{{Session::get('error')}}"/>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <input class="info-bar" type="hidden" id="error_message" value="{{ $error }}"/>
                        <!-- <div class="info-bar1">{{ $error }}</div> -->
                    @endforeach
                @endif
                {{-- End Notification --}}
                @yield('content')
            </div>
            <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                <ul>

                </ul>
                </nav>
                <div class="copyright float-right">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://github.com/railsgem" target="_blank">Railsgem</a> for a better web.
                </div>
            </div>
            </footer>
        </div>
          </div>
    </body>
     <!--   Core JS Files   -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('js/plugins/sweetalert2.js') }}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('js/plugins/jquery.validate.min.js') }}"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ asset('js/plugins/jquery-jvectormap.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js') }}"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('js/plugins/arrive.min.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-dashboard.min.js?v=2.1.1" type="text/javascript') }}"></script>
    <script src="{{asset('/js/vendor_app.js')}}') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/vendor_app.js
        vendor_app.showSuccessNotification();
        vendor_app.showErrorNotification();
    });
    </script>
</html>
