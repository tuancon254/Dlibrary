<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>HDL - HAU Digital Library</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('site/images/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('site/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('site/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('site/css/atlantis.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('site/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/image.css') }}">
</head>

<body>
    <div class="wrapper">
        @yield('contents')
    </div>




    <!--   Core JS Files   -->
    <script src="{{ asset('site/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('site/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('site/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('site/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('site/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('site/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('site/js/atlantis.min.js') }}"></script>
    <script src="{{ asset('site/js/uploadImage.js') }}"></script>
    <script src="{{ asset('site/js/livesearch.js') }}"></script>
    @yield('js')
    @yield('css')
</body>

</html>
