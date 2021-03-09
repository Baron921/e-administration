@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title">e-adminstration</h4>
                                <h6 class="sous-titre black-color"> Je découvre la liste des pièces à fournir pour obtenir mes actes </h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="card infobox-5">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left card-icon">
                                    <i class="material-icons col-blue">person_add</i>
                                </div>
                                <div class="float-right">
                                    <p class="text-right"> Total des admins </p>
                                    <div class="col-blue">
                                        <h3 class="text-right mb-0"> {{$user}} </h3>
                                    </div>
                                </div>
                            </div>
                            {{--<p class="mt-3 mb-0"><a href="#"> Lister les demandes </a></p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="card infobox-5">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left card-icon">
                                    <i class="material-icons col-green">account_balance</i>
                                </div>
                                <div class="float-right">
                                    <p class="text-right"> Nombre d'institution </p>
                                    <div class="col-green">
                                        <h3 class="text-right mb-0"> {{$user}} </h3>
                                    </div>
                                </div>
                            </div>
                            {{--<p class="Green mt-3 mb-0"> <a href="#"> Lister les clients </a> </p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="card infobox-5">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left card-icon">
                                    <i class="material-icons col-orange">receipt</i>
                                </div>
                                <div class="float-right">
                                    <p class="text-right"> Nombre de piece </p>
                                    <div class="col-orange">
                                        <h3 class="text-right mb-0"> {{$piece}} </h3>
                                    </div>
                                </div>
                            </div>
                            {{--<p class="Orange mt-3 mb-0">
                                <a href="#"> Lister les articles </a>
                            </p>--}}
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="card infobox-5">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left card-icon">
                                    <i class="material-icons col-red"> screen_share </i>
                                </div>
                                <div class="float-right">
                                    <p class="text-right"> Nombre d'operation </p>
                                    <div class="col-red">
                                        <h3 class="text-right mb-0"> {{$nbreOperation}} </h3>
                                    </div>
                                </div>
                            </div>
                            {{--<p class="text-muted mt-3 mb-0"> <a> Liste </a> </p>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <!-- line chart -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Revenue</strong> Chart</h2>
                        </div>
                        <div class="body">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                <!-- Bar chart with line -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Income</strong> Chart</h2>
                        </div>
                        <div class="body">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Client</strong> Details</h2>
                        </div>
                        <div class="body">
                            <div class="tableBody" id="client-details">
                                <div class="table-responsive">
                                    <table class="table table-hover dashboard-task-infos">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Rating</th>
                                                <th>Project Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="table-img">
                                                    <img src="assets/images/user/user1.jpg" alt="">
                                                </td>
                                                <td>John Doe</td>
                                                <td>xyz@email.com</td>
                                                <td>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="far fa-star col-orange"></i>
                                                </td>
                                                <td>ERP System</td>
                                                <td>
                                                    <button class="btn tblEditBtn">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <button class="btn tblDelBtn">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table-img">
                                                    <img src="assets/images/user/user2.jpg" alt="">
                                                </td>
                                                <td>Sarah Smith</td>
                                                <td>xyz@email.com</td>
                                                <td>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star-half-alt col-orange"></i>
                                                    <i class="far fa-star col-orange"></i>
                                                    <i class="far fa-star col-orange"></i>
                                                </td>
                                                <td>Abc Website</td>
                                                <td>
                                                    <button class="btn tblEditBtn">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <button class="btn tblDelBtn">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table-img">
                                                    <img src="assets/images/user/user3.jpg" alt="">
                                                </td>
                                                <td>Airi Satou</td>
                                                <td>xyz@email.com</td>
                                                <td>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star-half-alt col-orange"></i>
                                                </td>
                                                <td>Android App</td>
                                                <td>
                                                    <button class="btn tblEditBtn">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <button class="btn tblDelBtn">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-img">
                                                    <img src="assets/images/user/user5.jpg" alt="">
                                                </td>
                                                <td>Ashton Cox</td>
                                                <td>xyz@email.com</td>
                                                <td>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                </td>
                                                <td>Java Website</td>
                                                <td>
                                                    <button class="btn tblEditBtn">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <button class="btn tblDelBtn">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table-img">
                                                    <img src="assets/images/user/user6.jpg" alt="">
                                                </td>
                                                <td>Cara Stevens</td>
                                                <td>xyz@email.com</td>
                                                <td>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="fas fa-star col-orange"></i>
                                                    <i class="far fa-star col-orange"></i>
                                                </td>
                                                <td>Desktop App</td>
                                                <td>
                                                    <button class="btn tblEditBtn">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <button class="btn tblDelBtn">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Projects</strong></h2>
                        </div>
                        <div class="body">
                            <div id="project-list">
                                <table class="table card-table">
                                    <tbody>
                                        <tr>
                                            <td>Java Software</td>
                                            <td class="text-right">
                                                <span class="badge">25%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Landing Page</td>
                                            <td class="text-right">
                                                <div class="badge col-red">Rejected</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Logo Design</td>
                                            <td class="text-right">
                                                <div class="badge col-green">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-commerce Website</td>
                                            <td class="text-right">
                                                <span class="badge">40%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>.Net Project</td>
                                            <td class="text-right">
                                                <span class="badge col-orange">Pending</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>PHP Website</td>
                                            <td class="text-right">
                                                <span class="badge col-green">Completed</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Angular Website</td>
                                            <td class="text-right">
                                                <span class="badge">98%</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Country</strong> Wise Sales</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Country</th>
                                            <th>Sales</th>
                                            <th>Average</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="assets/images/flags/canada.png" alt=""></td>
                                            <td>Canada</td>
                                            <td>$8,365</td>
                                            <td>28.27%</td>
                                            <td class="font-weight-bold col-green">+2.10%</td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/flags/in.png" alt=""></td>
                                            <td>India</td>
                                            <td>$9,870</td>
                                            <td>55.73%</td>
                                            <td class="font-weight-bold col-red">-1.17%</td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/flags/aus.png" alt=""></td>
                                            <td>Australia</td>
                                            <td>$1,759</td>
                                            <td>29.45%</td>
                                            <td class="font-weight-bold col-red">-3.18%</td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/flags/br.png" alt=""></td>
                                            <td>Brazil</td>
                                            <td>$598</td>
                                            <td>7.15%</td>
                                            <td class="font-weight-bold col-green">+4.10%</td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/flags/fr.png" alt=""></td>
                                            <td>Fransh</td>
                                            <td>$2,658</td>
                                            <td>35.98%</td>
                                            <td class="font-weight-bold col-red">-1.87%</td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/flags/pt.png" alt=""></td>
                                            <td>Portugal</td>
                                            <td>$4,256</td>
                                            <td>41.56%</td>
                                            <td class="font-weight-bold col-green">+2.10%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bar chart with line -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Income</strong> Chart</h2>
                        </div>
                        <div class="body">
                            <div id="chart4"></div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <h6 class="text-muted m-b-10">Completed Projects</h6>
                                        <h4 class="m-b-0 f-w-600 ">225</h4>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="text-muted m-b-10">Total Earnings</h6>
                                        <h4 class="m-b-0 f-w-600 ">125.9M</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Timeline</strong></h2>
                        </div>
                        <div class="body">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-auto">
                                    <img class="img-fluid rounded-circle act-user-img"
                                        src="assets/images/user/userbig1.jpg" alt="">
                                </div>
                                <div class="col">
                                    <h5>John Doe</h5>
                                    <span>UX Designer</span>
                                </div>
                            </div>
                            <ul class="task-list">
                                <li><i class="task-icon bg-green"></i>
                                    <h6>
                                        Angelica Ramos<span class="float-right text-muted">15
                                            Jan</span>
                                    </h6>
                                    <p class="text-muted">Lorem ipsum is dolorem…</p>
                                </li>
                                <li><i class="task-icon bg-red"></i>
                                    <h6>
                                        Sarah Smith<span class="float-right text-muted">21 Jan</span>
                                    </h6>
                                    <p class="text-muted">Lorem ipsum is dolorem…</p>
                                </li>
                                <li><i class="task-icon bg-cyan"></i>
                                    <h6>
                                        Ashton Cox<span class="float-right text-muted">28 Jan</span>
                                    </h6>
                                    <p class="text-muted">Lorem ipsum is dolorem…</p>
                                </li>
                                <li><i class="task-icon bg-orange"></i>
                                    <h6>
                                        Cara Stevens<span class="float-right text-muted">31 Jan</span>
                                    </h6>
                                    <p class="text-muted">Lorem ipsum is dolorem…</p>
                                </li>

                            </ul>
                            <div class="text-center m-t-15">
                                <a href="#!" class="b-b-primary text-primary">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Income</strong> Chart</h2>
                        </div>
                        <div class="body">
                            <canvas id="chart3"></canvas>
                            <div class="table-responsive m-t-20">
                                <table class="table align-items-center">
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle col-cyan mr-2"></i> Direct</td>
                                            <td>$7,258</td>
                                            <td class="col-green">+32%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle col-blue mr-2"></i>Website</td>
                                            <td>$1,596</td>
                                            <td class="col-green">+12%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle col-orange mr-2"></i>Email</td>
                                            <td>$725</td>
                                            <td class="col-orange">-12%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle col-amber mr-2"></i>Other</td>
                                            <td>$897</td>
                                            <td class="col-green">+3%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Latest</strong> Posts</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" onClick="return false;">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="card-block">
                                <div class="row p-b-5">
                                    <div class="col-auto p-r-0">
                                        <img src="assets/images/posts/post1.jpg" alt="user image"
                                            class="latest-posts-img">
                                    </div>
                                    <div class="col">
                                        <h6>About Something</h6>
                                        <p class="text-muted m-b-5">
                                            <i class="fa fa-play-circle-o"></i> Video | 10 minutes ago</p>
                                        <p class="text-muted ">Lorem Ipsum is simply dummy text of the.</p>
                                    </div>
                                </div>
                                <div class="row p-b-5">
                                    <div class="col-auto p-r-0">
                                        <img src="assets/images/posts/post2.jpg" alt="user image"
                                            class="latest-posts-img">
                                    </div>
                                    <div class="col">
                                        <h6>Relationship</h6>
                                        <p class="text-muted m-b-5">
                                            <i class="fa fa-play-circle-o"></i> Video | 24 minutes ago</p>
                                        <p class="text-muted ">Lorem Ipsum is simply dummy text of the.</p>
                                    </div>
                                </div>
                                <div class="row p-b-10">
                                    <div class="col-auto p-r-0">
                                        <img src="assets/images/posts/post3.jpg" alt="user image"
                                            class="latest-posts-img">
                                    </div>
                                    <div class="col">
                                        <h6>Human body</h6>
                                        <p class="text-muted m-b-5">
                                            <i class="fa fa-play-circle-o"></i> Video | 53 minutes ago</p>
                                        <p class="text-muted ">Lorem Ipsum is simply dummy text of the.</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="#!" class="b-b-primary text-primary">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection