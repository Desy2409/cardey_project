<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Team;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
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
        $indexTeam = "Configuration de l'équipe";
        $posts = $this->repo->selectAllOrderBy(Post::class, 'wording', 'asc');

        return view('admin.pages.team', compact('indexTeam','posts'));
    }

    public function store(Request $request)
    {
        // dd('store');
        $this->storeValidations($request);
        try {
            $team = new Team();
            $team->code = $request->code;
            $team->name = $request->name;
            $team->post_id = $request->post_id;
            $team->description = $request->description;
            $team->twitter = $request->twitter;
            $team->facebook = $request->facebook;
            $team->instagram = $request->instagram;
            $team->skype = $request->skype;
            $team->linkedin = $request->linkedin;
            $team->whatsapp = $request->whatsapp;
            $team->user_create_id = $this->user->id;
            $team->save();

            return redirect()->back()->with('success', ['title' => "CONFIG. EQUIPE", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur CONFIG. EQUIPE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd('update');
        $this->updateValidations($request, $id);
        $team = $this->repo->findOrFail(Team::class, $id);
        try {
            $team->code = $request->code;
            $team->name = $request->name;
            $team->post_id = $request->post_id;
            $team->description = $request->description;
            $team->twitter = $request->twitter;
            $team->facebook = $request->facebook;
            $team->instagram = $request->instagram;
            $team->instagram = $request->instagram;
            $team->skype = $request->skype;
            $team->linkedin = $request->linkedin;
            $team->whatsapp = $request->whatsapp;
            $team->user_edit_id = $this->user->id;
            $team->save();

            return redirect()->route('team.index')->with('success', ['title' => "CONFIG. EQUIPE", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur modification CONFIG. EQUIPE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function destroy($id)
    {
        // dd('destroy');
        $team = $this->repo->findOrFail(Team::class, $id);
        try {
            $team->delete();
            $team->user_delete_id = $this->user->id;
            $team->save();

            return redirect()->back()->with('success', ['title' => "CONFIG. EQUIPE", 'message' => "Suppression effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Suppression CONFIG. EQUIPE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function restore($id)
    {
        // dd('restore');
        $team = $this->repo->findOrFail(Team::class, $id);
        try {
            $team->restore();
            $team->user_restore_id = $this->user->id;
            $team->save();

            return redirect()->back()->with('success', ['title' => "CONFIG. EQUIPE", 'message' => "Restauration effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Restauration CONFIG. EQUIPE", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function trash($id)
    {
        // dd('trash');
        try {
            $indexTrashTeam = "FAQ supprimés";
            $trashTeams = $this->repo->selectAllOrderByTrashed(Team::class, 'deleted_at', 'desc');

            return view('', compact('indexTrashTeam', 'trashTeams'));
        } catch (Exception $e) {
            dd($e);
        }
    }
}
