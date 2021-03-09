<label for="" class="ml-3"> <strong> Listes des institutions </strong> </label>
<div class="input-field col s12">
    <select id="institution" multiple name="user_id[]">
        <option value="" disabled> Choisir le ou les institutions</option>
        @if(Auth::user()->role == "superAdmin")
            @foreach($institutions as  $institution)
                <option value="{{$institution->id}}"> {{$institution->nom}} </option>
            @endforeach
        @elseif(Auth::user()->role == "admin")
            <option selected value="{{Auth::user()->id}}"> {{Auth::user()->nom}} </option>
            @foreach($institutions as  $institution)
                @if($institution->nom !== Auth::user()->nom)
                    <option disabled="" value="{{$institution->id}}"> {{$institution->nom}} </option>
                @endif
            @endforeach
        @endif
    </select>

</div>
{{--
<label id="institution-error" class="error editerror" for="institution">fef </label>--}}
