@extends('user.layout.layout')

@section('content')

    <main id="main">

        <!-- ======= Services Section ======= -->

        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2 class="bq-title"> Opérations </h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="operationBloc input-group shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="col-lg-12 col-md-6">
                                <div class="mytitle">
                                    <h6 class="">
                                        Choisir une opération
                                    </h6>
                                </div>
                                <select name="operation" data-live-search="true" id="product"
                                        class="form-control selectpicker">
                                    <option class="text-center" selected disabled="disabled"> Choisissez une opération
                                    </option>
                                    @foreach($operation as $operations)
                                        <option data-id="1" value="{{$operations->id}}"
                                                class="operation"> {{$operations->nom}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 icon-box" data-aos="fade-up">
                        <div class="">
                            <div class="icon"><i class="icofont-ui-v-card"></i></div>
                            <h4 class="title">
                                <a href="#"> {{$OP->nom}} </a>
                            </h4>
                            <p class="description">
                                {{$OP->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Services Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            @include('user.details')
        </section><!-- End About Us Section -->

        <!-- ======= About Lists Section ======= -->
        <section class="about-lists">
            <div class="container">
                <div class="row no-gutters">
                    @foreach($categorie as $categories)
                        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
                            <span>03</span>
                            <h4 data-toggle="modal" data-target="#modalCart"> {{$categories->nom}} </h4>
                            <p> {{$categories->description}} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End About Lists Section -->

        <!-- ======= Counts Section ======= -->
        <section class="counts section-bg">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                        <div class="count-box">
                            <i class="icofont-simple-smile" style="color: #20b38e;"></i>
                            <span data-toggle="counter-up"> {{count($operation)}} </span>
                            <p> Opérations disponible </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="count-box">
                            <i class="icofont-document-folder" style="color: #c042ff;"></i>
                            <span data-toggle="counter-up"> {{count($piece)}} </span>
                            <p> Pièces disponible </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="count-box">
                            <i class="icofont-live-support" style="color: #46d1ff;"></i>
                            <span data-toggle="counter-up"> {{count($institution)}} </span>
                            <p> Institutions alliées </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                        <div class="count-box">
                            <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
                            <span data-toggle="counter-up"> 15 </span>
                            <p> Nombre de visite </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2> Pièces </h2>
                </div>

                <div class="row">
                    @foreach($piece as $pieces)
                        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                            <div class="icon"><i class="icofont-computer"></i></div>
                            <h4 class="title"><a href=""> {{$pieces->nom}} </a></h4>
                            <p class="description">
                                {{$pieces->description}}
                            </p>
                        </div>
                    @endforeach
                    {{--<div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat tarad limino ata</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="icofont-earth"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="icofont-image"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="icofont-settings"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                            praesentium voluptatum deleniti atque</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon"><i class="icofont-tasks-alt"></i></div>
                        <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                        <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                            tempore, cum soluta nobis est eligendi</p>
                    </div>--}}
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Our Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title">
                    <h2> Institutions Etatiques </h2>
                    <p>
                        Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">


                    @foreach($institution as $institutions)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="/uploads/Institutions/{{$institutions->logo}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4> {{$institutions->nom}} </h4>
                                    <p><span class="fa fa-"></span> {{$institutions->adresse}} </p>
                                    <div class="portfolio-links">
                                        <a href="{{asset('/uploads/Institutions/'.$institutions->logo)}}"
                                           data-gall="portfolioGallery"
                                           class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                                        <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{--<div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-2.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="Web 3"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-3.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="App 2"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-4.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="Card 2"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-5.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="Web 2"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-6.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="App 3"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-7.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="Card 1"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-8.jp')}}g"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="Card 3"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{asset('assets/img/portfolio/portfolio-9.jpg')}}"
                                       data-gall="portfolioGallery"
                                       class="venobox" title="Web 3"><i class="icofont-eye"></i></a>
                                    <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                </div>

            </div>
        </section><!-- End Our Portfolio Section -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2> Institutions Générales </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
                </div>

                <div class="row">
                    @foreach($categorie as $categories)
                        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="member">
                                <div class="pic">
                                    <img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
                                    <div class="member-info">
                                        <h4> {{$categories->nom}} </h4>
                                        <span> {{$categories->description}} </span>
                                        <div class="social">
                                            <a href=""><i class="icofont-twitter"></i></a>
                                            <a href=""><i class="icofont-facebook"></i></a>
                                            <a href=""><i class="icofont-instagram"></i></a>
                                            <a href=""><i class="icofont-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{--<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic"><img src="{{asset('assets/img/team/team-2.jpg')}}" class="img-fluid"
                                                  alt=""></div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="pic"><img src="{{asset('assets/img/team/team-3.jpg')}}" class="img-fluid"
                                                  alt=""></div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="pic"><img src="{{asset('assets/img/team/team-4.jpg')}}" class="img-fluid"
                                                  alt=""></div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                </div>

            </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2> Opérations les plus visitées </h2>
                </div>

                <div class="row  d-flex align-items-stretch">

                    <div class="col-lg-6 faq-item" data-aos="fade-up">
                        <h4>Non consectetur a erat nam at lectus urna duis?</h4>
                        <p>
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                            curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                        </p>
                    </div>

                    <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
                        <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                            laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                            Est pellentesque elit ullamcorper dignissim.
                        </p>
                    </div>

                    <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
                        <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
                        <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                            elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus
                            pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
                        </p>
                    </div>

                    <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
                        <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                            laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                            Est pellentesque elit ullamcorper dignissim.
                        </p>
                    </div>

                    <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
                        <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                            ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
                            bibendum est. Purus gravida quis blandit turpis cursus in
                        </p>
                    </div>

                    <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
                        <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem
                            dolor?</h4>
                        <p>
                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer
                            malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem
                            dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                        </p>
                    </div>

                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2> Nous Contacter </h2>
                </div>

                <div class="row">

                    <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3> Notre Adresse </h3>
                            <p> A108 Adam Street, République du Bénin (RB) </p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3> Notre mail </h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box ">
                            <i class="bx bx-phone-call"></i>
                            <h3> Nos Contacts </h3>
                            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                        </div>
                    </div>

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <form action="#" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Nom et Prénoms" data-rule="minlen:4"
                                           data-msg="Please enter at least 4 chars"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Adresse Mail" data-rule="email"
                                           data-msg="Please enter a valid email"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Objet" data-rule="minlen:4"
                                       data-msg="Please enter at least 8 chars of subject"/>
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                          data-msg="Please write something for us"
                                          placeholder="Votre message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit"> Envoyer</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section -->

    </main><!-- End #main -->


    <!-- Modal: modalCart -->
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myModalLabel"> Les mairies du Bénin </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Logo</th>
                            <th> Commune</th>
                            <th> Département</th>
                            <th> Adresse</th>
                            <th> Email</th>
                            <th> Contact</th>
                            <th> Site Web</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($institution as $institutions)
                            <tr>
                                <th scope="row"> {{$institutions->id}} </th>
                                <td> <img src="/uploads/Institutions/{{$institutions->logo}}" class="rounded-circle" width="30px"> </td>
                                <td> {{$institutions->nom}} </td>
                                <td> {{$institutions->description}} </td>
                                <td> {{$institutions->adresse}} </td>
                                <td> {{$institutions->email}} </td>
                                <td> {{$institutions->contact}} </td>
                                <td> {{$institutions->siteweb}} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalCart -->


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm">
        Launch demo modal
    </button>

    <!-- Central Modal Small -->
    <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-sm" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Central Modal Small -->

@endsection