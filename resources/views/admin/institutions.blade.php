@extends('admin.layout.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title"> Rubrique Institution </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix" id="listCategorie">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h4 class="champ"> Institutions disponible </h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                                            <button type="button" class="btn btn-outline-primary pt-2 btn-border-radius addIns"
                                                    data-toggle="modal" data-target="#createInstitution">
                                                <i class="material-icons">add_circle</i>
                                                <span class="icon-name"> institution </span>
                                            </button>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive" id="table-institution">
                                                @include('admin.single_institution')
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
    <div class="modal fade" id="createInstitution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <h4 class="champ" id="pushCreate"> Créer une institution </h4>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="m-b-20">
                                    <div class="body">
                                        <form id="form_institution" method="POST" action="{{route('institution.store')}}" enctype="">
                                            <div class="row clearfix">
                                                @csrf
                                                <div class="col-sm-4">
                                                    <div class="input-field col s12">
                                                        {{--<span> <i class="fa fa-user pull-left" style=""> </i> </span>--}}
                                                        <input type="text" data-length="10" name="nom">
                                                        <label for="nom"> Nom </label>
                                                    </div>
                                                    <label id="nom-error" class="error editerror" for="nom"></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-field col s12">
                                                        <input type="text" data-length="10" name="adresse">
                                                        <label for="adresse"> Adresse </label>
                                                    </div>
                                                    <label id="adresse-error" class="error editerror" for="adresse"></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-field col s12">
                                                        <input type="text" data-length="10" name="contact">
                                                        <label for="contact"> Contact </label>
                                                    </div>
                                                    <label id="contact-error" class="error editerror" for="contact"></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-field col s12">
                                                        <input type="email" class="" name="email">
                                                        <label for="email">Email</label>
                                                    </div>
                                                    <label id="email-error" class="error editerror" for="email"></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-field col s12">
                                                        <input type="text" data-length="10" name="siteweb">
                                                        <label for="siteweb"> Site web </label>
                                                    </div>
                                                    <label id="siteweb-error" class="error editerror" for="siteweb"></label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="input-field col s12">
                                                        <textarea id="description" class="materialize-textarea"
                                                                  name="description" data-length="120"></textarea>
                                                        <label for="description"> Description </label>
                                                    </div>
                                                    <label id="description-error" class="error editerror" for="description">  </label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-radio">
                                                        @foreach($categories as $category)
                                                            <label class="pr-5">
                                                                <input name="categorie_id" type="radio"
                                                                       value="{{$category->id}}"/>
                                                                <span> {{$category->nom}} </span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                    <label id="categorie_id-error" class="error editerror" for="categorie_id"></label>
                                                </div>

                                                <div class="col-sm-6 offset-lg-3 offset-md-3">
                                                    <div class="text-center uploaded shadow-lg px-3" id="contentImg">
                                                        <div class="col-sm-12">
                                                            <h6 class="pt-2" id="title"> Télécharger votre logo </h6>
                                                            <div class="file-field pl-3 pr-1 pt-4">
                                                                <a class="btn-floating purple-gradient mt-0 float-let" id="uploadImg">
                                                                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"> </i>
                                                                    <input type="file" name="logo" id="logo"
                                                                           onchange="preview();" accept=".jpeg, .jpg, .png">
                                                                </a>
                                                                <div class="file-path-wrapper ">
                                                                    <div class="form-group">
                                                                        <input class="file-path validate" name="logo"
                                                                               type="hidden" placeholder="Télécharger un logo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='img_buton' id='monLogo'> </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <button type="reset" class="btn-hover color-2" data-toggle="modal"
                                                        data-target="#createInstitution"
                                                        onclick="changed();" title="Annuler la création puis fermer">
                                                    FERMER
                                                </button>

                                                <button type="submit" class="btn-hover color-8" id="">
                                                    CREER
                                                </button>
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
    <div class="modal fade" id="institutionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="profile-header headheight bg-dark">
                <div class="user-name" id="user-name" style="font-weight: bold">John Smith</div>
                <div class="name-center text-center" id="name-center" style="font-size: 18px;">Software Engineer</div>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="carder">
                                <div class="">
                                    <div class="contact-grid" id="logoContainer">

                                    </div>
                                    {{--<h2 class="card-inside-title"></h2>
                                    <div class="demo-switch">
                                        <div class="switch">
                                            <label>
                                                OFF
                                                <input type="checkbox">
                                                <span class="lever"></span>
                                                ON
                                            </label>
                                        </div>
                                    </div>--}}
                                    <div class="body" id="crate">
                                        <form id="form_institution_update" method="POST">
                                            <div class="row clearfix">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" id="id_update">
                                                <div class="col-sm-4">
                                                    <div class="col s12">
                                                        <label for="nom" class="color"> Nom </label>
                                                        <input id="nom" type="text" data-length="10" name="nom">
                                                    </div>
                                                    <label id="nom-error" class="error editerror" for="nom"></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="col s12">
                                                        <label for="adresse" class="color"> Adresse </label>
                                                        <input id="adresse" type="text" data-length="10" name="adresse">
                                                    </div>
                                                    <label id="adresse-error" class="error editerror" for="adresse"></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="col s12">
                                                        <label for="contact" class="color"> Contact </label>
                                                        <input id="contact" type="text" data-length="10" name="contact">
                                                    </div>
                                                    <label id="contact-error" class="error editerror" for="contact"></label>
                                                </div>
                                                <div class="col-sm-6 mt-4">
                                                    <div class="col s12">
                                                        <label for="email" class="color"> Email </label>
                                                        <input id="email" type="email" class="validate" name="email">
                                                    </div>
                                                    <label id="email-error" class="error editerror" for="email"></label>
                                                </div>
                                                <div class="col-sm-6 mt-4">
                                                    <div class="col s12">
                                                        <label for="siteweb" class="color"> Site web </label>
                                                        <input id="siteweb" type="text" data-length="10" name="siteweb">
                                                    </div>
                                                    <label id="siteweb-error" class="error editerror" for="siteweb"></label>
                                                </div>
                                                <div class="col-sm-12 my-4">
                                                    <div class="col s12">
                                                        <label for="description" class="color"> Description </label>
                                                        <textarea id="descriptions" class="materialize-textarea"
                                                                  name="description" data-length="120"></textarea>
                                                    </div>
                                                    <label id="description-error" class="error editerror" for="description"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 my-4">
                                                <div class="form-check form-check-radio">
                                                    @foreach($categories as $category)
                                                        <label class="pr-5">
                                                            <input name="categorie_id" type="radio"
                                                                   value="{{$category->id}}"/>
                                                            <span> {{$category->nom}} </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                                <label id="categorie_id-error" class="error editerror" for="categorie_id"></label>
                                            </div>
                                            <div class="col-sm-6 offset-lg-3 offset-md-3">
                                                <div class="text-center uploaded shadow-lg px-3" id="imgLogo">
                                                    <div class="col-sm-12">
                                                        <h6 class="pt-2" id="titles"> Télécharger votre logo </h6>
                                                        <div class="file-field pl-3 pr-1 pt-4" id="inputLogo">
                                                            <a class="btn-floating purple-gradient mt-0 float-let" id="uploadLogo">
                                                                <i class="fas fa-cloud-upload-alt" aria-hidden="true"> </i>
                                                                <input type="file" name="logoUpdate" id="logoUpdate"
                                                                       onchange="view();" accept=".jpeg, .jpg, .png">
                                                            </a>
                                                            <div class="file-path-wrapper ">
                                                                <div class="form-group">
                                                                    <input class="file-path validate" name="logoUpdate" type="hidden" id="inputHidden"
                                                                           placeholder="Télécharger un logo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='img_buton' id="contentLogo"> </div>
                                                </div>
                                                <label id="logoUpdate-error" class="error editerror" for="logoUpdate"></label>
                                            </div>
                                            <div class="pull-right">
                                                <button type="reset" class="btn-hover color-2"
                                                        title="Annuler la création puis fermer" data-dismiss="modal">
                                                    FERMER
                                                </button>

                                                <button type="submit" class="btn-hover color-8" id="">
                                                    MODIFIER
                                                </button>
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

