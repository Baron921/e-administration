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
        @foreach($pieces as $piece)
        <tr id="piece{{$piece->slug}}">
            <td> {{$piece->id}} </td>
            <td> {{$piece->nom}} </td>
            <td> {{$piece->code}} </td>
            <td style="width: 300px;"> {{$piece->description}} </td>
            <td>
                <button class="bg-light-blue btn-circle waves-effect waves-circle waves-float pieceUpdate tblctBtn"
                        data-id="{{$piece}}"  data-toggle="modal" data-url="{{route('piece.update', $piece->id)}}"
                        data-target="#updatePiece" title="Voir détail" alt="Voir détail">
                    <i class="material-icons">edit</i>
                </button>

                <button class="btn-danger btn-circle waves-effect waves-circle waves-float pieceDelete tblActBtn"
                        data-id="{{$piece->id}}" data-code="piece{{$piece->slug}}" data-url="{{route('piece.destroy', $piece->id)}}"
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

        $(document).on('click', '.pieceUpdate', function () {
           let piece = $(this).data('id');
           let url = $(this).data('url');

           $('#idUpdate').attr('value', piece.id);
           $('#nom').attr('value', piece.nom);
           $('#description').text(piece.description);
           $('#mapiece').text('MODIFIER '+piece.nom);

           $('#form_piece_update').attr('action', url);

           console.log(piece);
        });

        $(document).on('click', '.pieceDelete', function () {
            let piece = $(this).data('id');
            let url = $(this).data('url');

            $('#id_delete').attr('value', piece.id);
            $('#form_piece_update').attr('action', url);
            console.log(piece);
        });

    </script>

@endsection