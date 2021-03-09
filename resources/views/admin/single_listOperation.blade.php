

<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style">
                    <li>
                        <h4 class="page-title"> Rubrique Opération </h4>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix" id="listCategorie">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <h4 class="champ"> Opérations disponible </h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">

                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-hover js-basic-example contact_list">
                                            <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Nom </th>
                                                <th> Code </th>
                                                <th> Description </th>
                                                <th> Montant </th>
                                                <th> Condition </th>
                                                <th> Action </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($operations as $operation)
                                                <tr id="operation{{$operation->slug}}">
                                                    <td> {{$operation->id}} </td>
                                                    <td class="sm"> {{$operation->nom}} </td>
                                                    <td class="sm"> {{$operation->code}} </td>
                                                    <td class="coupeText"> {{$operation->description}} </td>
                                                    <td class="xs"> {{$operation->montant}} </td>
                                                    <td class="coupeText"> {{$operation->conditions[0]->condition}} </td>
                                                    <td>
                                                        <button class="bg-light-blue btn-circle waves-effect waves-circle waves-float operationUpdate tblctBtn"
                                                                data-id="{{$operation}}"  data-toggle="modal" data-url="{{route('operation.update', $operation->id)}}"
                                                                data-target="#operationUpdate" title="Voir détail" alt="Voir détail">
                                                            <i class="material-icons">edit</i>
                                                        </button>

                                                        <button class="btn-danger btn-circle waves-effect waves-circle waves-float operationDelete tblActBtn"
                                                                data-id="{{$operation->id}}" data-code="operation{{$operation->slug}}" data-url="{{route('operation.destroy', $operation->id)}}"
                                                                title="Supprimer" alt="Supprimer">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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

        $(document).on('click', '.operationUpdate', function () {
            let operation = $(this).data('id');
            let url = $(this).data('url');
            let conditions = operation.conditions;
            $('#idUpdate').attr('value', operation.id);
            $('#nom').attr('value', operation.nom);
            $('#code').attr('value', operation.code);
            $('#montant').attr('value', operation.montant);
            $('#description').text(operation.description);
            $('#user-name').text(operation.nom);
            $('#name-center').text(operation.description);
            $('#form_operation_update').attr('action', url);

            console.log(operation);

            let blocCondition = $('#blocCondition');
            blocCondition.html(" ");

            for (let i=0; i<conditions.length; i++){
                let listCondition = conditions[i].condition;
                let idCondition = conditions[i].id;

                let myCondition = "<div class=\"row clearfix\" id=\"\">\n" +
                    "<div class=\"col-lg-12\">\n" +
                    "<div class=\"input-fied col s12\">\n" +
                    "<label for=\"condition\" id='"+"labelCondition"+i+"'>  </label>\n" +
                    "<textarea id='"+"condition"+i+"' class=\"materialize-textarea\" name=\"condition["+idCondition+"][]\" data-length=\"120\"> </textarea>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</div> ";

                blocCondition.append(myCondition);

                console.log(listCondition);

                let incre = i+1;

                document.getElementById('labelCondition'+i).textContent = "Condition "+incre;

                document.getElementById('condition'+i).textContent = listCondition;
            }

            let opera_institution = $('#opera_institution');

            let institution = "";

            //opera_institution.html(" ");
            opera_institution.append();

        });
        
        
        $(document).on('click', '.operationDelete', function () {
            let operation = $(this).data('id');
            let code = $(this).data('code');
            let url = $(this).data('url');
            $('#idUpdate').attr('value', operation.id);
            $('#form_operation_update').attr('action', url);
        });


        let blocCondition = $('#blocCondition');
        let mycode = create_UUID();
        let inputCondition = " <div class=\"row clearfix for_destroy col-sm-12\" id='code'>\n" +
            "<div class=\"input-field col s12\">\n" +
            "<textarea id=\"\" class=\"materialize-textarea\" name=\"otherCondition[]\"></textarea>\n" +
            "<label for=\"condition\"> Condition </label>\n" +
            "<span class='deleting' style='' onclick='deleteCondition();'>" +
            "<i class='fa fa-trash'></i> Supprimer </span>\n" +
            "</div>\n" +
            "</div> ";

        function addCondition() {
            blocCondition.append(inputCondition);

            let idCode = document.getElementById('code').id += mycode;

            let id = document.getElementById(idCode);
            console.log(mycode);
            console.log(idCode);
        }

        function deleteCondition() {
            $(".deleting").click(function() {
                $(this).parents(".for_destroy").fadeOut('slow', function () {
                    $(this).remove();
                });
            });
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


    </script>

@endsection