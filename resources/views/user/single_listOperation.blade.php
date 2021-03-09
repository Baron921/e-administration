
<div class="row">
    @foreach($operation as $operations)
        <div class="col-lg-4 col-md-6 icon-box" data-aos="" data-aos-delay="200">
            <div class="head_operation shadow">
                <div class="mt-3">
                    <div class="icon">
                        @if($operations->type_id == 1)
                            <i class="icofont-computer"></i>
                        @elseif($operations->type_id == 2)
                            <i class="icofont-earth"></i>
                        @elseif($operations->type_id == 3)
                            <i class="icofont-law"></i>
                        @elseif($operations->type_id == 4)
                            <i class="icofont-user-suited"></i>
                        @elseif($operations->type_id == 5)
                            <i class="icofont-money"></i>
                        @elseif($operations->type_id == 6)
                            <i class="icofont-doctor"></i>
                        @elseif($operations->type_id == 7)
                            <i class="icofont-cart"></i>
                        @elseif($operations->type_id == 8)
                            <i class="icofont-military"></i>
                        @elseif($operations->type_id == 9)
                            <i class="icofont-industries"></i>
                        @else
                            <i class="icofont-user"></i>
                        @endif
                    </div>
                    <div class="titreOperation col-xs-12">
                        <h6 class="" style="font-weight: bold"> {{$operations->nom}} </h6>
                    </div>
                </div>
                <p class="body_description">
                    {{$operations->description}}
                </p>
            </div>
            <div class="one_foot">
                <a id="Operation{{$operations->slug}}" class="buton_details" data-id="{{$operations}}" data-url="{{route('details', [$operations->nom, $operations->slug])}}"
                   href="{{route('details', [$operations->nom, $operations->slug])}}">
                    Détails
                </a>
            </div>
        </div>
    @endforeach
</div>