<!DOCTYPE html>
<html lang="en"
    class="wf-flaticon-n4-inactive wf-fontawesome5solid-n4-active wf-fontawesome5regular-n4-active wf-fontawesome5brands-n4-active wf-simplelineicons-n4-active wf-lato-n3-active wf-lato-n4-active wf-lato-n7-active wf-lato-n9-active wf-active">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HAU Digital Library</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="{{ asset('site/images/icon.ico') }}" type="image/x-icon">

    <!-- Fonts and icons -->
    <script src="{{ asset('site/') }}/js/plugin/webfont/webfont.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
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
    <link rel="stylesheet" href="{{ asset('site/css/atlantis2.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="main-header" data-background-color="light-blue2">
            <div class="nav-top">
                <div class="container d-flex flex-row">
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <!-- Logo Header -->
                    <a href="{{ route('site.index') }}" class="logo d-flex align-items-center">
                        <img src="{{ asset('site/images/Logo.png') }}" alt="navbar brand" class="navbar-brand">
                    </a>
                    <!-- End Logo Header -->

                    <!-- Navbar Header -->
                    <nav class="navbar navbar-header navbar-expand-lg p-0">

                        <div class="container-fluid p-0">
                            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                                @if (Auth::check())
                                    <li class="nav-item">
                                        <div style="color:white; padding-right:10px">Hello! {{ Auth::user()->name }}
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown hidden-caret">
                                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                            aria-expanded="false">
                                            <div class="avatar-sm">
                                                <img src="{{ asset('site/images/profile.jpg') }}" alt="..."
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                                            <div class="dropdown-user-scroll scrollbar-outer"
                                                style="position: relative;">
                                                <div class="dropdown-user-scroll scrollbar-outer scroll-content"
                                                    style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 274.828px;">
                                                    <li>
                                                        <div class="user-box">
                                                            <div class="avatar-lg"><img
                                                                    src="{{ asset('site/images/profile.jpg') }}"
                                                                    alt="image profile" class="avatar-img rounded">
                                                            </div>
                                                            <div class="u-text">
                                                                <h4>{{ Auth::user()->name }}</h4>
                                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{ route('site.profile') }}">My
                                                            Profile</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('password.confirm') }}">Change Password</a>
                                                        <div class="dropdown-divider"></div>
                                                        <div>
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="scroll-element scroll-x" style="">
                                                    <div class="scroll-element_outer">
                                                        <div class="scroll-element_size"></div>
                                                        <div class="scroll-element_track"></div>
                                                        <div class="scroll-bar ui-draggable ui-draggable-handle"
                                                            style="width: 100px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fas fa-sign-in-alt"></i>
                                            <span style="font-size: 16px;padding-left:10px">Login</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="nav-bottom bg-white">
                <div class="container d-flex flex-row">
                    <ul class="nav page-navigation page-navigation-secondary">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.index') }}">
                                <i class="link-icon fas fa-home"></i>
                                <span class="menu-title">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.category') }}">
                                <i class="link-icon icon-grid"></i>
                                <span class="menu-title">Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.search') }}">
                                <i class="link-icon fa fa-search"></i>
                                <span class="menu-title">Search</span>
                            </a>
                        </li>
                        @if (Auth::check())
                            @can('documents-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('site.document.upload') }}">
                                        <i class="link-icon fa fa-upload"></i>
                                        <span class="menu-title">Upload</span>
                                    </a>
                                </li>
                            @endcan
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    Khoa Công nghệ thông tin - Đại học Kiến trúc Hà nội
                </nav>
                <div class="copyright ml-auto">
                    <?php echo 'Today: ' . date('d/m/Y  ') . '|| Time: ' . date('h:i:s a'); ?>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('site/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('site/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('site/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('site/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>


    <!-- Atlantis JS -->
    <script src="{{ asset('site/js/atlantis2.min.js') }}"></script>
    @yield('css')
    @yield('js')

</body>

</html>
