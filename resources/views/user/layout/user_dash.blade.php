
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>User Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="light">
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="#">
                    <img src="../../assets/images/logo.png" alt="" />
                    <span class="logo-name text-center">CiscoPhone</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->
                    @php
                        $id = Auth::user()->id;
                        $profileData = App\Models\User::find($id);
                    @endphp
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                            role="button">
                            <img src="{{ (!empty($profileData->photo)) ?
                                url('/'.$profileData->photo)
                                :url('uploads/logo.jpg') }}" width="32" height="32" alt="User">
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout')}}">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- #END# Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class=" image">
                                <img src="{{ (!empty($profileData->photo)) ?
                                    url('/'.$profileData->photo)
                                    :url('uploads/logo.jpg') }}" class="img-circle user-img-circle"
                                    alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> {{ $profileData->email}} </div>
                            <div class="profile-usertitle-job "> {{ $profileData->name}} </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('user.home') }}">
                            <i class="fa fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Get.Cisco')}}">
                            <i class="fa fa-phone"></i>
                            <span>CiscoPhone</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('show.province')}}">
                            <i class="fa fa-map-marker"></i>
                            <span>Province</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </div>
    <section class="content">
        @yield('content')
    </section>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/admin.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
</body>
</html>
