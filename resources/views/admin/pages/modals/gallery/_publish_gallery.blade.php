<!-- Modal -->
<div class="modal fade" id="galleryPublishModal{{ $gallery->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="galleryPublishModal{{ $gallery->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryPublishModal{{ $gallery->id }}Label">Publication d'un post d'une galerie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="" method="post" action="{{ route('gallery.publish', $gallery->id) }}">
                    @csrf
                    @method('patch')
                    <div class="form-group mb-3">
                        <h3 class="text-danger text-center">Êtes-vous sûr de vouloir publier ce post de la galerie ?</h3>
                    </div>
                    <div class="float-end mt-3">
                        <button type="submit" id="btn-delete" class="btn btn-sm btn-outline-success">Publier</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                
            </div> --}}
        </div>
    </div>
</div>