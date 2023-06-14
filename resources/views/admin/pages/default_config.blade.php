@extends('layouts.admin_layout')

@section('page-title', 'Infos contacts')

@section('content-title', 'Infos contacts')

@section('page-content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            <h5 class="card-title">Formulaire de mise à jour des informations de contact</h5>
        </div>
        <div class="card-body">
            @if (isset($contact))
            <form id="" method="post" action="{{ route('contact.update', $contact->id) }}">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('contact.store') }}">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-longitude">Longitude </label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ isset($contact) ? $contact->longitude : old('longitude') }}" id="id-longitude" placeholder="Coordonnées de longitude">
                            @error('longitude')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-latitude">Latitude </label>
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ isset($contact) ? $contact->latitude : old('latitude') }}" id="id-latitude" placeholder="Coordonnées de latitude">
                            @error('latitude')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="id-phone-1">N° Téléphone 1 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone_1') is-invalid @enderror" name="phone_1" value="{{ isset($contact) ? phoneNumber()[0] : old('phone_1') }}" id="id-phone-1" placeholder="Principal N° de téléphone">
                            @error('phone_1')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="id-phone-2">N° Téléphone 2</label>
                            <input type="text" class="form-control @error('phone_2') is-invalid @enderror" name="phone_2" value="{{ isset($contact) ? phoneNumber()[1] : old('phone_2') }}" id="id-phone-2" placeholder="Deuxième N° de téléphone">
                            @error('phone_2')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="id-phone-3">N° Téléphone 3</label>
                            <input type="text" class="form-control @error('phone_3') is-invalid @enderror" name="phone_3" value="{{ isset($contact) ? phoneNumber()[2] : old('phone_3') }}" id="id-phone-3" placeholder="Troisième N° de téléphone">
                            @error('phone_3')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="id-email-1">Adresse email 1 <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email_1') is-invalid @enderror" name="email_1" value="{{ isset($contact) ? emailAddress()[0] : old('email_1') }}" id="id-email-1" placeholder="Principale adresse email">
                            @error('email_1')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="id-email-2">Adresse email 2</label>
                            <input type="email" class="form-control @error('email_2') is-invalid @enderror" name="email_2" value="{{ isset($contact) ? emailAddress()[1] : old('email_2') }}" id="id-email-2" placeholder="Deuxième adresse email">
                            @error('email_2')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="id-email-3">Adresse email 3</label>
                            <input type="email" class="form-control @error('email_3') is-invalid @enderror" name="email_3" value="{{ isset($contact) ? emailAddress()[2] : old('email_3') }}" id="id-email-3" placeholder="Troisième adresse email">
                            @error('email_3')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-name">Adresse <span class="text-danger">*</span></label>
                            <textarea name="address" id="" class="form-control" rows="4">{!! old('address', $contact->address) !!}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-resume">Résumé info contact</label>
                            <textarea id="id-resume" name="resume" rows="2" class="form-control @error('resume') is-invalid @enderror">{!! old('resume', $contact->resume) !!}</textarea>
                            @error('resume')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="float-end mt-3">
                        <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($contact) ? 'Modifier' : 'Enregistrer' }}</button>
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
        $("#id-contact-datatable").DataTable({
            responsive: true
            , language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
            , }
        , });
    });

</script>

<script>
    $(document).ready(function() {
        $('#id-resume').summernote({
            placeholder: "Saisissez une description pour cet appel d'offre dans cette zone...",
            // required,
            height: 200
        });
    });

</script>
@endsection
