<section id="filtre">
    <div class="col-md-12">
        <div class="row text-center mobile-menu">

            <div class="col-md-4 acte green" data-aos="">
                    <div class="active menu_operation">
                        <a class="sigle_operation" id="adminop" href="{{route('acte.operation')}}"
                           data-url="{{route('acte.operation')}}">
                            <i class="fa fa-university"></i> Opération par administration
                        </a>
                    </div>
            </div>

            <div class="col-md-4 acte yellow" data-aos="">
                    <div class="menu_operation">
                        <a class="sigle_operation" href="{{route('acte.theme')}}"
                           data-url="{{route('acte.theme')}}">
                            <i class="fa fa-list-ul"></i> Opération par catégorie
                        </a>
                    </div>
            </div>

            <div class="col-md-4 acte red" data-aos="">
                    <div class="menu_operation">
                        <a class="sigle_operation" href="{{route('acte.type')}}"
                           data-url="{{route('acte.type')}}">
                            <i class="fa fa-list-alt" id="fa-type"></i> Opération par type
                        </a>
                    </div>
            </div>

        </div>

        <div class="col-md-8 col-xs-8 offset-md-2 pt-2">
            <div class="menu-toggle">
                <h6 class="hover-bar" data-target="#buton-show"
                    data-toggle="collapse"> Opération par administration
                    <i class="icofont-simple-down button-mobile"></i>
                </h6>
            </div>
        </div>

    </div>

</section>

<div class="col-lg-12">
    <div class="col-md-8 col-xs-8 offset-md-2">

        <div class="collapse cadrant-operation" id="buton-show">
            <div class="">
                <div class="py-1 col-md-12">
                    <a class="sigle_operation" id="adminop" href="{{route('acte.operation')}}"
                       data-url="{{route('acte.operation')}}">
                        <i class="fa fa-university"></i> | Opération par administration
                    </a>
                </div>
                <hr>

                <div class="py-1 col-md-12">
                    <a class="sigle_operation" href="{{route('acte.theme')}}"
                       data-url="{{route('acte.theme')}}">
                        <i class="fa fa-list-ul"></i> | Opération par catégorie
                    </a>
                </div>
                <hr>

                <div class="py-1 col-md-12">
                    <a class="sigle_operation" href="{{route('acte.type')}}"
                       data-url="{{route('acte.type')}}">
                        <i class="fa fa-list-alt"></i> | Opération par type
                    </a>
                </div>
                <hr>

            </div>
        </div>
    </div>
</div>

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    @include('user.single_operation')
</section>

