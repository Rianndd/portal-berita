<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('back/assets/img/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('back/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('back/assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('back/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('back/assets/css/demo.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        @include('includes.header')
        <!-- End Header -->
        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">

                @yield('content')
                
            </div>
            <!-- Footer -->
            @include('includes.footer')
            <!-- End Footer -->
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('includes.js')
</body>
</html>
