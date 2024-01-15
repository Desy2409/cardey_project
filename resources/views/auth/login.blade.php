@extends('layouts.auth_layout')

@section('page-title',"Connexion")

@section('page-content')

<div class="row align-items-center gx-0 gy-7">
    <div class="col-auto bg-100 dark__bg-1100 rounded-3 position-relative overflow-hidden auth-title-box">
        <div class="bg-holder" style="background-image:url({{ asset('theme_assets/auth/img/bg/38.png') }});"></div>
        <!--/.bg-holder-->
        <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
            <h3 class="mb-3 text-black fs-1">CARDEY</h3>
            {{-- <p class="text-700">Les soumissions à nos appels d'offre se font désormais sur notre plateforme !!!</p>
            <ul class="list-unstyled mb-0 w-max-content w-md-auto mx-auto">
                <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Plus simple</span></li>
                <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Plus rapide</span></li>
                <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Plus fiable</span></li>
            </ul> --}}
        </div>
        <div class="position-relative z-index--1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="{{ asset('customs/img/logo.png') }}" alt="" /><img class="auth-title-box-img d-light-none" src="{{ asset('theme_assets/auth/img/spot-illustrations/auth-dark.png') }}" alt="" /></div>
    </div>
    <div class="col mx-auto">
        <div class="auth-form-box">
            <div class="text-center mb-12"><a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                    <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block">
                        {{-- <img src="{{ asset('customs/img/logo.png') }}" alt="phoenix" width="60" /> --}}
                    </div>
                </a>
                <h3 class="text-1000">Page de connexion</h3>
                <p class="text-700">Identifiez-vous pour accéder à votre compte.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- Afficher un message d'erreur pour un utilisateur inconnu au système --}}
                    {{-- @if ($errors->has('email') || $errors->has('password')) --}}
                    {{-- @if (Session::has('login_error'))
                    <span class="invalid-error" role="alert">
                        <strong>Erreur</strong>
                    </span>
                    @endif --}}
                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Adresse email</label>
                        <div class="form-icon-container">
                            <input name="email" class="form-control form-icon-input @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" type="email" placeholder="username@cardey.tg" />
                            <span class="fas fa-envelope text-900 fs--1 form-icon"></span>
                        </div>
                        @error('email')
                        <span class="invalid-error text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="password">Mot de passe</label>
                        <div class="form-icon-container">
                            <input name="password" class="form-control form-icon-input @error('email') is-invalid @enderror" id="password" type="password" placeholder="Mot de passe" />
                            <span class="fas fa-key text-900 fs--1 form-icon"></span>
                        </div>
                        @error('password')
                        <span class="invalid-error text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="row flex-between-center mb-7">
                        <div class="col-auto">
                            <div class="form-check mb-0">
                                {{-- <input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" /> --}}
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label mb-0" for="basic-checkbox">Se souvenir de moi</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a class="fs--1 fw-semi-bold" href="#">Mot de passe oublié ?</a>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mb-5">Se connecter</button>
                    {{-- <div class="text-center"><a class="fs--1 fw-bold" href="sign-up.html">Create an account</a></div> --}}
                </form>
            </div>
        </div>
    </div>

    @endsection
