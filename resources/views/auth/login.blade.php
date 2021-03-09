@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="armoirie">
                        <div class="card-body">
                            <img src="{{asset('assets/img/LOGO-E-ADMINISTRATION.png')}}" class="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
                    <div class="card">
                        <div class="card-header bg-brown">
                            <h1> {{ __('Login') }} </h1>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-group form-group">
                                    <div class="input-group-prepend mt-4">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="email" class="mt-4 form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus
                                           placeholder="Adresse Mail *">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend mt-4">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input id="password" type="password"
                                           class="mt-4 form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password"
                                           placeholder="Mot de Passe   ">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="my-5">
                                        <div class="form-check my-3">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember" style="color:white;">
                                                {{ __('Se souvenir de moi') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="connexion">
                                        <button type="submit" class="btn btn-block" id="conect" data-id="">
                                            {{ __('Connexion') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-center links" style="color: white">
                                J'ai pas un compte | <a href="{{ route('register') }}" class="pl-1"> Inscription </a>
                            </div>

                            <div class="d-flex justify-content-center">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


