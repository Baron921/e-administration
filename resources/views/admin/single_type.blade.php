<table class="table table-hover js-basic-example contact_list">
    <thead>
    <tr>
        <th> # </th>
        <th> Nom </th>
        <th> Code </th>
        <th> Description </th>
        <th> Action </th>
    </tr>
    </thead>

    <tbody>
    @foreach($type as $types)
        <tr id="type{{$types->slug}}">
            <td> {{$types->id}} </td>
            <td> {{$types->nom}} </td>
            <td> {{$types->code}} </td>
            <td style="width: 300px;"> {{$types->description}} </td>
            <td>
                <button class="bg-light-blue btn-circle waves-effect waves-circle waves-float typeUpdate tblctBtn"
                        data-id="{{$types}}"  data-toggle="modal" data-url="{{route('type.update', $types->id)}}"
                        data-target="#updateType" title="Voir détail" alt="Voir détail">
                    <i class="material-icons">edit</i>
                </button>

                <button class="btn-danger btn-circle waves-effect waves-circle waves-float typeDelete tblActBtn"
                        data-id="{{$types->id}}" data-code="type{{$types->slug}}" data-url="{{route('type.destroy', $types->id)}}"
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

        $(document).on('click', '.typeUpdate', function () {
            let type = $(this).data('id');
            let url = $(this).data('url');

            $('#idUpdate').attr('value', type.id);
            $('#nom').attr('value', type.nom);
            $('#description').text(type.description);
            $('#monType').text('MODIFIER '+type.nom);

            $('#form_type_update').attr('action', url);

            console.log(type);
        });

        $(document).on('click', '.typeDelete', function () {
            let type = $(this).data('id');
            let url = $(this).data('url');

            $('#id_delete').attr('value', type.id);
            $('#form_type_update').attr('action', url);
            console.log(type);
        });

    </script>

@endsection