@extends('layouts.admin_layout')

@section('page-title', 'Gallerie')

@section('content-title', 'Gallerie')

@section('page-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5 class="card-title">Mise à jour de la gallerie</h5>
            </div>
            <div class="card-body">
                @if (isset($gallery))
                    <form id="" method="post" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                        @method('patch')
                    @else
                        <form id="" method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="id-title">Libellé <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($gallery) ? $gallery->title : old('title') }}" id="id-title" placeholder="Titre du texte accompagnateur">
                        @error('title')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="id-text-message">Texte accompagnateur <span class="text-danger">*</span></label>
                        <textarea id="id-text-message" name="text_message" rows="2" class="form-control @error('text_message') is-invalid @enderror">
@if (isset($gallery))
{!! $gallery->text_message !!}
@else
{!! old('text_message') !!}
@endif
</textarea>
                        @error('text_message')
                            <span class="invalid-feedback text-danger mb-5" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="id-gallery-photos">Charger la photo de profil</label>
                        <input type="file" class="form-control @error('gallery_photos') is-invalid @enderror" name="gallery_photos[]" id="id-gallery-photos" multiple>
                        @error('gallery_photos')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="float-end mt-3">
                    <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($gallery) ? 'Modifier' : 'Enregistrer' }}</button>
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
                    <h5 class="card-title">Liste des posts au niveau de la galerie</h5>
                </div>
                <div class="card-body">
                    <table id="id-gallery-datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th class="text-center align-middle col-1">N°</th> --}}
                                <th class="text-center align-middle col-9">Texte</th>
                                <th class="text-center align-middle col-1">Statut</th>
                                <th class="text-center align-middle col-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($galleries) && sizeof($galleries) > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($galleries as $gallery)
                                    <tr class="align-middle">
                                        {{-- <td class="text-center align-middle">{{ $i++ }}</td> --}}
                                        <td class="text-center align-middle">{{ $gallery->title }}</td>
                                        {{-- <td class="text-center align-middle">{!! $gallery->text_message !!}</td> --}}
                                        <td class="text-center align-middle"></td>
                                        <td class="text-center align-middle">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#galleryDetailModal{{ $gallery->id }}" title="Détails"><i class="fa fa-eye text-info"></i></a>
                                            {{-- <a href="{{ route('gallery.show', $gallery->id) }}"><i class="fa fa-list text-info" title="Détails"></i></a> --}}
                                            <a href="{{ route('gallery.index', $gallery->id) }}"><i class="fa fa-edit text-primary ms-2" title="Modification"></i></a>
                                            {{-- <a href="{{ route('gallery.destroy', $gallery->id) }}"><i class="fa fa-trash-alt text-danger ms-2" title="Suppression"></i></a> --}}
                                            <a href="#" onclick="showDeleteConfirmation('{{ $gallery->id }}','{{ $gallery->title }}')"><i class="fa fa-trash-alt text-danger ms-2" title="Suppression"></i></a>
                                            {{-- {!! galleryDelBtnStatus($gallery->id) !!} --}}
                                        </td>
                                    </tr>
                                    @include('admin.pages.modals.gallery._detail_gallery')
                                @endforeach
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
        $(document).ready(function() {
            // Datatables Responsive
            $("#id-gallery-datatable").DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                },
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#id-text-message').summernote({
                placeholder: "Saisissez le texte de la section de galerie...",
                // required,
                height: 150
            });
        });
    </script>


    <script>
        function showDeleteConfirmation(id, title) {
            // console.log(code)
            // console.log(title)
            Swal.fire({
                icon: 'warning',
                title: "Supprimer ce post de la galerie ?",
                html: '<p class="text-info"> ' + title + ' </p>',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Non, annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Récupérer le jeton CSRF
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Faire une requête AJAX pour appeler la méthode de suppression
                    $.ajax({
                        url: '/administration/gallerie/' + id + '/suppression/', // Remplacez par l'URL correcte de votre méthode de suppression
                        method: 'DELETE', // Utilisez la méthode HTTP appropriée
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Inclure le jeton CSRF dans les en-têtes
                        },
                        success: function(response) {
                            // Gérer la réponse en fonction de vos besoins
                            Swal.fire({
                                title: "GALERIE",
                                text: "Suppression effectuée.",
                                icon: 'success',
                                confirmButtonColor: '#28a745', // Couleur verte
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                                // Recharger la page après suppression réussie
                            });
                        },
                        error: function(xhr) {
                            // Gérer les erreurs en fonction de vos besoins
                            window.location.reload();
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        }

        function showPublishConfirmation(id, title) {
            // console.log(code)
            // console.log(title)
            Swal.fire({
                icon: 'question',
                title: "Publier ce post dans la galerie ?",
                html: '<p class="text-info"> ' + title + ' </p>',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, publier',
                cancelButtonText: 'Non, annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Récupérer le jeton CSRF
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Faire une requête AJAX pour appeler la méthode de suppression
                    $.ajax({
                        url: '/administration/gallerie/' + id + '/publication/', // Remplacez par l'URL correcte de votre méthode de suppression
                        method: 'PATCH', // Utilisez la méthode HTTP appropriée
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Inclure le jeton CSRF dans les en-têtes
                        },
                        success: function(response) {
                            // Gérer la réponse en fonction de vos besoins
                            Swal.fire({
                                title: "GALERIE",
                                text: "Publication effectuée.",
                                icon: 'success',
                                confirmButtonColor: '#28a745', // Couleur verte
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                                // Recharger la page après suppression réussie
                            });
                        },
                        error: function(xhr) {
                            // Gérer les erreurs en fonction de vos besoins
                            window.location.reload();
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        }

        function showArchiveConfirmation(id, title) {
            // console.log(code)
            // console.log(title)
            Swal.fire({
                icon: 'question',
                title: "Archiver ce post de la galerie ?",
                html: '<p class="text-info"> ' + title + ' </p>',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, archiver',
                cancelButtonText: 'Non, annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Récupérer le jeton CSRF
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Faire une requête AJAX pour appeler la méthode de suppression
                    $.ajax({
                        url: '/administration/gallerie/' + id + '/archivage/', // Remplacez par l'URL correcte de votre méthode de suppression
                        method: 'PATCH', // Utilisez la méthode HTTP appropriée
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Inclure le jeton CSRF dans les en-têtes
                        },
                        success: function(response) {
                            // Gérer la réponse en fonction de vos besoins
                            Swal.fire({
                                title: "GALERIE",
                                text: "Archivage effectué.",
                                icon: 'success',
                                confirmButtonColor: '#28a745', // Couleur verte
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                                // Recharger la page après suppression réussie
                            });
                        },
                        error: function(xhr) {
                            // Gérer les erreurs en fonction de vos besoins
                            // window.location.reload();
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        }
    </script>
@endsection
