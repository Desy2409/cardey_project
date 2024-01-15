<!-- Modal -->
<div class="modal fade" id="galleryDetailModal{{ $gallery->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="galleryDetailModal{{ $gallery->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryDetailModal{{ $gallery->id }}Label">Détails d'une section de galerie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="border p-2 mb-3">
                    {!! $gallery->title !!}
                </div>
                <div class="border p-2 mb-3">
                    {!! $gallery->text_message !!}
                </div>
                <div class="overflow-auto border p-2">
                    This is an example of using .overflow-auto on an element with set width and height dimensions. By design, this content will vertically scroll.
                </div>


                <div class="float-end mt-3">
                    <a href="{{ route('gallery.index', $gallery->id) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
                    @if ($gallery->published_at == null)
                        <a href="#" onclick="showPublishConfirmation('{{ $gallery->id }}','{{ $gallery->title }}')" class="btn btn-sm btn-outline-success ms-2">Publier</a>
                    @endif
                    @if ($gallery->published_at != null && $gallery->archived_at == null)
                        <a href="#" onclick="showArchiveConfirmation('{{ $gallery->id }}','{{ $gallery->title }}')" class="btn btn-sm btn-outline-info ms-2">Archiver</a>
                    @endif
                    @if ($gallery->archived_at == null)
                    <a href="#" onclick="showDeleteConfirmation('{{ $gallery->id }}','{{ $gallery->title }}')" class="btn btn-sm btn-outline-danger ms-2">Supprimer</a>
                    @endif
                    <button type="button" class="btn btn-sm btn-outline-secondary ms-2" data-bs-dismiss="modal">Fermer</button>
                </div>


            </div>
            {{-- <div class="modal-footer">
                
            </div> --}}
        </div>
    </div>
</div>
