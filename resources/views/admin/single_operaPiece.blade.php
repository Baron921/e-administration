
    <label for="" class="ml-3"> <strong> Listes des pièces </strong> </label>
    <div class="input-field col s12">
        <select id="piece" multiple name="piece_id[]">
            <option value="" disabled> Choisir les pièces à fournir </option>
            @foreach($pieces as  $piece)
                <option value="{{$piece->id}}"> {{$piece->nom}} </option>
            @endforeach
        </select>
    </div>