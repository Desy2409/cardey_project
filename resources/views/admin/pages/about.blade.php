@extends('layouts.admin_layout')

@section('page-title', 'A propos de nous')

@section('content-title', 'A propos de nous')

@section('page-content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            <h5 class="card-title">Configuration des informations à propos de nous</h5>
        </div>
        <div class="card-body">
            @if (isset($about))
            <form id="" method="post" action="{{ route('about.update', $about->id) }}">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('about.store') }}">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-resume">Nos réseaux sociaux (Texte descriptif)</label>
                            <textarea id="id-resume" name="resume" class="form-control @error('resume') is-invalid @enderror">@if (isset($about)) {!! $about->resume !!} @else {!! old('resume') !!} @endif</textarea>
                            @error('resume')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-twitter">Twitter </label>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ isset($about) ? $about->twitter : old('twitter') }}" id="id-twitter" placeholder="Saisir le lien Twitter">
                            @error('twitter')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-facebook">Facebook </label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ isset($about) ? $about->facebook : old('facebook') }}" id="id-facebook" placeholder="Saisir le lien Facebook">
                            @error('facebook')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-instagram">Instagram </label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ isset($about) ? $about->instagram : old('instagram') }}" id="id-instagram" placeholder="Saisir le lien Instagram">
                            @error('instagram')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-skype">Skype </label>
                            <input type="text" class="form-control @error('skype') is-invalid @enderror" name="skype" value="{{ isset($about) ? $about->skype : old('skype') }}" id="id-google-plus" placeholder="Saisir le lien Skype">
                            @error('skype')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-linkedin">Linkedin </label>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ isset($about) ? $about->linkedin : old('linkedin') }}" id="id-linkedin" placeholder="Saisir le lien Linkedin">
                            @error('linkedin')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-whatsapp">Whatsapp </label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ isset($about) ? $about->whatsapp : old('whatsapp') }}" id="id-whatsapp" placeholder="Saisir le lien Whatsapp">
                            @error('whatsapp')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-about-section-1">A propos de nous (colonne 1)</label>
                            <textarea id="id-about-section-1" name="about_section_1" rows="2" class="form-control @error('about_section_1') is-invalid @enderror">@if (isset($about)) {!! $about->about_section_1 !!} @else {!! old('about_section_1') !!} @endif</textarea>
                            @error('about_section_1')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-about-section-2">A propos de nous (colonne 2)</label>
                            <textarea id="id-about-section-2" name="about_section_2" rows="2" class="form-control @error('about_section_2') is-invalid @enderror">@if (isset($about)) {!! $about->about_section_2 !!} @else {!! old('about_section_2') !!} @endif</textarea>
                            @error('about_section_2')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($about) ? 'Modifier' : 'Enregistrer' }}</button>
                        {{-- <button type="reset" class="btn btn-sm btn-outline-dark">Fermer</button> --}}
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
        // Datatables Responsive
        $("#id-about-datatable").DataTable({
            responsive: true, 
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json', 
            }, 
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('#id-about-section-1').summernote({
            placeholder: "Saisissez le texte « A propos de nous » de la colonne 1 dans cette zone...",
            // required,
            height: 150
        });
        $('#id-about-section-2').summernote({
            placeholder: "Saisissez le texte « A propos de nous » de la colonne 2 dans cette zone...",
            // required,
            height: 150
        });
    });

</script>
@endsection
