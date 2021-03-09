@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="armoirie">
                    <div class="card-body">
                        <img src="{{asset('assets/img/LOGO-E-ADMINISTRATION.png')}}" class="" style="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 offset-lg-1">
                <div class="card">
                    <div class="card-header bg-brown">
                        <h1> {{ __('Register') }} </h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" id="register" action="{{ route('register') }}">
                            @csrf

                            <div class="row clearfix">
                                <div class="col-md-6 my-3">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="nom" value="{{ old('name') }}" required autocomplete="name"
                                               autofocus
                                               placeholder="Nom *">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 my-3">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-mailchimp"></i></span>
                                        </div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus
                                               placeholder="Adresse Mail *">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 my-3">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password"
                                               placeholder="Mot de Passe *">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 my-3">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation"
                                               required autocomplete="new-password"
                                               placeholder="Confirmer Mot de Passe *">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 my-3">
                                    <div class="input-group form-group">
                                    <textarea id="description" type="text" class="form-control"
                                              name="description" placeholder="Description *"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-check form-check-radio" style="color: white">
                                        @foreach($categories as $category)
                                            @if($category->id == 1)
                                                <label class="pr-4">
                                                    <input checked name="categorie_id" type="radio" value="{{$category->id}}"/>
                                                    <span> {{$category->nom}} </span>
                                                </label>
                                            @else
                                                <label class="pr-4">
                                                    <input name="categorie_id" type="radio"
                                                           value="{{$category->id}}"/>
                                                    <span> {{$category->nom}} </span>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="connexion">
                                    <button type="submit" class="btn btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-center links" style="color: white">
                            J'ai déjà un compte | <a href="{{ route('login') }}" class="pl-1"> Connexion </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
