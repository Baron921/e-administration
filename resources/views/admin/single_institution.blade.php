<table class="table table-hover js-basic-example contact_list">
    <thead>
    <tr>
        <th> #</th>
        <th> Logo</th>
        <th> Catégorie</th>
        <th> Nom</th>
        <th> Adresse</th>
        <th> Contact</th>
        <th> Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($institutions as $institution)
        <tr id="categorie{{$institution->slug}}">
            <td> {{$institution->id}} </td>
            @if(substr($institution->logo, 0, 4) == "logo")
                <td class=""><img src="/uploads/Institutions/{{$institution->logo}}" width="80px" class="shadow p-2"></td>
            @else
                <td class=""><img src="/uploads/Categorie/{{$institution->logo}}" width="80px" class="shadow p-2"></td>
            @endif
            <td><i class="material-icons">account_balance</i> <span class="icon-name"> {{$institution->categorie->nom}} </span>
            </td>
            <td><i class="material-icons">person</i> <span class="icon-name"> {{$institution->nom}} </span> </td>
            <td><i class="material-icons">room</i> <span class="icon-name"> {{$institution->adresse}} </span></td>
            <td><i class="material-icons">call</i> <span class="icon-name"> {{$institution->contact}} </span></td>
            <td>
                <button class="bg-light-blue btn-circle waves-effect waves-circle waves-float institutionUpdate tblctBtn"
                        data-id="{{$institution}}" data-toggle="modal"
                        data-url="{{route('institution.update', $institution->id)}}"
                        data-target="#institutionModal" title="Voir détail" alt="Voir détail">
                    <i class="material-icons">remove_red_eye</i>
                </button>

                <button class="btn-danger btn-circle waves-effect waves-circle waves-float institutionDelete tblActBtn"
                        data-id="{{$institution->id}}" data-code="categorie{{$institution->slug}}"
                        data-url="{{route('institution.destroy', $institution->id)}}"
                        title="Supprimer" alt="Supprimer">
                    <i class="material-icons">delete</i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@section('scripts')

    <script>

        function change() {
            document.getElementById('pushCreate').innerHTML = " ";
            document.getElementById('pushCreate').innerHTML += "Créer une institution\n" +
                "                                <i class=\"fa fa-angle-up pull-right pr-4\" data-toggle=\"collapse\" data-target=\"#create\" onclick=\"changed();\"></i>";
        }

        function changed() {
            document.getElementById('pushCreate').innerHTML = " ";
            document.getElementById('pushCreate').innerHTML += "Créer une institution\n" +
                "                                <i class=\"fa fa-angle-down pull-right pr-4\" data-toggle=\"collapse\" data-target=\"#create\" onclick=\"\"></i>";
        }


        let contentImg = $('#contentImg');
        let logoContainer = $("#logoContainer");


        /* FONCTION FOR CREATE */

        function preview() {
            let total_file = document.getElementById("logo").files.length;

            let uploadImg = document.getElementById('uploadImg');
            let monLogo = $('#monLogo');

            uploadImg.style.position = "absolute";
            uploadImg.style.zIndex = -3;

            let title = document.getElementById('title');
            title.style.position = "absolute";
            title.style.zIndex = -3;

            for (let i = 0; i < total_file; i++) {
                let content = "<img class='img-thumbnail image_load' src='" + URL.createObjectURL(event.target.files[i]) + "' style='padding: 10px 5px 0 5px;'> " +
                    "<br> <span class=\"deleting\" title='supprimer cette image'> <i class='fa fa-trash'> </i> Supprimer </span>";
                monLogo.append(content);

                // Supprimer une image uploader
                $(".deleting").click(function () {
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


        /* FONCTION FOR UPDATE */

        function view() {
            let total_file = document.getElementById("logoUpdate").files.length;

            let uploadLogo = document.getElementById('uploadLogo');
            uploadLogo.style.position = "absolute";
            uploadLogo.style.zIndex = -3;
            let title = document.getElementById('titles');
            title.style.position = "absolute";
            title.style.zIndex = -3;


            for (let i = 0; i < total_file; i++) {
                let contentLogo = $('#contentLogo');
                let singleLogo = "<img class='img-thumbnail image_load' src='" + URL.createObjectURL(event.target.files[i]) + "' style='padding: 10px 5px 0 5px;'> " +
                    "<br> <span class=\"deleting\" title='supprimer cette image'> <i class='fa fa-trash'> </i> Supprimer </span>";
                contentLogo.append(singleLogo);

                // Supprimer une image uploader
                $(".deleting").click(function () {
                    $(this).parent(".img_buton").fadeOut('slow', function () {
                        $(this).remove();
                        let imgLogo = $('#imgLogo');
                        imgLogo.html(" ");
                        imgLogo.append(" <div class=\"col-sm-12\">\n" +
                            "<h6 class=\"pt-2\" id=\"titles\"> Télécharger votre logo </h6>\n" +
                            "<div class=\"file-field pl-3 pr-1 pt-4\" id=\"inputLogo\">\n" +
                            "<a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadLogo\">\n" +
                            "<i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                            "<input type=\"file\" name=\"logoUpdate\" id=\"logoUpdate\"\n" +
                            "onchange=\"view();\" accept=\".jpeg, .jpg, .png\">\n" +
                            "</a>\n" +
                            "<div class=\"file-path-wrapper \">\n" +
                            "<div class=\"form-group\">\n" +
                            "<input class=\"file-path validate\" name=\"logoUpdate\" type=\"hidden\" id=\"inputHidden\"\n" +
                            "placeholder=\"Télécharger un logo\">\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "</div>\n" +
                            "<div class='img_buton' id=\"contentLogo\"> </div> ");
                    });
                    $('#images').val("");


                });
            }
        }


        /* DEBUT --> Vide la div contenant le button upload et le recharge instantanément */

        $(document).on('click', '.addIns', function () {

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
                "<div class='img_buton' id='monLogo'> </div>");
        });


        /* DEBUT --> Update d'une institution */

        $(document).on('click', '.institutionUpdate', function () {
            let institution = $(this).data('id');
            let url = $(this).data('url');
            $('#id_update').attr('value', institution.id);
            $('#nom').attr('value', institution.nom);
            $('#adresse').attr('value', institution.adresse);
            $('#contact').attr('value', institution.contact);
            $('#email').attr('value', institution.email);
            $('#siteweb').attr('value', institution.siteweb);
            $('#descriptions').text(institution.description);
            $('#form_institution_update').attr('action', url);

            $('#name-center').text(institution.nom);
            $('#user-name').text(institution.categorie.nom);
            console.log(institution.description);

            // Affichage des images

            $("#logoContainer").html(" ");
            let baseUrl = window.location.origin;

            let logo = institution.logo;

            let basePath;

            if (logo.substr(0, 4) === "logo"){
                basePath = baseUrl + "/uploads/Institutions/";
            }else {
                basePath = baseUrl + "/uploads/Categorie/";
            }

            let logoPath = basePath + logo;

            let singleLogo = "" +
                "<img class='user-image shadow-lg' src='" + logoPath + "'>" +
                "<br>";
            logoContainer.append(singleLogo);

            let imgLogo = $('#imgLogo');
            imgLogo.html(" ");

            imgLogo.append(" <div class=\"col-sm-12\">\n" +
                "<h6 class=\"pt-2\" id=\"titles\"> Télécharger votre logo </h6>\n" +
                "<div class=\"file-field pl-3 pr-1 pt-4\" id=\"inputLogo\">\n" +
                "<a class=\"btn-floating purple-gradient mt-0 float-let\" id=\"uploadLogo\">\n" +
                "<i class=\"fas fa-cloud-upload-alt\" aria-hidden=\"true\"> </i>\n" +
                "<input type=\"file\" name=\"logoUpdate\" id=\"logoUpdate\"\n" +
                "onchange=\"view();\" accept=\".jpeg, .jpg, .png\">\n" +
                "</a>\n" +
                "<div class=\"file-path-wrapper \">\n" +
                "<div class=\"form-group\">\n" +
                "<input class=\"file-path validate\" name=\"logoUpdate\" type=\"hidden\" id=\"inputHidden\"\n" +
                "placeholder=\"Télécharger un logo\">\n" +
                "</div>\n" +
                "</div>\n" +
                "</div>\n" +
                "</div>\n" +
                "<div class='img_buton' id=\"contentLogo\"> </div> ");

        });


        /* DEBUT --> Delete d'une institution */

        $(document).on('click', '.institutionDelete', function () {
            let institution = $(this).data('id');
            let url = $(this).data('url');
            $('#id_delete').attr('value', institution.id);
            $('#form_institution_update').attr('action', url);
            console.log(institution);
        });


    </script>

@endsection



