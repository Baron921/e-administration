z<table class="table table-hover js-basic-example contact_list">
    <thead>
    <tr>
        <th> # </th>
        <th> Logo </th>
        <th> Nom </th>
        <th> Code </th>
        <th> Description </th>
        <th> Action </th>
    </tr>
    </thead>

    <tbody>
    @foreach($categories as $category)
        <tr id="categorie{{$category->slug}}">
            <td> {{$category->id}} </td>
            <td class=""> <img src="/uploads/Categorie/{{$category->logo}}" width="80px" class="shadow p-2"> </td>
            <td> {{$category->nom}} </td>
            <td> {{$category->code}} </td>
            <td> {{$category->description}} </td>
            <td>
                <button class="bg-light-blue btn-circle waves-effect waves-circle waves-float categorieUpdate tblctBtn"
                        data-id="{{$category}}"  data-toggle="modal" data-url="{{route('categorie.update', $category->id)}}"
                        data-target="#exampleModal" title="Mettre à jour" alt="Mettre à jour">
                    <i class="material-icons">mode_edit</i>
                </button>

                <button class="btn-danger btn-circle waves-effect waves-circle waves-float categorieDelete tblActBtn"
                        data-id="{{$category->id}}" data-code="categorie{{$category->slug}}" data-toggle="moal" data-url="{{route('categorie.destroy', $category->id)}}"
                        data-target="#exampleModalDelete" title="Supprimer" alt="Supprimer">
                    <i class="material-icons">delete</i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@section('scripts')

    <script>

        function vider(){
            document.getElementById("button_creer").innerHTML="";
        }

        function afficher() {
            document.getElementById("button_creer").innerHTML += "<button type=\"button\" class=\"btn btn-primary create\" title=\"cliquez pour créer une nouvelle catégorie\"\n" +
                "data-toggle=\"collapse\" data-target=\"#demo\" onclick=\"vider()\">\n" +
                "créer catégorie\n" +
                "</button>"
        }

        $(document).on('click', '.create', function () {
           let contentImg = $ ('#contentImg');
            contentImg.html(" ");

            contentImg.append(" <div class=\"col-sm-12\">\n" +
                "                                                                    <h6 class=\"pt-2\" id=\"title\"> Télécharger votre logo </h6>\n" +
                "                                                                    <div class=\"file-field pl-3 pr-1 pt-4\">\n" +
                "                                                                        <a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadImg\">\n" +
                "                                                                            <i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                "                                                                            <input type=\"file\" name=\"logo\" id=\"logo\" onchange=\"preview();\"\n" +
                "                                                                                   accept=\".jpeg, .jpg, .png\">\n" +
                "                                                                        </a>\n" +
                "                                                                        <div class=\"file-path-wrapper \">\n" +
                "                                                                            <div class=\"form-group\">\n" +
                "                                                                                <input class=\"file-path validate\" name=\"logo\" type=\"hidden\"\n" +
                "                                                                                       placeholder=\"Télécharger un logo\">\n" +
                "                                                                            </div>\n" +
                "                                                                        </div>\n" +
                "                                                                    </div>\n" +
                "                                                                </div>\n" +
                "                                                                <div class='img_buton' id='imgLogo'> </div> ");
        });

        $(document).on('click', '.categorieUpdate', function () {
            let category = $(this).data('id');
            let url = $(this).data('url');
            $('#id_update').attr('value', category.id);
            $('#nom').attr('value', category.nom);
            $('#code').attr('value', category.code);
            $('#description').text(category.description);
            $('#update_form_categorie').attr('action', url);
            $('#exampleModalLongTitle').text("Modifier "+category.nom);


            // Affichage des images

            let image = $("#image");
            let imageContainer = $('#imageContainer');
            image.html(" ");
            let uploadImg = document.getElementById('uploadImage');
            uploadImg.style.position = "absolute";
            uploadImg.style.zIndex = -3;
            let title = document.getElementById('titles');
            title.style.position = "absolute";
            title.style.zIndex = -3;

            let baseUrl = window.location.origin;
            let basePath = baseUrl+"/uploads/Categorie/";
            let logo = category.logo;

            let imagePath =  basePath+logo;

            let singleImage = "" +
                "<img class='img-thumbnail image_upload shadow-lg' src='"+imagePath+"'>" +
                "<br> <span class=\"deleting\" title='supprimer cette image'> <i class='fa fa-trash'> </i> Supprimer </span>";
            image.append(singleImage);

            // Supprimer une image uploader
            $(".deleting").click(function(){
                $(this).parent(".img_buton").fadeOut('slow', function () {
                    $(this).remove();
                });
                $('#images').val("");

                imageContainer.html(" ");
                imageContainer.append(" <div class=\"col-sm-12\">\n" +
                    "<h6 class=\"pt-2\" id=\"titles\"> Télécharger votre logo </h6>\n" +
                    "<div class=\"file-field pl-4 pr-1 pt-4\" id=\"imgLoad\">\n" +
                    "<a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadImage\">\n" +
                    "<i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                    "<input type=\"file\" name=\"logoUpdate\" id=\"logoUpdate\" onchange=\"view();\"\n" +
                    "accept=\".jpeg, .jpg, .png\">\n" +
                    "</a>\n" +
                    "<div class=\"file-path-wrapper \">\n" +
                    "<div class=\"form-group\">\n" +
                    "<input class=\"file-path validate\" name=\"logoUpdate\" type=\"hidden\"\n" +
                    "placeholder=\"Télécharger un logo\">\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "<div class='img_buton' id=\"image\"> </div> " );

            });

        });

        $(document).on('click', '.categorieDelete', function () {
            let id = $(this).data('id');
            let url = $(this).data('url');
            $('#id_delete').attr('value', id.id);
            $('#update_form_categorie').attr('action', url);
            console.log(id);
        });

        function preview() {
            let total_file=document.getElementById("logo").files.length;
            let uploadImg = document.getElementById('uploadImg');

            let contentImg = $('#contentImg');

            uploadImg.style.position = "absolute";
            uploadImg.style.zIndex = -3;
            let title = document.getElementById('title');
            title.style.position = "absolute";
            title.style.zIndex = -3;

            for (let i=0;i<total_file;i++){
                $("#imgLogo").append("<img class='img-thumbnail image_load' src='"+URL.createObjectURL(event.target.files[i])+"' style='padding: 10px 5px 0 5px;'> " +
                    "<br> <span class=\"deleting\" title='supprimer cette image'> <i class='fa fa-trash'> </i> Supprimer </span>");

                // Supprimer une image uploader
                $(".deleting").click(function(){
                    $(this).parent(".img_buton").fadeOut('slow', function () {
                        $(this).remove();
                    });
                    $('#images').val("");
                    contentImg.html(" ");
                    contentImg.append("<div class=\"col-sm-12\">\n" +
                        "                                                                    <h6 class=\"pt-2\" id=\"title\"> Télécharger votre logo </h6>\n" +
                        "                                                                    <div class=\"file-field pl-3 pr-1 pt-4\">\n" +
                        "                                                                        <a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadImg\">\n" +
                        "                                                                            <i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                        "                                                                            <input type=\"file\" name=\"logo\" id=\"logo\" onchange=\"preview();\"\n" +
                        "                                                                                   accept=\".jpeg, .jpg, .png\">\n" +
                        "                                                                        </a>\n" +
                        "                                                                        <div class=\"file-path-wrapper \">\n" +
                        "                                                                            <div class=\"form-group\">\n" +
                        "                                                                                <input class=\"file-path validate\" name=\"logo\" type=\"hidden\"\n" +
                        "                                                                                       placeholder=\"Télécharger un logo\">\n" +
                        "                                                                            </div>\n" +
                        "                                                                        </div>\n" +
                        "                                                                    </div>\n" +
                        "                                                                </div>\n" +
                        "                                                                <div class='img_buton' id='imgLogo'> </div>");
                });
            }
        }

        function view() {
            let total_file=document.getElementById("logoUpdate").files.length;

            let imageContainer = $('#imageContainer');

            let uploadImg = document.getElementById('uploadImage');
            uploadImg.style.position = "absolute";
            uploadImg.style.zIndex = -3;
            let title = document.getElementById('titles');
            title.style.position = "absolute";
            title.style.zIndex = -3;

            for (let i=0;i<total_file;i++){
                $("#image").append("<img class='img-thumbnail logo_load' src='"+URL.createObjectURL(event.target.files[i])+"' style='padding: 5px 5px 0 5px;'> " +
                    "<br> <span class=\"deleting\" title='supprimer cette image'> <i class='fa fa-trash'> </i> Supprimer </span>");

                // Supprimer une image uploader
                $(".deleting").click(function(){
                    $(this).parent(".img_buton").fadeOut('slow', function () {
                        $(this).remove();
                        imageContainer.html(" ");
                        imageContainer.append(" <div class=\"col-sm-12\">\n" +
                            "<h6 class=\"pt-2\" id=\"titles\"> Télécharger votre logo </h6>\n" +
                            "<div class=\"file-field pl-4 pr-1 pt-4\" id=\"imgLoad\">\n" +
                            "<a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadImage\">\n" +
                            "<i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                            "<input type=\"file\" name=\"logoUpdate\" id=\"logoUpdate\" onchange=\"view();\"\n" +
                            "accept=\".jpeg, .jpg, .png\">\n" +
                            "</a>\n" +
                            "<div class=\"file-path-wrapper \">\n" +
                            "<div class=\"form-group\">\n" +
                            "<input class=\"file-path validate\" name=\"logo\" type=\"hidden\"\n" +
                            "placeholder=\"Télécharger un logo\">\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "<div class='img_buton' id=\"image\"> </div> ");
                    });
                    $('#images').val("");
                });

            }
        }

    </script>

@endsection