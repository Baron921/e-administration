@extends('user.layout.layout')

@section('content')

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services shadow">
            <div class="container popular" id="welcome">

                {{--<div class="">
                    <div class="col-lg-4 col-md-4 offset-5" data-aos="">
                        <div class="alloperation">
                            <button class="btn btn-primary" id="">
                                <a class="sigle_operation" href="{{route('acte.operation')}}"
                                   data-url="{{route('acte.operation')}}">
                                    Tous les services
                                </a>
                            </button>
                        </div>
                    </div>
                </div>--}}

                <div class="section-title">
                    <h2> Les opérations populaires </h2>
                </div>

                <div class="row">
                    @foreach($operation as $operations)
                        <div class="col-lg-3 col-md-4 col-sm-6 icon-box" data-aos="" data-aos-delay="200">
                            <div class="head_operation shadow">
                                <div class="mt-3">
                                    <div class="icon">

                                        @if($operations->type_id == 1)
                                            <i class="icofont-computer"></i>
                                        @elseif($operations->type_id == 2)
                                            <i class="icofont-earth"></i>
                                        @elseif($operations->type_id == 3)
                                            <i class="icofont-law"></i>
                                        @elseif($operations->type_id == 4)
                                            <i class="icofont-user-suited"></i>
                                        @elseif($operations->type_id == 5)
                                            <i class="icofont-money"></i>
                                        @elseif($operations->type_id == 6)
                                            <i class="icofont-"></i>
                                        @elseif($operations->type_id == 7)
                                            <i class="icofont-industries"></i>
                                        @elseif($operations->type_id == 8)
                                            <i class="icofont-"></i>
                                        @elseif($operations->type_id == 9)
                                            <i class="icofont-industries"></i>
                                        @else
                                            <i class="icofont-user"></i>
                                        @endif

                                    </div>
                                    <div class="titreOperation col-lg-12">
                                        <h6 class="" style="font-weight: bold"> {{$operations->nom}} </h6>
                                    </div>
                                </div>
                                <p class="body_description">
                                    {{$operations->description}}
                                </p>
                            </div>
                            <div class="one_foot">
                                <a class="buton_details" data-id="{{$operations}}"
                                   data-url="{{route('details', [$operations->nom, $operations->slug])}}"
                                   href="{{route('details', [$operations->nom, $operations->slug])}}">
                                    Détails
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="textcenter">
                    <a class="sigle_operation btn btn-primary" href="{{route('acte.operation')}}" data-url="{{route('acte.operation')}}">
                        Tous les services
                    </a>
                </div>

            </div>
        </section><!-- End Services Section -->

    </main>



@endsection

@section('scripts')

    <script>

        // popovers initialization - on hover
        $('[data-toggle="popover-hover"]').popover({
            html: true,
            trigger: 'hover',
            placement: 'right',
            content: function () {
                return ' <div class="btn-info"> ' +
                    '<h4 class=""> Où trouver ? </h4>' +
                    '<p> Rendez-vous dans otre ville de naissance </p> ' +
                    '</div> ';
            }
        });


        let options = $('select[name=operation]').find('option:selected').data('id');
        console.log(options);

        $('.selectpicker').on("changed.bs.select", function () {
            let dataTypeAttribute = $('option:selected', this).attr("data-type");
            console.log(dataTypeAttribute);
        });

        /*$('.selectpicker').change(function (e) {
            console.log(e.target.value);
        });*/

    </script>

@endsection
