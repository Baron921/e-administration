@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title"> Ajouter une opération </h4>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-4 col-lg-5 offset-md-4" style="position: relative; top: -1rem;">
                        <div class="breadcrumb breadcrumb-style butonback">
                            @if(Auth::user()-> role == "superAdmin")

                                <a href="{{route('operation.listOperation')}}"
                                   data-id="#" id="allCategorie" class="">
                                    <button class="btn">
                                        <i class="fa fa-list-alt pr-2"> </i>  Liste opérations
                                    </button>
                                </a>

                            @elseif(Auth::user()-> role == "admin")
                                <a href="{{route('operation.category', [Auth::user()->id, Auth::user()->nom])}}"
                                   data-id="#" id="allCategorie" class="">
                                    <button class="btn">
                                        <i class="fa fa-list-alt pr-2"> </i>  Liste opérations
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="champ shadow-lg"> Créer une opération </h4>
                        </div>
                        <div class="body">
                            <form id="form_operation" method="post" action="{{route('operation.store')}}">
                                <div class="row clearfix">
                                    @csrf

                                    <div class="col-lg-12">
                                        <label for="" class="ml-3"> <strong> Type d'opération </strong> </label>
                                        <div class="input-field col s12">
                                            <select id="operation_type" name="type_id">
                                                <option disabled> Choisir un type </option>
                                                @foreach($type as  $types)
                                                    <option value="{{$types->id}}"> {{$types->nom}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-field col s12">
                                            <input type="text" data-length="10" name="nom">
                                            <label for="nom"> Nom </label>
                                        </div>
                                        <label id="nom-error" class="error editerror"
                                               for="nom"> </label>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-field col s12">
                                            <textarea id="" class="materialize-textarea" name="description" data-length="120"></textarea>
                                            <label for="description"> Description </label>
                                        </div>
                                        <label id="description-error" class="error editerror" for="description"> </label>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="input-field col s12">
                                            <input type="number" data-length="10" name="montant">
                                            <label for="montant"> Montant (en Franc CFA) </label>
                                        </div>
                                        <label id="montant-error" class="error editerror"
                                               for="montant"> </label>
                                    </div>

                                    <div class="col-lg-6" id="opera_piece">
                                        @include('admin.single_operaPiece')
                                    </div>

                                    <div class="col-lg-6" id="opera_institution">
                                        @include('admin.single_operaInstitution')
                                    </div>
                                </div>



                                <div class="row clearfix" id="blocCondition">

                                </div>

                                <div class="row clearfix" id="plus">

                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-outline-success px-5 btn-border-radius"> Créer </button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {
            $('#operation_type').multiselect();
        });

        $(document).ready(function() {
            $('#piece').multiselect();
        });

        $(document).ready(function() {
            $('#institution').multiselect();
        });


        function test(definir) {

            let condition = document.getElementById(definir).value;

            console.log(condition);
            console.log(definir);

            if (condition === "0"){
                document.getElementById(definir).value = 1;
                if (definir === 'conditionDefine'){
                    showInput();

                } else {

                }
            }else if (condition === "1") {
                document.getElementById(definir).value = 0;
                if (definir === 'conditionDefine'){
                    destroyInput();
                } else {

                }
            }else {
                document.getElementById(definir).value = " ";
            }
        }


        let inputCondition1 = " <div class=\"col-lg-12\">\n" +
            "<div class=\"input-field col s12\">\n" +
            "<textarea id=\"textarea2\" class=\"materialize-textarea\" name=\"condition[]\" data-length=\"120\"></textarea>\n" +
            "<label for=\"condition\"> Condition </label>\n" +
            "</div>\n" +
            "</div> ";

        let inputCondition2 = " <div class=\"for_destroy col-lg-6\" id='code'>\n" +
            "<div class=\"input-field col s12\">\n" +
            "<textarea id=\"\" class=\"materialize-textarea\" name=\"condition[]\"></textarea>\n" +
            "<label for=\"condition\"> Condition </label>\n" +
            "<span class='deleting' style='' onclick='deleteCondition();'>" +
            "<i class='fa fa-trash'></i> Supprimer </span>\n" +
            "</div>\n" +
            "</div> ";


        let plusCondition = "<div class=\"col-sm-12\">\n" +
            "<div class=\"text-center\">\n" +
            "<button type=\"button\" class=\"plus btn btn-outline pt-2 btn-border-radius\" onclick='addCondition();'>\n" +
            "<i class=\"material-icons\">add_circle</i>\n" +
            "<span  class=\"icon-name\"> Condition </span>\n" +
            "</button>\n" +
            "</div>\n" +
            "</div>";


        let blocCondition = $('#blocCondition');
        let plus = $('#plus');

        function showInput() {
            blocCondition.append(inputCondition1);
            plus.append(plusCondition);
        }

        function destroyInput() {
            blocCondition.html(" ");
            plus.html(" ");
        }

        let mycode = create_UUID();

        function addCondition() {
            blocCondition.append(inputCondition2);

            let idCode = document.getElementById('code').id += mycode;

            let id = document.getElementById(idCode);
            console.log(mycode);
            console.log(idCode);
        }

        function create_UUID(){
            let dt = new Date().getTime();
            let uid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                let r = (dt + Math.random()*16)%16 | 0;
                dt = Math.floor(dt/16);
                return (c==='x' ? r :(r&0x3|0x8)).toString(16);
            });
            return uid;
        }


        function deleteCondition() {
            $(".deleting").click(function() {
                $(this).parents(".for_destroy").fadeOut('slow', function () {
                    $(this).remove();
                });
            });
        }


        function another() {
            let other = document.getElementById('other').value;
            console.log(other);
        }


        function preview() {
            let total_file=document.getElementById("logo").files.length;

            let uploadImg = document.getElementById('uploadImg');
            let monLogo = $('#monLogo');

            uploadImg.style.position = "absolute";
            uploadImg.style.zIndex = -3;

            let title = document.getElementById('title');
            title.style.position = "absolute";
            title.style.zIndex = -3;

            for (let i=0;i<total_file;i++){
                let content = "<img class='img-thumbnail image_load' src='"+URL.createObjectURL(event.target.files[i])+"' style='padding: 10px 5px 0 5px;'> " +
                    "<br> <span class=\"deleting\" title='supprimer cette image'> <i class='fa fa-trash'> </i> Supprimer </span>";
                monLogo.append(content);

                // Supprimer une image uploader
                $(".deleting").click(function(){
                    $(this).parent(".img_buton").fadeOut('slow', function () {
                        $(this).remove();
                        let contentImg = $('#contentImg');
                        contentImg.html(" ");
                        contentImg.append("<div class=\"col-sm-12\">\n" +
                            "<h6 class=\"pt-2\" id=\"title\"> Télécharger votre logo </h6>\n" +
                            "<div class=\"file-field pl-3 pr-1 pt-4\">\n" +
                            "<a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadImg\">\n" +
                            "<i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                            "<input type=\"file\" name=\"logo\" id=\"logo\"\n" +
                            "onchange=\"preview();\" accept=\".jpeg, .jpg, .png\">\n" +
                            "</a>\n" +
                            "<div class=\"file-path-wrapper \">\n" +
                            "<div class=\"form-group\">\n" +
                            "<input class=\"file-path validate\" name=\"logo\"\n" +
                            "type=\"hidden\" placeholder=\"Télécharger un logo\">\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "<div class='img_buton' id='monLogo'> </div>")
                    });
                    $('#images').val("");
                });
            }
        }


    </script>


@endsection