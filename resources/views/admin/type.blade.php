@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title"> Rubrique Type / Opération </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h4 class="champ"> Type d'opération disponible </h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                                            <button type="button" class="btn btn-outline-primary pt-2 btn-border-radius"
                                                    data-toggle="modal" data-target="#createType">
                                                <i class="material-icons">add_circle</i>
                                                <span class="icon-name"> type </span>
                                            </button>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive" id="table-type">
                                                @include('admin.single_type')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal: modalQuickView -->
    <div class="modal fade" id="createType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <h4 class="champ shadow-lg"> Ajouter type d'opération </h4>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="m-b-2">
                                    <div class="body">
                                        <form id="form_type" method="POST" action="{{route('type.store')}}">
                                            <div class="row clearfix">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <div class="input-field col s12">
                                                        <input type="text" data-length="10" name="nom">
                                                        <label for="nom" class=""> Nom </label>
                                                    </div>
                                                    <label id="nom-error" class="error editerror" for="nom"></label>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="input-field col s12">
                                                        <textarea id="" class="materialize-textarea"
                                                                  name="description" data-length="120"></textarea>
                                                        <label for="description" class=""> Description </label>
                                                    </div>
                                                    <label id="description-error" class="error editerror"
                                                           for="description"> </label>
                                                </div>
                                            </div>

                                            <div class="text-center actionButon shado">
                                                <div class="col-md-12">
                                                    <button type="reset" class="btn-hover color-2" data-toggle="modal"
                                                            data-target="#createType"
                                                            title="Annuler la création puis fermer">
                                                        FERMER
                                                    </button>

                                                    <button type="submit" class="btn-hover color-8" id="">
                                                        CREER
                                                    </button>
                                                </div>
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

    <!-- Modal: modalQuickView -->
    <div class="modal fade" id="updateType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <h4 class="champ shadow-lg" id="monType"> Modifier </h4>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="m-b-2">
                                    <div class="body">
                                        <form id="form_type_update" method="POST">
                                            <div class="row clearfix">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" id="idUpdate">
                                                <div class="col-sm-12">
                                                    <div class="col s12">
                                                        <label for="nom" class="color"> Nom </label>
                                                        <input type="text" data-length="10" name="nom" id="nom">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col s12">
                                                        <label for="description" class="color"> Description </label>
                                                        <textarea id="description" class="materialize-textarea"
                                                                  name="description" data-length="120">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center actionButon shado">
                                                <div class="col-md-12">
                                                    <button type="reset" class="btn-hover color-2" data-toggle="modal"
                                                            data-target="#updateType"
                                                            title="Annuler la création puis fermer">
                                                        FERMER
                                                    </button>

                                                    <button type="submit" class="btn-hover color-8" id="">
                                                        CREER
                                                    </button>
                                                </div>
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