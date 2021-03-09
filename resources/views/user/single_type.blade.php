<div class="" id="presentOperation">

    <div class="section-title">
        <h4 class="bq-title" id="operation_title"> Toutes les opérations </h4>
    </div>

    <div class="row menuOperation">
        <div class="col-md-4">
            <div class="operationBloc input-group shadow-lg bg-white rounded">
                <div class="col-md-12">
                    <div class="mytitle">
                        <h6 class="">
                            Choisir par type
                        </h6>
                    </div>

                    <nav class="" id="menu">
                        <ul>
                            <li class="choix_operation">
                                <a class="activers all-Operation" href="{{route('acte.all', [0, 'toutes'])}}"
                                   data-url="{{route('acte.all', [0, 'toutes'])}}">
                                    Toutes les opérations
                                </a>
                            </li>
                            <hr>
                            @foreach($user as $users)
                                <li class="choix_operation">
                                    <a class="butonOperation" data-id="{{$users}}"
                                       data-url="{{route('type.nom', [$users->id, $users->nom])}}"
                                       href="{{route('type.nom', [$users->id, $users->nom])}}">
                                        {{$users->nom}}
                                    </a>
                                </li>
                                <hr>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-8" id="listOperation">
            @include('user.single_listOperation')
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('ul li a').click(function(){
            $('li a').removeClass("activers");
            $(this).addClass("activers");
        });
    });
</script>