<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\FileUpload;
use App\Models\Folder;
use App\Models\Gallery;
use App\Repositories\BaseRepository;
use App\Utils\FileUtil;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public $repo;
    public $user;
    protected $fileUtil;
    public function __construct(BaseRepository $repo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
        $this->repo = $repo;
        $this->fileUtil = new FileUtil();
    }

    public function index($id = null)
    {

        // dd($this->repo->last(Gallery::class));

        $indexGallery = "Mise à jour de la gallerie";
        $gallery = null;
        // $galleries = $this->repo->selectAllOrderBy(Gallery::class, 'created_at', 'asc');
        $galleries = $this->repo->selectAllOrderByNotDeleted(Gallery::class, 'published_at', 'desc');
        if ($id) {
            $gallery = $this->repo->findOrFail(Gallery::class, $id);
        }

        return view('admin.pages.gallery', compact('indexGallery', 'galleries', 'gallery'));
    }

    public function store(Request $request)
    {
        //  dd('store',$request->all());
        try {
            $gallery = new Gallery();
            $gallery->title = $request->title;
            $gallery->text_message = $request->text_message;
            $gallery->user_create_id = $this->user->id;
            $gallery->save();

            $lastSavedGallery = $this->repo->last(Gallery::class);

            $galleryPhotos = $request->file('gallery_photos');
            //  dd($galleryPhotos);
            // Upload de la photo de galerie
            if (!empty($galleryPhotos) && sizeof($galleryPhotos) > 0) {
                // dd($galleryPhotos);
                foreach ($galleryPhotos as $key => $galleryPhoto) {
                    // dd($galleryPhoto);
                    if ($galleryPhoto) {
                        $galleryFolder = $this->repo->firstTwo(Folder::class, 'affiliation', 'child', 'name', 'GALERIE');
                        $galleryPhotosFileUpload = $this->fileUtil->storeFile($gallery, $galleryPhoto, 'gallery-' . rand(0, 500), $galleryFolder, $lastSavedGallery->id);
                    }
                }
            }
            //  else{
            //     dd('!',$galleryPhotos);
            //  }
            return redirect()->back()->with('success', ['title' => "GALERIE", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur GALERIE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd('update');
        $gallery = $this->repo->findOrFail(Gallery::class, $id);
        $directoryPath = public_path('CARDEY_TOGO/GALERIE');
        $oldFileUploads = $this->repo->selectAllTwo(FileUpload::class, 'fileable_type', 'App\Models\Gallery', 'fileable_id', $gallery->id);
        // dd($oldFileUploads);
        try {
            $gallery->text_message = $request->text_message;
            $gallery->user_edit_id = $this->user->id;
            $gallery->save();

            $galleryPhotos = $request->file('gallery_photos');
            // Upload de la photo de galerie
            if (!empty($galleryPhotos) && sizeof($galleryPhotos) > 0) {
                // dd($galleryPhotos);
                if (!empty($oldFileUploads) && sizeof($oldFileUploads) > 0) {
                    foreach ($oldFileUploads as $key => $oldFile) {
                        File::delete($oldFile->src);
                    }
                }
                foreach ($galleryPhotos as $key => $galleryPhoto) {
                    // dd($galleryPhoto);
                    if ($galleryPhoto) {
                        $galleryFolder = $this->repo->firstTwo(Folder::class, 'affiliation', 'child', 'name', 'GALERIE');
                        $galleryPhotosFileUpload = $this->fileUtil->storeFile($gallery, $galleryPhoto, 'gallery-' . rand(0, 500), $galleryFolder);
                    }
                }
            }

            return redirect()->route('gallery.index')->with('success', ['title' => "GALERIE", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur modification GALERIE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function destroy($id)
    {
        // dd('destroy');
        $gallery = $this->repo->findOrFail(Gallery::class, $id);
        try {
            $gallery->user_delete_id = $this->user->id;
            $gallery->save();
            $gallery->delete();

            // return redirect()->back()->with('success', ['title' => "GALERIE", 'message' => "Suppression effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Suppression GALERIE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function restore($id)
    {
        // dd('restore');
        $gallery = $this->repo->findOrFail(Gallery::class, $id);
        try {
            $gallery->restored_at = new DateTime();
            $gallery->user_restore_id = $this->user->id;
            $gallery->save();

            return redirect()->back()->with('success', ['title' => "GALERIE", 'message' => "Restauration effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Restauration GALERIE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function trash($id)
    {
        // dd('trash');
        try {
            $indexTrashGallery = "GALERIE supprimés";
            $trashGallerys = $this->repo->selectAllOrderByTrashed(Gallery::class, 'deleted_at', 'desc');

            return view('', compact('indexTrashGallery', 'trashGalleries'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function publish($id)
    {
        // dd('publish');
        $gallery = $this->repo->findOrFail(Gallery::class, $id);
        try {
            $gallery->published_at = new DateTime();
            $gallery->user_publish_id = $this->user->id;
            $gallery->save();
            // dd('show');
            // return redirect()->back()->with('success', ['title' => "GALERIE", 'message' => "Publication effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Publication GALERIE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function archive($id)
    {
        // dd('archive');
        $gallery = $this->repo->findOrFail(Gallery::class, $id);
        try {
            $gallery->archived_at = new DateTime();
            $gallery->user_archive_id = $this->user->id;
            $gallery->save();
            // dd('show');
            // return redirect()->back()->with('success', ['title' => "GALERIE", 'message' => "Archivage effectué avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Archivage GALERIE", 'message' => "Veuillez contacter le développeur."]);
        }
    }
}
