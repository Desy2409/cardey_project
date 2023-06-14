@extends('layouts.auth_layout')

@section('page-title',"Inscription")

@section('page-content')

<div class="row align-items-center gx-0 gy-7">
    <div class="col-auto bg-100 dark__bg-1100 rounded-3 position-relative overflow-hidden auth-title-box" style="height: 780px !important;">
        <div class="bg-holder" style="background-image:url({{ asset('theme_assets/auth/img/bg/38.png') }});"></div>
        <!--/.bg-holder-->
        <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
            <h3 class="mb-3 text-black fs-1">Gobi#ONG</h3>
            <p class="text-700">Les soumissions à nos appels d'offre se font désormais sur notre plateforme !!!</p>
            <ul class="list-unstyled mb-0 w-max-content w-md-auto mx-auto">
                <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Plus simple</span></li>
                <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Plus rapide</span></li>
                <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Plus fiable</span></li>
            </ul>
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
                <h3 class="text-1000">Page d'inscription</h3>
                <p class="text-700">Renseignez les informations pour créer votre compte.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3 text-start">
                        <label class="form-label" for="matricule">Numéro matricule</label>
                        <div class="form-icon-container">
                            <input name="matricule" class="form-control form-icon-input @error('matricule') is-invalid @enderror" value="{{ old('matricule') }}" id="matricule" type="text" placeholder="Matricule" />
                            <span class="fas fa-id-card text-900 fs--1 form-icon"></span>
                        </div>
                        @error('matricule')
                        <span class="invalid-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="lastname">Nom</label>
                        <div class="form-icon-container">
                            <input name="lastname" class="form-control form-icon-input @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" id="lastname" type="text" placeholder="Nom de famille" />
                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                        </div>
                        @error('lastname')
                        <span class="invalid-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="firstname">Prénom(s)</label>
                        <div class="form-icon-container">
                            <input name="firstname" class="form-control form-icon-input @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" id="firstname" type="text" placeholder="Prénom(s)" />
                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                        </div>
                        @error('firstname')
                        <span class="invalid-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Adresse email</label>
                        <div class="form-icon-container">
                            <input name="email" class="form-control form-icon-input @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" type="email" placeholder="username@totalenergies.tg" />
                            <span class="fas fa-envelope text-900 fs--1 form-icon"></span>
                        </div>
                        @error('email')
                        <span class="invalid-error" role="alert">
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
                        <span class="invalid-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="password-confirm">Confirmation de mot de passe</label>
                        <div class="form-icon-container">
                            <input name="password_confirmation" class="form-control form-icon-input @error('password_confirmation') is-invalid @enderror" id="password-confirm" type="password" placeholder="Mot de passe" />
                            <span class="fas fa-key text-900 fs--1 form-icon"></span>
                        </div>
                        @error('password_confirmation')
                        <span class="invalid-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 mt-5">S'inscrire</button>
                    {{-- <div class="text-center"><a class="fs--1 fw-bold" href="sign-up.html">Create an account</a></div> --}}
                </form>
            </div>
        </div>
    </div>

    @endsection
