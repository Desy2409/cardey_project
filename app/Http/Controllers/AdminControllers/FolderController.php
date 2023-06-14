<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\FileUpload;
use App\Models\Folder;
use App\Repositories\FolderRepository;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    public $repo;
    public $user;
    public function __construct(FolderRepository $repo)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
        $this->repo = $repo;
    }

    public function index($id = null)
    {
        $folderIndex = "Dossiers";
        $folder = null;
        $parent = null;
        $folders = $this->repo->selectAllOrderBy(Folder::class, 'name', 'asc');

        if ($id) {
            $folder = $this->repo->findOrFail(Folder::class, $id);
            $parent = $this->repo->firstOne(Folder::class, 'id', $folder->folder_id);
        } 
        return view('admin.pages.folders.index', compact('parent', 'folder', 'folders', 'folderIndex'));
        // else {
        //     return view('admin.pages.folders.index', compact('parent', 'folder', 'folders', 'folderIndex'));
        // }
    }

    public function store(Request $request)
    {
        // dd('store');
        $this->storeValidations($request);
        try {
            if ($request->affiliation == 'parent') {
                // dd('parent');
                $existingFolder = $this->repo->firstTwo(Folder::class, 'folder_id', null, 'name', $request->name);
                if (!$existingFolder) {
                    $folder = new Folder();
                    $folder->affiliation = $request->affiliation;
                    $folder->name = $request->name;
                    $folder->path = $request->name; //'storage/'.
                    $folder->save();

                    Storage::makeDirectory('public/' . $folder->path);

                    return redirect()->back()->with('success', ['title' => "DOSSIER", 'message' => "Enregistrement effectué avec succès."]);
                    // return redirect()->back()->with('success',"Enregistrement effectué avec succès.");
                } else {
                    // dd('existe');
                    return redirect()->back()->with('error', ['title' => "DOSSIER", 'message' => "Le dossier « " . $request->name . " » existe déjà."]);
                }
            } else {
                // dd('child');
                $existingFolder = $this->repo->firstTwo(Folder::class, 'folder_id', $request->folder_id, 'name', $request->name);
                if (!$existingFolder) {

                    $parentFolder = $this->repo->findOrFail(Folder::class, $request->folder_id);

                    $folder = new Folder();
                    $folder->affiliation = $request->affiliation;
                    $folder->folder_id = $parentFolder->id;
                    // if ($parentFolder->path != null) {
                    $folder->path = $parentFolder->path . '/' . $request->name;
                    // }
                    $folder->name = $request->name;
                    $folder->save();

                    Storage::makeDirectory('public/' . $folder->path);

                    return redirect()->back()->with('success', ['title' => "DOSSIER", 'message' => "Enregistrement effectué avec succès."]);
                } else {
                    return redirect()->back()->with('error', ['title' => "DOSSIER", 'message' => "Le dossier « " . $request->name . " » existe déjà."]);
                }
            }
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with("error", ['title' => "Erreur création de dossier.", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        dd('update');
    }

    public function destroy($id)
    {
        try {
            $folder = $this->repo->findOrFail(Folder::class, $id);

            if (!empty($folder->fileUploads) && sizeof($folder->fileUploads) > 0) {
                foreach ($folder->fileUploads as $fileUpload) {
                    $fileUpload->user_delete_id = $this->user->id;
                    $fileUpload->save();
                    $fileUpload->delete();
                }
            }
            if (!empty($folder->children) && sizeof($folder->children) > 0) {
                foreach ($folder->children as $child) {
                    $child->user_delete_id = $this->user->id;
                    $child->save();
                    $child->delete();
                }
            }
            $folder->user_delete_id = $this->user->id;
            $folder->save();
            $folder->delete();

            return redirect()->back()->with('success', ['title' => "DOSSIER", 'message' => "Suppression effectuée avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with("error", ['title' => "Erreur suppression de dossier.", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function restore($id)
    {
        // dd('restore');
        try {
            $folder = $this->repo->firstOneTrashed(Folder::class, 'id', $id);

            $fileUploads = $this->repo->selectAllOneTrashed(FileUpload::class, 'folder_id', $folder->id);
            if (!empty($fileUploads) && sizeof($fileUploads) > 0) {
                foreach ($fileUploads as $fileUpload) {
                    $fileUpload->restored_at = new DateTime();
                    $fileUpload->user_restore_id = $this->user->id;
                    $fileUpload->save();
                    $fileUpload->restore();
                }
            }
            $children = $this->repo->selectAllOneTrashed(Folder::class, 'folder_id', $folder->id);
            // dd($children);
            if (!empty($children) && sizeof($children) > 0) {
                foreach ($children as $child) {
                    $child->restored_at = new DateTime();
                    $child->user_restore_id = $this->user->id;
                    $child->save();
                    $child->restore();
                }
            }
            $folder->user_restore_id = $this->user->id;
            $folder->restored_at = new DateTime();
            $folder->save();
            $folder->restore();

            return redirect()->back()->with('success', ['title' => "DOSSIER", 'message' => "Restauration effectuée avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with("error", ['title' => "Erreur restauration de dossier.", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    private function storeValidations($request)
    {
        $this->validate(
            $request,
            [
                'affiliation' => 'required',
                'name' => 'required'
            ],
            [
                'affiliation.required' => "Vous devez choisir une affiliation.",
                'name.required' => "Le nom du dossier est obligatoire.",
            ]
        );
    }

    private function updateValidations($request)
    {
    }
}
