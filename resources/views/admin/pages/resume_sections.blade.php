@extends('layouts.admin_layout')

@section('page-title', 'Résumé des sections')

@section('content-title', 'Résumé des sections')

@section('page-content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            <h5 class="card-title">Configuration des textes introductifs des sections</h5>
        </div>
        <div class="card-body">
            @if (isset($sectionResume))
            <form id="" method="post" action="{{ route('config_section.update', $sectionResume->id) }}">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('config_section.store') }}">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-home-first-title">Accueil titre 1 </label>
                            {{-- <input type="text" class="form-control @error('home_first_title') is-invalid @enderror" name="home_first_title" value="{{ isset($sectionResume) ? $sectionResume->home_first_title : old('home_first_title') }}" id="id-home-first-title" placeholder="Premier titre de la page d'accueil"> --}}
                            <textarea name="home_first_title" id="" class="form-control" rows="2">@if (isset($sectionResume)) {{ $sectionResume->home_first_title }} @else {{ old('home_first_title') }} @endif</textarea>
                            @error('home_first_title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-home-second-title">Accueil titre 2 </label>
                            {{-- <input type="text" class="form-control @error('home_second_title') is-invalid @enderror" name="home_second_title" value="{{ isset($sectionResume) ? $sectionResume->home_second_title : old('home_second_title') }}" id="id-home-second-title" placeholder="Deuxième titre de la page d'accueil"> --}}
                            <textarea name="home_second_title" id="" class="form-control" rows="2">@if (isset($sectionResume)) {{ $sectionResume->home_second_title }} @else {{ old('home_second_title') }} @endif</textarea>
                            @error('home_second_title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-about">A propos de nous</label>
                            <textarea id="id-about" name="about" class="form-control @error('about') is-invalid @enderror">@if (isset($sectionResume)) {!! $sectionResume->about !!} @else {!! old('about') !!} @endif</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        {{-- <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-contact">Contact</label>
                            <textarea id="id-contact" name="contact" class="form-control @error('contact') is-invalid @enderror">@if (isset($sectionResume)) {!! $sectionResume->contact !!} @else {!! old('contact') !!} @endif</textarea>
                            @error('contact')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-gallery">Gallerie</label>
                            <textarea id="id-gallery" name="gallery" class="form-control @error('gallery') is-invalid @enderror">@if (isset($sectionResume)) {!! $sectionResume->gallery !!} @else {!! old('gallery') !!} @endif</textarea>
                            @error('gallery')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-team">Notre équipe</label>
                            <textarea id="id-team" name="team" class="form-control @error('team') is-invalid @enderror">@if (isset($sectionResume)) {!! $sectionResume->team !!} @else {!! old('team') !!} @endif</textarea>
                            @error('team')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-faq">Foire Aux Questions</label>
                            <textarea id="id-faq" name="faq" class="form-control @error('faq') is-invalid @enderror">@if (isset($sectionResume)) {!! $sectionResume->faq !!} @else {!! old('faq') !!} @endif</textarea>
                            @error('faq')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($sectionResume) ? 'Modifier' : 'Enregistrer' }}</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="row">

</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#id-about').summernote({
            placeholder: "Saisissez un texte introductif pour la section « A propos de nous » dans cette zone...",
            // required,
            height: 100
        });
        $('#id-contact').summernote({
            placeholder: "Saisissez un texte introductif pour la section « Contact » dans cette zone...",
            // required,
            height: 100
        });
        $('#id-gallery').summernote({
            placeholder: "Saisissez un texte introductif pour la section « Gallerie » dans cette zone...",
            // required,
            height: 100
        });
        $('#id-team').summernote({
            placeholder: "Saisissez un texte introductif pour la section « Notre équipe » dans cette zone...",
            // required,
            height: 100
        });
        $('#id-faq').summernote({
            placeholder: "Saisissez un texte introductif pour la section « FAQ » dans cette zone...",
            // required,
            height: 100
        });
        $('#id-social').summernote({
            placeholder: "Saisissez un texte introductif pour la section « Nos réseaux sociaux » dans cette zone...",
            // required,
            height: 100
        });
    });

</script>
@endsection
