<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $repo;
    public $user;
    public function __construct(BaseRepository $repo)
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
        $indexPost = "Configuration des postes";
        $post = null;
        $posts = $this->repo->selectAllOrderBy(Post::class, 'created_at', 'asc');
        if ($id) {
            $post = $this->repo->findOrFail(Post::class, $id);
        }
        return view('admin.pages.post', compact('indexPost', 'post', 'posts'));
    }

    public function store(Request $request)
    {
        // dd('store');
        $this->defaultStoreValidations($request, 'posts');
        try {
            $post = new Post();
            $post->code = $request->code;
            $post->wording = $request->wording;
            $post->description = $request->description;
            $post->user_create_id = $this->user->id;
            $post->save();

            return redirect()->back()->with('success', ['title' => "POSTE", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur POSTE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd('update');
        $this->defaultUpdateValidations($request, 'posts', $id);
        $post = $this->repo->findOrFail(Post::class, $id);
        try {
            $post->code = $request->code;
            $post->wording = $request->wording;
            $post->description = $request->description;
            $post->user_edit_id = $this->user->id;
            $post->save();

            return redirect()->route('post.index')->with('success', ['title' => "POSTE", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur modification POSTE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function destroy($id)
    {
        // dd('destroy');
        $post = $this->repo->findOrFail(Post::class, $id);
        try {
            $post->delete();
            $post->user_delete_id = $this->user->id;
            $post->save();

            return redirect()->back()->with('success', ['title' => "POSTE", 'message' => "Suppression effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Suppression POSTE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function restore($id)
    {
        // dd('restore');
        $post = $this->repo->findOrFail(Post::class, $id);
        try {
            $post->restore();
            $post->user_restore_id = $this->user->id;
            $post->save();

            return redirect()->back()->with('success', ['title' => "POSTE", 'message' => "Restauration effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Restauration POSTE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function trash($id)
    {
        // dd('trash');
        try {
            $indexTrashPost = "FAQ supprimés";
            $trashPosts = $this->repo->selectAllOrderByTrashed(Post::class, 'deleted_at', 'desc');

            return view('', compact('indexTrashPost', 'trashPosts'));
        } catch (Exception $e) {
            dd($e);
        }
    }
}
