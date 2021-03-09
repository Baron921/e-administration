<div class="container" id="bloc_detail">
    <div class="row" id="backButton">
        <a href="{{route('acte.operation')}}" class="sigle_operation back pull-left"
           data-url="{{route('acte.operation')}}">
            Retour
        </a>
    </div>

    <div class="col-md-12 icon-box" data-aos="" data-aos-delay="200">
        <div class="text-center">
            <div class="mt-3">
                <div class="">
                    <div class="detail" style="font-weight: bold; color: #0a3764">
                        <span class="">
                            @if($operation->type_id == 1)
                                <i class="icofont-computer"></i>
                            @elseif($operation->type_id == 2)
                                <i class="icofont-earth"></i>
                            @elseif($operation->type_id == 3)
                                <i class="icofont-law"></i>
                            @elseif($operation->type_id == 4)
                                <i class="icofont-user-suited"></i>
                            @elseif($operation->type_id == 5)
                                <i class="icofont-money"></i>
                            @elseif($operation->type_id == 6)
                                <i class="icofont-"></i>
                            @elseif($operation->type_id == 7)
                                <i class="icofont-industries"></i>
                            @elseif($operation->type_id == 8)
                                <i class="icofont-"></i>
                            @elseif($operation->type_id == 9)
                                <i class="icofont-industries"></i>
                            @else
                                <i class="icofont-user"></i>
                            @endif
                        </span>
                        <span class="detailName"> {{$operation->nom}} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 shadow-lg my-5">
            <div class="col-lg-12 about-content">
                <h2 class="detail pt-4"> Pièces à fournir </h2>
                <hr>
                <p style="color: #30353b">
                    Découvrez la liste des pièces à fournir pour établir votre
                    <span style="text-transform: lowercase; color: red; font-weight: bold"> {{$operation->nom}} </span>
                    en République du Bénin grâce à e-administration
                </p>

                <div class="icon-box pt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="ro">
                        @foreach($allpiece as $key => $piece)
                            <div class="col-md-12">
                                <div class="piece">
                                    <div class="col-xs-4">
                                        <h4 class="key"> {{$key + 1}} </h4>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="piece_name">
                                            {{$piece->nom}}
                                        </h4>
                                    </div>
                                </div>

                                <p class="descripti">
                                    {{$piece->description}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-12 about-content">
                <h2 class="detail pt-4"> Institution compétente </h2>
                <hr>
                <p style="color: #30353b">
                    Connaître l'institution étatique chargée d'établir votre
                    <span style="text-transform: lowercase; color: red; font-weight: bold"> {{$operation->nom}} </span> en République du Bénin grâce à e-administration
                </p>

                <div class="icon-bo pt-4" data-aos="fade-right" data-aos-delay="500">
                    @foreach($allinstitut as $institut)
                        <div class="text-center">
                            <i class="icofont-uses-alt-5" style="color: #ffb459;">
                                <img src="/uploads/Institutions/{{$institut->logo}}" width="45px">
                            </i>
                            <h4 class="py-4">
                                <a href="#"> {{$institut->nom}} </a>
                            </h4>
                        </div>

                        <div class="col-md-12 collapse user-detail" id="other-detail">
                            <fieldset>
                                <legend>  {{$institut->description}}  </legend>

                                <div class="row">
                                    <div class="p-4 col-md-6 col-12">
                                <span class="">
                                    <i class="icofont-address-book"></i>
                                    <strong> Adresse </strong> <hr>
                                </span>
                                        <p class="pull-right"> {{$institut->adresse}} </p>
                                    </div>


                                    <div class="p-4 col-md-6 col-12">
                                <span class="">
                                    <i class="icofont-phone-circle"></i>
                                    <strong> Contact </strong> <hr>
                                </span>
                                        <p class="pull-right"> {{$institut->contact}} </p>
                                    </div>

                                    <div class="p-4 col-md-6 col-12">
                                <span class="">
                                    <i class="icofont-mail"></i>
                                    <strong> Adresse Mail </strong> <hr>
                                </span>
                                        <p class="pull-right"> <a href="mailto:{{$institut->email}}"> {{$institut->email}} </a> </p>
                                    </div>

                                    <div class="p-4 col-md-6 col-12">
                                <span class="">
                                    <i class="icofont-web"></i>
                                    <strong> Site web </strong> <hr>
                                </span>
                                        <p class="pull-right"> <a href="{{$institut->siteweb}}" target="_blank"> {{$institut->siteweb}} </a> </p>
                                    </div>

                                </div>
                            </fieldset>
                        </div>

                        <div class="text-center" id="blocDrop">
                            <i class="icofont-simple-down shadow butonDrop" data-target="#other-detail"
                               data-toggle="collapse"
                               data-id="{{$institut->nom}}" title="voir tout sur le {{$institut->nom}}"> </i>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 about-content">
                <h3 class="detail pt-4"> Autres détails </h3>
                <hr>

                <div class="row">
                    <div class="col-lg-8 pb-4">
                        <div class="card autre-detail">
                            <div class="card-header text-center">
                                <h6>
                                    <i class="icofont-exclamation-tringle">
                                        <b> CONDITONS </b>
                                    </i>
                                </h6>
                            </div>
                            <div class="card-body">
                                @foreach($condition as $conditions)
                                    <div class="col-lg-12">
                                        <p>
                                            <i class="icofont-check-circled"
                                               style="background-color: #0a3764; color: white; padding: 3px; border-radius: 50%"></i>
                                            {{$conditions->condition}}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-center">
                                    <i class="icofont-price">
                                        <strong> Coût du service (F CFA) </strong>
                                    </i>
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="text-center">
                                    {{$operation->montant}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="autre-detail">
                        </div>
                    </div>

                </div>
                {{--<p style="color: #30353b">
                    Découvrez la liste des pièces à fournir pour établir votre
                    <span style="text-transform: lowercase; color: red; font-weight: bold"> {{$operation->nom}} </span>
                    en République du Bénin grâce à e-administration
                </p>

                <div class="icon-box pt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                        @foreach($allpiece as $key => $piece)
                            <div class="col-lg-6">
                                <div class="piece">
                                    <span class="key"> {{$key + 1}} </span>
                                    <h4 class="piece_name">
                                        {{$piece->nom}}
                                    </h4>
                                </div>

                                <p class="descripti">
                                    {{$piece->description}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

</div>


