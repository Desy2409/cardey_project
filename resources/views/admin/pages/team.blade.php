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
            <form id="" method="post" action="{{ route('team.update', $team->id) }}">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('team.store') }}">
                    @endif
                    @csrf
                    <div id="rowPreview" class="row text-center d-none" style="height: 250px">
                        <div class="col-md-12">
                            {{-- <img id="previewImage" class="" src="#" alt="Image Preview" style="width: 30%; height: 90%; border-radius: 50%;"> --}}
                            <img id="previewImage" class="" src="#" alt="Image Preview" style="border-radius: 50%;">
                        </div>
                    </div>
                    <div class="row" id="row-info">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="id-profile-photo">Charger la photo de profil</label>
                                <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" id="id-profile-photo">
                                @error('profile_photo')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-code">Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ isset($team) ? $team->code : old('code') }}" id="id-code" placeholder="Saisissez le code">
                            @error('code')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-post">Poste <span class="text-danger">*</span></label>
                            <select name="activity" class="form-control" id="id-post">
                                <option value="" id="post-default">Chosissiez un poste</option>
                                @if (!empty($posts) && sizeof($posts)>0)
                                @foreach ($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->wording }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-name">Nom complet <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($team) ? $team->name : old('name') }}" id="id-name" placeholder="Exemple : Prénom(s) Nom">
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
                            <label class="form-label" for="id-name">Adresse <span class="text-danger">*</span></label>
                            <textarea name="address" id="" class="form-control" rows="2">@if (isset($team)) {{ $team->address }} @else {{ old('address') }} @endif</textarea>
                            @error('address')
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
    const rowInfo = document.getElementById('row-info');
    const rowPreview = document.getElementById('rowPreview');
    const previewImage = document.getElementById('previewImage');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.addEventListener('load', function() {
            $('#rowPreview').removeClass('d-none')
            // rowInfo.style.marginTop = "8rem !important;"
            // rowInfo.style.setProperty('margin-top', '8rem', 'important');
            rowPreview.style.setProperty('margin-bottom', '5rem', 'important');
            previewImage.src = this.result;
        });
        reader.readAsDataURL(file);
    });
</script>
@endsection
