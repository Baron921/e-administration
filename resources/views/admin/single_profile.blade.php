<div class="page-header header-filter" data-parallax="true"
     style="background-image:url({{asset('assets/images/0.jpg')}}); ">
</div>

<div class="main main-raised mb-5">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="">
                            <img src="/uploads/Institutions/{{$user->logo}}"
                                 class="img-raised rounded-circle img-fluid">
                        </div>
                    </div>
                    <div class="center">
                        <div class="profile_header">
                            <h3 class="my-3"> {{$user->categorie->nom}} </h3>

                            <h1> {{$user->nom}} </h1>

                            <h5 class="my-4">
                                <i class="material-icons" style="color: #0ba83b; font-size: 10px">lens</i>
                                {{$user->role}}
                            </h5>
                        </div>
                    </div>
                </div>


                {{--        BADGE          --}}

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="col-lg-12">
                                <div class="owl-carousel owl-teme owl-loaded owl-drag" id="single_slide_autoplay">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="width: 3314px;">

                                            <div class="owl-item cloned">
                                                <div class="item">
                                                    <div class="card infobox-5 cardInfo">
                                                        <div class="card-body">
                                                            <div class="clearfix">
                                                                <div class="float-left card-icon">
                                                                    <i class="material-icons col-green">account_balance</i>
                                                                </div>
                                                                <div class="float-right">
                                                                    <p class="text-right"> Institution </p>
                                                                    <div class="col-green">
                                                                        <h4 class="text-right mb-0">
                                                                            @if(count($users) <= 1)
                                                                                {{count($users)}} inscrit
                                                                            @else
                                                                                {{count($users)}} inscrits
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="Green mt-3 mb-0">
                                                                @if($user->role == 'superAdmin')
                                                                    <a href="{{route('institution.index')}}"> Lister des
                                                                        institutions </a>
                                                                @else
                                                                    <marquee>
                                                                        <span> {{$user->nom}} est la votre </span>
                                                                    </marquee>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="owl-item cloned">
                                                <div class="item">
                                                    <div class="card infobox-5 cardInfo">
                                                        <div class="card-body">
                                                            <div class="clearfix">
                                                                <div class="float-left card-icon">
                                                                    <i class="material-icons col-red"> screen_share </i>
                                                                </div>
                                                                <div class="float-right">
                                                                    <p class="text-right"> Opération </p>
                                                                    <div class="col-red">
                                                                        <h4 class="text-right mb-0">
                                                                            @if(count($op) <= 1)
                                                                                {{count($op)}} opération
                                                                            @else
                                                                                {{count($op)}} opérations
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($user->role == 'admin')
                                                                <marquee>
                                                                    <p class="text-muted mt-3 mb-0">
                                                                        {{ round((count($operation) * 100) / count($op)) }}
                                                                        %
                                                                        Opérations par vous
                                                                    </p>
                                                                </marquee>
                                                            @else
                                                                <p class="text-muted mt-3 mb-0">
                                                                    {{ round((count($operation) * 100) / count($op)) }}%
                                                                    Opérations par vous
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="owl-item cloned">
                                                <div class="item">
                                                    <div class="card infobox-5 cardInfo">
                                                        <div class="card-body">
                                                            <div class="clearfix">
                                                                <div class="float-left card-icon">
                                                                    <i class="material-icons col-orange">receipt</i>
                                                                </div>
                                                                <div class="float-right">
                                                                    <p class="text-right"> Pièces </p>
                                                                    <div class="col-orange">
                                                                        <h4 class="text-right mb-0">
                                                                            @if(count($pieces) <= 1)
                                                                                {{count($pieces)}} Pièce
                                                                            @else
                                                                                {{count($pieces)}} Pièces
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="Orange mt-3 mb-0">
                                                                @if($user->role == 'superAdmin')
                                                                    <a href="{{route('piece.index')}}"> Lister des
                                                                        pièces </a>
                                                                @else
                                                                    <marquee>
                                                                        <span> Nouvelle piece : {{$piece->nom}} </span>
                                                                    </marquee>
                                                                @endif
                                                            </p>
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
                </div>


                {{--        INFORMATIONS          --}}

                <div class="col-md-12 info">
                    <div class="row center info-box-2">
                        <div class="col-4 my-3">
                            @if(isset($user->adresse))
                                <h5> {{$user->adresse}} </h5>
                                <small> Adresse</small>
                            @else
                                <h5> Néant </h5>
                                <small> Adresse</small>
                            @endif
                        </div>
                        <div class="col-4 my-3">
                            @if(isset($user->contact))
                                <h5> {{$user->contact}} </h5>
                                <small> Contact</small>
                            @else
                                <h5> Néant </h5>
                                <small> Contact</small>
                            @endif
                        </div>
                        <div class="col-4 my-3">
                            <h5> {{count($operation)}} </h5>
                            <small> Opérations ajoutée</small>
                        </div>
                    </div>

                    <div class="center my-4">
                        <a href="#" class="btn btn-just-icon btn-link btn-dribbble">
                            <i class="fa fa-facebook" style="color: #0b51c5"> </i> </a>
                        <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                            <i class="fa fa-twitter" style=" color: #0D8BBD"></i></a>
                        <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest">
                            <i class="fa fa-google-plus" style="color: red;"></i></a>
                    </div>
                    <hr>
                </div>
            </div>

            {{--        MENU          --}}

            <div class="row clearfix menubloc">
                <div class="col-lg-3 col-md-12 menu">
                    <div class="card">
                        <h4 class="center" style="text-decoration: underline"> MENU </h4>
                        <div class="profile-tab-box">
                            <div class="p-l-25">
                                <ul class="nav" style="display: inline-block;">
                                    <li class="nav-item tab-all">
                                        <a class="nav-link show active" href="#project"
                                           data-toggle="tab"> A Propos </a>
                                    </li>

                                    <li class="nav-item tab-all p-t-10">
                                        <a class="nav-link" href="#timeline" data-toggle="tab"> Mes
                                            Opérations </a>
                                    </li>
                                    <li class="nav-item tab-all p-t-10">
                                        <a class="nav-link" href="#resetPassword" data-toggle="tab">
                                            Changer mot de passe </a>
                                    </li>
                                    <li class="nav-item tab-all p-t-10">
                                        <a class="nav-link setting" href="#usersettings" id="" data-toggle="tab"
                                           data-id="{{$user}}"
                                           data-url="{{route('user.update', $user->id)}}">
                                            Paramètres </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="tab-content">


                        {{--        ABOUT ME          --}}

                        <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2 class="center"><strong> A PROPOS </strong></h2>
                                        </div>
                                        <div class="btn-beige col-md-12">
                                            <h4 class="pt-2"> Infos générales </h4>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-md-12 col-12 b-r">
                                                    <p>
                                                        <strong> Categorie </strong>
                                                        <span class="text-muted pull-right"> {{$user->categorie_id}} </span>
                                                    </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-12 b-r">
                                                    <p>
                                                        <strong> Nom </strong>
                                                        <span class="text-muted pull-right"> {{$user->nom}} </span>
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-beige col-md-12 mb-4">
                                            <h4 class="pt-2" data-toggle="collapse"
                                                data-target="#coordonne"> Coordonnées </h4>
                                        </div>
                                        <div class="body collapse" id="coordonne">
                                            <div class="row">
                                                <div class="col-md-12 col-12 b-r">
                                                    @if(isset($user->adresse))
                                                        <p>
                                                            <strong> Adresse </strong>
                                                            <span class="text-muted pull-right"> {{$user->adresse}} </span>
                                                        </p>
                                                    @else
                                                        <p>
                                                            <strong> Adresse </strong>
                                                            <span class="text-muted pull-right"> Néant </span>
                                                        </p>
                                                    @endif
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-12 b-r">
                                                    @if(isset($user->contact))
                                                        <p>
                                                            <strong> Contact </strong>
                                                            <span class="text-muted pull-right"> {{$user->contact}} </span>
                                                        </p>
                                                    @else
                                                        <p>
                                                            <strong> Contact </strong>
                                                            <span class="text-muted pull-right"> Néant </span>
                                                        </p>
                                                    @endif
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-12 b-r">
                                                    <p>
                                                        <strong> Email </strong>
                                                        <span class="text-muted pull-right">
                                                            <a href="mailto:{{$user->email}}"> {{$user->email}} </a>
                                                        </span>
                                                    </p>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-12 b-r">
                                                    @if(isset($user->siteweb))
                                                        <p>
                                                            <strong> Site-Web </strong>
                                                            <span class="text-muted pull-right">
                                                                <a href="{{$user->siteweb}}" target="_blank"> {{$user->siteweb}} </a>
                                                            </span>
                                                        </p>
                                                    @else
                                                        <p>
                                                            <strong> Site-Web </strong>
                                                            <span class="text-muted pull-right"> Néant </span>
                                                        </p>
                                                    @endif
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-beige col-md-12 mb-3">
                                            <h4 class="pt-2" data-toggle="collapse"
                                                data-target="#description"> Description </h4>
                                        </div>
                                        <div class="body collapse" id="description">
                                            <p class="m-t-30 description"> {{$user->description}} </p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--        MY OPERATIONS          --}}

                        <div role="tabpanel" class="tab-pane" id="timeline" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2 class="center"><strong> MES OPERATIONS </strong></h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <div id="tableExport_wrapper"
                                             class="dataTables_wrapper dt-bootstrap4">
                                            <table id="tableExport"
                                                   class="display table table-hover table-checkable order-column m-t-20 width-per-100 dataTable"
                                                   role="grid" aria-describedby="tableExport_info">
                                                <thead>

                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="tableExport" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 5px;">#
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="tableExport" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 51px;">Nom
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="tableExport" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Code
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="tableExport" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 30px;">Montant
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="tableExport" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 253px;">Description
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody id="">
                                                @foreach($operation as $operations)
                                                    <tr role="row" class="odd">
                                                        <td class=""> {{$operations->id}} </td>
                                                        <td class="sorting_1"> {{$operations->nom}} </td>
                                                        <td> {{$operations->code}} </td>
                                                        <td> {{$operations->montant}} </td>
                                                        <td> {{$operations->description}} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--        RESET PASSWORD          --}}

                        <div role="tabpanel" class="tab-pane" id="resetPassword" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Security</strong> Paramètres </h2>
                                </div>
                                <div class="body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"
                                               placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"
                                               placeholder="New Password">
                                    </div>
                                    <button class="btn btn-info btn-round">Save Changes</button>
                                </div>
                            </div>

                        </div>

                        {{--        SETTINGS          --}}

                        <div role="tabpanel" class="tab-pane" id="usersettings" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2 class="center"><strong> PARAMETRES </strong></h2>
                                </div>
                                <div class="body">
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
                                            <div class="col-sm-6">
                                                <div class="col s12">
                                                    <label for="email" class="color"> Email </label>
                                                    <input id="email" type="email" class="validate" name="email">
                                                </div>
                                                <label id="email-error" class="error editerror" for="email"></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col s12">
                                                    <label for="siteweb" class="color"> Site web </label>
                                                    <input id="siteweb" type="text" data-length="10" name="siteweb">
                                                </div>
                                                <label id="siteweb-error" class="error editerror" for="siteweb"></label>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col s12">
                                                    <label for="description" class="color"> Description </label>
                                                    <textarea id="scription" class="materialize-textarea"
                                                              name="description" data-length="120"></textarea>
                                                </div>
                                                <label id="description-error" class="error editerror"
                                                       for="description"></label>
                                            </div>
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
                                            <label id="categorie_id-error" class="error editerror"
                                                   for="categorie_id"></label>
                                        </div>
                                        <div class="col-sm-6 offset-lg-3 offset-md-3">
                                            <div class="text-center uploaded shadow-lg px-3" id="imgLogo">
                                                <div class="col-sm-12">
                                                    <h6 class="pt-2" id="titles"> Télécharger votre logo </h6>
                                                    <div class="file-field pl-3 pr-1 pt-4" id="inputLogo">
                                                        <a class="btn-floating purple-gradient mt-0 float-let"
                                                           id="uploadLogo">
                                                            <i class="fas fa-cloud-upload-alt" aria-hidden="true"> </i>
                                                            <input type="file" name="logoUpdate" id="logoUpdate"
                                                                   onchange="view();" accept=".jpeg, .jpg, .png">
                                                        </a>
                                                        <div class="file-path-wrapper ">
                                                            <div class="form-group">
                                                                <input class="file-path validate" name="logoUpdate"
                                                                       type="hidden" id="inputHidden"
                                                                       placeholder="Télécharger un logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='img_buton' id="contentLogo"></div>
                                            </div>
                                            <label id="logoUpdate-error" class="error editerror"
                                                   for="logoUpdate"></label>
                                        </div>

                                        <div class="center">
                                            <button type="submit" class="btn-hover color-8" id="">
                                                Mettre à jour
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

@section('scripts')
    <script>

        $(document).on('click', '.setting', function () {
            let user = $(this).data('id');
            let url = $(this).data('url');
            $('#id_update').attr('value', user.id);
            $('#nom').attr('value', user.nom);
            $('#adresse').attr('value', user.adresse);
            $('#contact').attr('value', user.contact);
            $('#email').attr('value', user.email);
            $('#siteweb').attr('value', user.siteweb);
            $('#scription').text(user.description);
            $('#form_institution_update').attr('action', url);

            console.log(user.description);
        });

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


        function Export() {
            html2canvas(document.getElementById('tableExport'), {
                onrendered: function (canvas) {
                    let data = canvas.toDataURL();
                    let docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Opérations.pdf");
                }
            });
        }


        function imprimer(divName) {
            let printContents = document.getElementById(divName).innerHTML;
            let originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }


    </script>
@endsection
