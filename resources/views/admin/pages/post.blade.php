@extends('layouts.admin_layout')

@section('page-title', "Poste")

@section('content-title', "Poste")

@section('page-content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            @if (isset($post))
            <h5 class="card-title">Modification d'un poste</h5>
            @else
            <h5 class="card-title">Création d'un nouveau poste</h5>
            @endif
        </div>
        <div class="card-body">
            @if (isset($post))
            <form id="" method="post" action="{{ route('post.update',$post->id) }}">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('post.store') }}">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-code">Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ isset($post) ? $post->code : old('code') }}" id="id-code" placeholder="Code">
                            @error('code')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="id-wording">Libellé <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('wording') is-invalid @enderror" name="wording" value="{{ isset($post) ? $post->wording : old('wording') }}" id="id-wording" placeholder="Libellé">
                            @error('wording')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="id-description">Description </label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="id-description" rows="4"></textarea>
                            {{-- <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ isset($post) ? $post->description : old('description') }}" id="id-description" placeholder="Description"> --}}
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="float-end mt-3">
                        <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($post) ? 'Modifier' : 'Enregistrer' }}</button>
                        {{-- <button type="reset" class="btn btn-sm btn-outline-dark">Fermer</button> --}}
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Liste des domaines d'activité</h5>
            </div>
            <div class="card-body">
                <table id="id-post-datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">N°</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">Libellé</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($posts) && sizeof($posts) > 0)
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $post->code }}</td>
                            <td class="text-center">{{ $post->wording }}</td>
                            <td class="text-center">{{ $post->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('post.index', $post->id) }}" title="Modifier"><i class="fa fa-edit text-primary me-2"></i></a>
                                <a href="#" title="Détails"><i class="fa fa-eye text-info me-2"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#postDeleteModal{{ $post->id }}"><i class="fa fa-trash-alt text-danger ms-2" title="Suppression"></i></a>
                            </td>
                        </tr>
                        @include('admin.pages.modals._delete_post')
                        @endforeach
                        {{-- @else --}}
                        {{-- <tr>
                            <td colspan="6">
                                <h4 class="text-center">Aucun prestataire disponible pour l'instant</h4>
                            </td>
                        </tr> --}}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // $(document).ready(function() {
    $(document).ready(function() {
        // Datatables Responsive
        $("#id-post-datatable").DataTable({
            responsive: true
            , language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
            , }
        , });
    });

</script>
@endsection
