@extends('admin.layout.layout')

@section('css')

@endsection

@section('content')

    <section class="content" id="table-operation">
        @include('admin.single_listOperation')
    </section>

    <!-- Modal: modalQuickView -->
    <div class="modal fade" id="operationUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialogbloc modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="profile bg-blue-grey shadow-lg">
                        <div class="user-name"> <h1 id="user-name" style="font-weight: bold">  </h1> </div>
                        <div class="name-center text-center" id="name-center" style="font-size: 20px;">Software Engineer</div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="m-b-20">
                                    <div class="contact-grid" id="logoContainer">

                                    </div>
                                    <h2 class="card-inside-title"></h2>
                                    <div class="body" id="crate">
                                        <form id="form_operation_update" method="post">
                                            <input type="hidden" id="idUpdate">
                                            <div class="row clearfix">
                                                @method('put')
                                                @csrf

                                                <div class="col-lg-12">
                                                    <label for="" class="ml-3"> <strong> Type d'opération </strong> </label>
                                                    <div class="input-field col s12">
                                                        <select id="type" name="type_id">
                                                            <option value="" selected disabled> Choisir un type </option>
                                                            @foreach($type as $types)
                                                                <option value="{{$types->id}}"> {{$types->nom}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="input-ield col s12">
                                                        <label for="nom"> Nom </label>
                                                        <input type="text" data-length="10" name="nom" id="nom" class="modifier">
                                                    </div>
                                                    <label id="nom-error" class="error editerror" for="nom"></label>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="input-fied col s12">
                                                        <label for="montant"> Montant (en Franc CFA) </label>
                                                        <input type="number" data-length="10" name="montant" id="montant" class="modifier">
                                                    </div>
                                                    <label id="montant-error" class="error editerror" for="montant"> </label>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="input-fied col s12">
                                                        <label for="description"> Description </label>
                                                        <textarea class="modifier materialize-textarea" name="description" id="description" data-length="120"></textarea>
                                                    </div>
                                                    <label id="description-error" class="error editerror" for="description"> </label>
                                                </div>

                                                <div class="col-lg-6" id="opera_piece">
                                                    @include('admin.single_operaPiece')
                                                </div>

                                                <div class="col-lg-6" id="opera_institution">
                                                    @include('admin.single_operaInstitution')
                                                </div>

                                            </div>

                                            <div class="" id="blocCondition">

                                            </div>

                                            <div class="row clearfix" id="plus">
                                                <div class="col-sm-12">
                                                    <div class="text-center">
                                                        <button type="button" class="plus px-4 btn btn-outline pt-2 btn-border-radius" onclick='addCondition();'>
                                                            <i class="material-icons">add_circle</i>
                                                            <span class="icon-name"> Condition </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center" style="margin-bottom: -50px">
                                                <button type="submit" class="btn btn-outline-info px-5 btn-border-radius"> Modifier </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>


    </script>

@endsection
