@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 5rem">
                <div class="cards shadow-l">
                    <div class="card-header bg-presidence">
                        <img src="{{asset('assets/img/LOGO-E-ADMINISTRATION.png')}}" class="" style="width: 30%">
                        <span class="center pl-5 black-color" style="font-size: 40px">

                        </span>
                    </div>

                    <div class="card-body cardBloc center">

                        <h1 class="white-color"> Bienvenue {{Auth::user()->nom}} </h1>

                        <p class="white-color">
                            Votre demande de création de compte en tant que <span class="red"><strong> {{Auth::user()->role}}</strong></span>  a été effectuée  avec succès !
                        </p>

                        <p class="white-color">
                            Veuillez-vous <a href="{{ route('login') }}">connecter ici</a> pour accéder au dashboard
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection