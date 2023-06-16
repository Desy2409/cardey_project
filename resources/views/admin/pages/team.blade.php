@extends('layouts.admin_layout')

@section('page-title', 'Notre équipe')

@section('content-title', 'Notre équipe')

@section('page-content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            <h5 class="card-title">Configuration des membres de l'équipe</h5>
        </div>
        <div class="card-body">
            @if (isset($team))
            <form id="" method="post" action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    {{-- <div id="rowPreview" class="row text-center d-none" style="height: 250px"> --}}
                        {{-- <img id="previewImage" class="" src="#" alt="Image Preview" style="width: 30%; height: 90%; border-radius: 50%;"> --}}
                    <div id="rowPreview" class="row text-center d-none" style="height: 90%;">
                        <div class="col-md-12">
                            <img id="previewImage" class="" src="#" alt="Image Preview" style="width: 30%; border-radius: 50% !important;">
                        </div>
                    </div>
                    <div class="row mb-3 mt-2">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="id-profile-photo">Charger la photo de profil</label>
                                <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" id="id-profile-photo">
                                @error('profile_photo')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                                <span class="text-danger d-none" id="imgFormatError" role="alert" style="font-size:80%"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    <div class="row" id="row-info">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-code">Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ isset($team) ? $team->code : old('code') }}" id="id-code" placeholder="Saisissez le code">
                            @error('code')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-post">Poste <span class="text-danger">*</span></label>
                            <select name="post_id" class="form-control @error('post_id') is-invalid @enderror" id="id-post">
                                <option value="" id="post-default">Chosissiez un poste</option>
                                @if (!empty($posts) && sizeof($posts)>0)
                                @foreach ($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->wording }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('post_id')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-name">Nom complet <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($team) ? $team->name : old('name') }}" id="id-name" placeholder="Exemple : Prénom Nom">
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-twitter">Twitter </label>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ isset($team) ? $team->twitter : old('twitter') }}" id="id-twitter" placeholder="Saisissez le lien Twitter">
                            @error('twitter')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-facebook">Facebook </label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ isset($team) ? $team->facebook : old('facebook') }}" id="id-facebook" placeholder="Saisissez le lien Facebook">
                            @error('facebook')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-instagram">Instagram </label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ isset($team) ? $team->instagram : old('instagram') }}" id="id-instagram" placeholder="Saisissez le lien Instagram">
                            @error('instagram')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-skype">Skype </label>
                            <input type="text" class="form-control @error('skype') is-invalid @enderror" name="skype" value="{{ isset($team) ? $team->skype : old('skype') }}" id="id-google-plus" placeholder="Saisissez le lien Skype">
                            @error('skype')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-linkedin">Linkedin </label>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ isset($team) ? $team->linkedin : old('linkedin') }}" id="id-linkedin" placeholder="Saisissez le lien Linkedin">
                            @error('linkedin')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-whatsapp">Whatsapp </label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ isset($team) ? $team->whatsapp : old('whatsapp') }}" id="id-whatsapp" placeholder="Saisissez le lien Whatsapp">
                            @error('whatsapp')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-name">Biographie <span class="text-danger">*</span></label>
                            <textarea name="biography" id="" class="form-control @error('biography') is-invalid @enderror" rows="2">@if (isset($team)) {{ $team->biography }} @else {{ old('biography') }} @endif</textarea>
                            @error('biography')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($team) ? 'Modifier' : 'Enregistrer' }}</button>
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
    const fileInput = document.getElementById('id-profile-photo');
    const rowPreview = document.getElementById('rowPreview');
    const previewImage = document.getElementById('previewImage');
    const imgFormatError = document.getElementById('imgFormatError');


    fileInput.addEventListener('change', function() {
  const file = this.files[0];
  const reader = new FileReader();

  reader.addEventListener('load', function() {
    // Créer une nouvelle image
    const img = new Image();

    // Définir la fonction de rappel pour la vérification des dimensions
    img.onload = function() {
    //   if (this.width == 239 && this.height == 308) {
        // Les dimensions de l'image sont valides, effectuer le traitement
        imgFormatError.classList.add('d-none');
        $('#rowPreview').removeClass('d-none');
        // rowPreview.style.setProperty('margin-bottom', '5rem', 'important');
        previewImage.src = reader.result;
    // } else {
    //     // Les dimensions de l'image ne correspondent pas
    //     imgFormatError.textContent = "Le format de l'image doit être de 239x308 pixels.";
    //     imgFormatError.classList.remove('d-none');
    //     $('#rowPreview').addClass('d-none');
    //     // Réinitialiser l'élément d'entrée de fichier
    //     fileInput.value = '';
    //     // Réinitialiser l'aperçu de l'image
    //     previewImage.src = '';
    //   }
    };

    // Charger l'image pour vérifier les dimensions
    img.src = reader.result;
  });

  reader.readAsDataURL(file);
});

    // fileInput.addEventListener('change', function() {
    //     const file = this.files[0];
    //     const reader = new FileReader();
    //     reader.addEventListener('load', function() {
    //         if (this.width === 239 && this.height === 308) {
    //             // Les dimensions de l'image sont valides, effectuer le traitement
    //             imgFormatError.classList.add('d-none');
    //             $('#rowPreview').removeClass('d-none')
    //             rowPreview.style.setProperty('margin-bottom', '5rem', 'important');
    //             previewImage.src = this.result;
    //         } else {
    //             // alert("Le format de l'image doit être de 239x308 pixels.")
    //             // Les dimensions de l'image ne correspondent pas
    //             imgFormatError.textContent = "Le format de l'image doit être de 239x308 pixels.";
    //             imgFormatError.classList.remove('d-none');
    //             // Réinitialiser l'élément d'entrée de fichier
    //             fileInput.value = '';
    //             // Réinitialiser l'aperçu de l'image
    //             previewImage.src = '';
    //         }
    //     });
    //     reader.readAsDataURL(file);
    // });

</script>
@endsection
