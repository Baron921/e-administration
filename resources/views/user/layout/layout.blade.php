<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>e-administration</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Vendor CSS Files -->
    {{--<link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('assets/mdb/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/myStyle.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/fontAwesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/sweetAlert.css')}}" rel="stylesheet"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>


    <!-- =======================================================
    * Template Name: Mamba - v2.0.1
    * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
{{--<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
            <i class="icofont-phone"></i> +1 5589 55488 55
        </div>
        <div class="social-links float-right">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="skype"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
        </div>
    </div>
</section>--}}

<!-- ======= Header ======= -->
<header id="header">
    <div class="container">

        <div class="logo float-left">
            {{--<h1 class="text-light"><a href="{{route('acte.index')}}"><span>e-administration</span></a></h1>--}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{route('acte.index')}}"><img src="{{asset('assets/img/LOGO-E-ADMINISTRATION.png')}}" alt="" class="img-fluid"></a>
        </div>

        <nav class="col-md-7 col-xs-10 nav-menu float-right d-none d-lg-block">
            <h5 class="pt-3 ml12"> quelles pièces fournies pour mon acte ? </h5>
            {{--<ul>
                <li class="active">
                    <a href="{{route('acte.index')}}">
                        Accueil <i class="la la-angle-down"></i>
                    </a>
                </li>

                <li class="">
                    <a class="sigle_operation" href="{{route('actuloperation')}}" data-url="{{route('acte.operation')}}">
                        Opération
                    </a>
                </li>
                    <ul>
                        @foreach($operation as $operations)
                            <li class="selectpicker">
                                <a href="{{route('acte.operation', [$operations->id, $operations->nom, $operations->slug])}}"
                                   data-id="{{$operations}}" class="operation"
                                   data-url="{{route('acte.operation', [$operations->id, $operations->nom, $operations->slug])}}"
                                   id="renseignement">
                                    {{$operations->nom}}
                                </a>
                            </li>
                        @endforeach
                         <li class="drop-down"><a href="#">  </a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                    </ul>

                <li><a href="#contact">Boîte à suggestion</a></li>
            </ul>--}}
        </nav>

    <!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active"
                     style="background-image: url({{asset('assets/img/slide/slide-1.jpg')}});">
                    <div class="back-color"></div>
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animated fadeInDown">Carte <span>Nationale d'Identité (CNI)</span></h2>
                            <p class="animated fadeInUp">
                                Consulter la liste des pièces à fournir pour se faire établir sa CNI, le coût du service
                                et où se faire établir
                            </p>
                            <a class="btn-get-started animated fadeInUp scrollto sigle_operation" href="{{route('acte.operation')}}"
                               data-url="{{route('acte.operation')}}">
                                Tous les services
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-2.jpg')}});">
                    <div class="back-color"></div>
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animated fadeInDown"> Identifiant Fiscale Unique (IFU) </h2>
                            <p class="animated fadeInUp">
                                Découvrez les pièces à fournir pour obtenir son IFU,
                                le coût du service et l'institution en charge de la délivrance de la pièce administrative
                            </p>
                            <a class="btn-get-started animated fadeInUp scrollto sigle_operation" href="{{route('acte.operation')}}"
                               data-url="{{route('acte.operation')}}">
                                Tous les services
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-3.jpg')}});">
                    <div class="back-color"></div>
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animated fadeInDown"> Régistre de Commerce et du Crédit Mobilier (RCCM) </h2>
                            <p class="animated fadeInUp">
                                Découvrez les pièces à fournir pour obtenir son IFU,
                                le coût du service et l'institution en charge de la délivrance de la pièce administrative
                            </p>
                            <a class="btn-get-started animated fadeInUp scrollto sigle_operation" href="{{route('acte.operation')}}"
                               data-url="{{route('acte.operation')}}">
                                Tous les services
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->


@yield('content')


<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>E-Administration</h3>
                    <p>
                        A108 Adam Street <br>
                        NY 535022, USA<br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4 class=""> MENU </h4>
                    <ul>
                        <li>
                            <a href="{{route('acte.index')}}"> Accueil </a>
                        </li>
                        <li>
                            <a class="sigle_operation" href="{{route('acte.operation')}}"
                               data-url="{{route('acte.operation')}}">
                                Services
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4> Les plus visitées </h4>
                    <ul>
                        @foreach($operation as $operations)
                            <li>
                                <i class=""></i>
                                <a class="buton_details" data-id="{{$operations}}"
                                   data-url="{{route('details', [$operations->nom, $operations->slug])}}"
                                   href="{{route('details', [$operations->nom, $operations->slug])}}">
                                    {{$operations->nom}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>  </h4>
                    <p></p>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>SunTech</span></strong>. Tout droit réservé
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
            Designed by <a href="https://www.suntech.tech" target="_blank">SunTech</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
{{--<script src="{{asset('assets/js/jquery-datatable.js')}}"></script>--}}
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/user/animate.js')}}"></script>
<script src="{{asset('assets/js/user/accueil.js')}}"></script>
<script src="{{asset('assets/js/sweetAlert.js')}}"></script>


@yield('scripts')


<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"> </script>


<script>
    $(document).on('click', '.operation', function () {
        let operation = $(this).data('id');
        let url = $(this).data('url');
        console.log(url);
    });


</script>

</body>

</html>