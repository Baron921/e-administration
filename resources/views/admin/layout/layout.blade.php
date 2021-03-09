<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/blize/source/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 18:09:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>e-administration</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets/images/favicon1.ico')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->

    <link href="{{asset('assets/css/bootstrap-multiselect.css')}}" rel="stylesheet">

    <link href="{{asset('assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css')}}" rel="stylesheet"/>
    <!-- Multi Select Css -->
    
    <!-- Plugins Core Css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/form.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/Style.css')}}" rel="stylesheet"/>

    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/css/styles/all-themes.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/mystyle.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/fontAwesome.css')}}" rel="stylesheet"/>


</head>

<body class="light">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            <img class="loading-img-spin" src="{{asset('assets/images/loading.png')}}" alt="admin">
        </div>
        <p>Patientez ...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/images/logo.png')}}" alt=""/>
                <span class="logo-name"> <strong> e-administration </strong> </span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" onClick="return false;" class="sidemenu-collapse">
                        <i data-feather="align-justify"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="#" class="fullscreen-btn">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
                <!-- #END# Full Screen Button -->
                <!-- #START# Notifications-->
                <li class="dropdown">
                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                       role="button">
                        <i data-feather="bell"></i>
                        <span class="notify"></span>
                        <span class="heartbeat"></span>
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user1.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">Sarah Smith</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user2.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">Airi Satou</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user3.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">John Doe</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user4.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">Ashton Cox</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user5.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">Cara Stevens</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user6.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">Charde Marshall</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{asset('assets/images/user/user7.jpg')}}" alt="">
                                            </span>
                                        <span class="menu-info">
                                                <span class="menu-title">John Doe</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#" onClick="return false;">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications-->
                <li class="dropdown user_profile">
                    <div class="chip dropdown-toggle" data-toggle="dropdown">
                        <img src="/uploads/Institutions/{{Auth::user()->logo}}" alt="Contact Person">
                        {{Auth::user()->nom}}
                    </div>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                                <li>
                                    <a href="{{route('user.profile')}}">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.help')}}">
                                        <i class="material-icons">help</i>Aide
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">power_settings_new</i> {{ __('Déconnexion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="user_profile">
                    <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                        <i data-feather="settings"></i>
                    </a>
                </li>
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
                <li class="header">-- Menu</li>
                <li class="active">
                    <a href="{{route('home')}}">
                        <i data-feather="home"></i>
                        <span>Accueil</span>
                    </a>
                </li>

                @if(Auth::user()->role == 'superAdmin')

                    <li class="" id="categorie">
                        <a href="{{route('categorie.index')}}">
                            {{--<a href="{{route('produits.index')}}" data-url="{{route('produits.index')}}" id="allCategorie">--}}
                            <i data-feather="grid"></i>
                            <span> Catégories </span>
                        </a>
                    </li>

                    <li id="">
                        <a href="{{route('institution.index')}}">
                            <i data-feather="users"></i>
                            <span> Institutions </span>
                        </a>
                    </li>

                    <li id="">
                        <a href="{{route('piece.index')}}" class="">
                            <i data-feather="list"></i>
                            <span> Pièces </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('type.index')}}" class="" data-id="#">
                            <i data-feather="sliders"></i>
                            <span> Type </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('operation.index')}}" class="">
                            <i data-feather="server"></i>
                            <span> Opérations </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('aPropos.about')}}" class="">
                            <i data-feather="alert-circle"></i>
                            <span>A Propos</span>
                        </a>
                    </li>

                @elseif(Auth::user()->role == 'admin')

                    <li id="">
                        <a href="{{route('piece.index')}}" class="">
                            <i data-feather="mail"></i>
                            <span> Pièces </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('type.index')}}" class="" data-id="#">
                            <i data-feather="mail"></i>
                            <span> Type </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('operation.index')}}" class="" data-id="#">
                            <i data-feather="mail"></i>
                            <span> Opérations </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('aPropos.about')}}" class="">
                            <i data-feather="alert-circle"></i>
                            <span>A Propos</span>
                        </a>
                    </li>

                @endif

            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <div class="align-right right-sidebar-close">
            <i data-feather="x"></i>
        </div>
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-toggle="tab" class="active"> HABILLAGES  </a>
            </li>
            <li role="presentation">
                <a href="#settings" data-toggle="tab"> PARAMÈTRES </a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">
                    <div class="rightSetting">
                        <p> PARAMÈTRES GÉNÉRALS </p>
                        <ul class="setting-list list-unstyled m-t-20">
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Save
                                            History
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Auto
                                            Submit Issue
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status To All
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p> COULEUR MENU </p>
                        <button type="button"
                                class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Blanc
                        </button>
                        <button type="button"
                                class="btn btn-sidebar-dark btn-primary btn-border-radius p-l-20 p-r-20">Noir
                        </button>
                    </div>
                    <div class="rightSetting">
                        <p> COULEUR PAGE </p>
                        <button type="button"
                                class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">Blanc
                        </button>
                        <button type="button"
                                class="btn btn-theme-dark btn-primary btn-border-radius p-l-20 p-r-20">Noir
                        </button>
                    </div>
                    <div class="rightSetting">
                        <p> COULEUR BANNIÈRE </p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black" class="actived">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting m-b-25">
                        <p> Service créé </p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar"
                                     aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                    <p> {{ round(($userOperation * 100) / $nbreOperation) }}% progression</p>
                                </span>
                        </div>
                    </div>
                    {{--<div class="rightSetting m-b-25">
                        <p>Server Load</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar"
                                     aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                    <small>Highly Loaded</small>
                                </span>
                        </div>
                    </div>--}}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane stretchRight" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-green"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-purple"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-cyan"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-red"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-lime"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>

@yield('css')

@yield('content')


<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>

<script src="">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@yield('scripts')


<script src="{{asset('assets/js/jquery-validate.js')}}"></script>

<!-- Plugins Js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/js/form.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-multiselect.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('assets/js/admin.js')}}"></script>
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/bundles/apexcharts/apexcharts.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('assets/js/index.js')}}"></script>
<script src="{{asset('assets/js/table.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/js/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.js')}}"></script>
<script src="{{asset('assets/js/forms/form-wizard.js')}}"></script>
<script src="{{asset('assets/js/forms/form_categorie.js')}}"></script>
<script src="{{asset('assets/js/forms/form_type.js')}}"></script>
<script src="{{asset('assets/js/user/collaborateur.js')}}"></script>
<script src="{{asset('assets/js/forms/form_institution.js')}}"></script>
<script src="{{asset('assets/js/forms/piece.js')}}"></script>
<script src="{{asset('assets/js/forms/form_operation.js')}}"></script>
<script src="{{asset('assets/js/ecommerce/product-detail.js')}}"></script>
<script src="{{asset('assets/js/carousel.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/bundles/export-tables/buttons.print.min.js')}}"></script>


</body>

</html>
