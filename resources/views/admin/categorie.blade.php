@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="row">
            <div class="container">
                <div class="container-fluid">
                    <div class="block-header">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="breadcrumb breadcrumb-style">
                                    <li>
                                        <h4 class="page-title"> Rubrique Catégorie </h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Button collapse présentant les inputs de création de catégorie ==> Début--}}

                    <div class="card_categorie">
                        <div id="button_creer" class="">
                            <button type="button" class="btn btn-primary create"
                                    title="cliquez pour créer une nouvelle catégorie"
                                    data-toggle="collapse" data-target="#demo" onclick="vider();">
                                créer catégorie
                            </button>
                        </div>
                    </div>

                {{-- Button collapse présentant les inputs de création de catégorie ==> Fin--}}


                <!-- Créer une nouvelle categorie ==> Début -->

                    <div class="">
                        <div id="demo" class="row clearfix collapse">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <form id="form_categorie" method="POST" action="{{route('categorie.store')}}">
                                            @csrf
                                            <h4 class="champ"> Créer une catégorie </h4>
                                            <fieldset class="input_categorie">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12 mt-4">
                                                            <div class="form-group form-flat ">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="nom"
                                                                           placeholder="Nom de la catégorie *">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group form-float">
                                                                <div class="input-field">
                                                                    <div class="form-line">
                                                                        <textarea id="" class="form-control materialize-textarea" placeholder="Description de la catégorie *" name="description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5 offset-lg-3 offset-md-3">
                                                            <div class="text-center uploaded shadow-lg px-3" id="contentImg">
                                                                <div class="col-sm-12">
                                                                    <h6 class="pt-2" id="title"> Télécharger votre logo </h6>

                                                                    <div class="file-field pl-3 pr-1 pt-4">
                                                                        <a class="btn-floating purple-gradient mt-0 float-let" id="uploadImg">
                                                                            <i class="fas fa-cloud-upload-alt" aria-hidden="true"> </i>
                                                                            <input type="file" name="logo" id="logo" onchange="preview();"
                                                                                   accept=".jpeg, .jpg, .png">
                                                                        </a>
                                                                        <div class="file-path-wrapper ">
                                                                            <div class="form-group">
                                                                                <input class="file-path validate" name="logo" type="text"
                                                                                       placeholder="Télécharger un logo">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='img_buton' id='imgLogo'> </div>
                                                            </div>
                                                            <label id="logo-error" class="error editerror" for="logo"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="pull-right">
                                                <button type="reset" class="btn-hover color-10" data-toggle="collapse"
                                                        data-target="#demo"
                                                        onclick="afficher()" title="Annuler la création puis fermer">
                                                    FERMER
                                                </button>

                                                <button type="submit" class="btn-hover color-5" id="">
                                                    CREER
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Créer une nouvelle categorie ==> Fin -->


                    <!-- Categorie d'oeuvre disponible ==> Début -->

                    <div class="row clearfix" id="listCategorie">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                    <h4 class="champ"> Catégorie disponible </h4>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="card">
                                                <div class="body">
                                                    <div class="table-responsive" id="table-categorie">
                                                        @include('admin.single_categorie')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categorie d'oeuvre disponible ==> Fin -->
                </div>
            </div>
        </div>
    </section>


    <!-- Modal pour faire un UPDATE sur une categorie ==> Début -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header shadow-lg l-bg-indigo py-4 mx-4">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Modifier </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="body">
                        <form id="update_form_categorie" method="post">
                            {{csrf_field()}}
                            @method('put')
                            <fieldset class="input_categorie">
                                <input type="hidden" id="id_update">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group form-flat ">
                                                <div class="form-line">
                                                    <label> <strong> Nom </strong> </label>
                                                    <input type="text" class="form-control" name="nom" id="nom"
                                                           placeholder="Nom de la catégorie d'institution *">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="mt-4"> <strong> Description </strong> </label>
                                                    <textarea class="form-control" name="description" id="description"
                                                              placeholder="Description de la catégorie d'institution *"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-8 offset-lg-2 offset-md-2">
                                            <div class="text-center uploaded shadow-lg px-3" id="imageContainer">
                                                <div class="col-sm-12">
                                                    <h6 class="pt-2" id="titles"> Télécharger votre logo </h6>
                                                    <div class="file-field pl-4 pr-1 pt-4" id="imgLoad">
                                                        <a class="btn-floating purple-gradient mt-0 float-let" id="uploadImage">
                                                            <i class="fas fa-cloud-upload-alt" aria-hidden="true"> </i>
                                                            <input type="file" name="logoUpdate" id="logoUpdate" onchange="view();"
                                                                   accept=".jpeg, .jpg, .png">
                                                        </a>
                                                        <div class="file-path-wrapper ">
                                                            <div class="form-group">
                                                                <input class="file-path validate" name="logoUpdate" type="hidden"
                                                                       placeholder="Télécharger un logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='img_buton' id="image"> </div>
                                            </div>
                                            <label id="logoUpdate-error" class="error editerror" for="logoUpdate"></label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="pull-right">

                                <button type="button" class="btn-hover color-10" data-dismiss="modal">
                                    Annuler
                                </button>

                                <button type="submit" class="btn-hover color-5">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour faire un update sur une categorie ==> Fin -->


@endsection


@section('scripts')
    <script>

    </script>
@endsection


