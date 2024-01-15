<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Post;
use App\Models\Team;
use App\Repositories\BaseRepository;
use App\Utils\FileUtil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class TeamController extends Controller
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
        $indexTeam = "Configuration de l'équipe";
        $team = null;
        $posts = $this->repo->selectAllOrderBy(Post::class, 'wording', 'asc');
        if ($id) {
            $team = $this->repo->findOrFail(Team::class, $id);
        }

        return view('admin.pages.team', compact('indexTeam', 'team', 'posts'));
    }

    public function store(Request $request)
    {
        // dd('store');
        $this->storeValidations($request);
        // $this->validations($request);
        // dd('stop');
        try {
            $team = new Team();
            $team->code = $request->code;
            $team->name = $request->name;
            $team->post_id = $request->post_id;
            $team->biography = $request->biography;
            $team->twitter = $request->twitter;
            $team->facebook = $request->facebook;
            $team->instagram = $request->instagram;
            $team->skype = $request->skype;
            $team->linkedin = $request->linkedin;
            $team->whatsapp = $request->whatsapp;
            $team->user_create_id = $this->user->id;
            $team->save();

            $photoProfile = $request->file('profile_photo');
            // Upload de la photo de profil
            if ($photoProfile) {
                // dd('enter===');
                // $teamFolder = Folder::where('affiliation', 'parent')->where('name', "PHOTO_EQUIPE")->first();
                $teamFolder = $this->repo->firstTwo(Folder::class, 'affiliation', 'child', 'name', 'PHOTO_EQUIPE');
                $photoProfileFileUpload = $this->fileUtil->storeFile($team, $photoProfile, 'profile-' . rand(0, 500), $teamFolder);
            }

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
            $team->biography = $request->biography;
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

    private function validations($request)
    {
        try {
            $this->validate(
                $request,
                [
                    'twitter' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\//'],
                    'facebook' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\//'],
                    'instagram' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\//'],
                    'linkedin' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\//'],
                    'skype' => ['nullable', 'regex:/^(https?:\/\/)?join\.skype\.com\//'],
                    'whatsapp' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?(wa\.me\/|api\.whatsapp\.com)/'],
                ],
                [
                    'twitter.regex' => "Le lien doit être un lien Twitter valide.",
                    'facebook.regex' => "Le lien doit être un lien Facebook valide.",
                    'instagram.regex' => "Le lien doit être un lien Instagram valide.",
                    'linkedin.regex' => "Le lien doit être un lien LinkedIn valide.",
                    'skype.regex' => "Le lien doit être un lien Skype valide.",
                    'whatsapp.regex' => "Le lien doit être un lien WhatsApp valide.",
                ]
            );
        } catch (ValidationException $e) {
            throw $e; // Lancer l'exception pour arrêter le processus
        }
    }

    private function storeValidations($request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'profile_photo' => 'dimensions:width=239,height=308',
        //         'code' => 'required|min:3|max:10|unique:teams',
        //         'post_id' => 'required',
        //         'name' => 'required|unique:teams',
        //         'biography' => 'required',
        //         'twitter' => 'nullable|regex:/^(https?:\/\/)?(www\.)?twitter\.com\//',
        //         'facebook' => 'nullable|regex:/^(https?:\/\/)?(www\.)?facebook\.com\//',
        //         'instagram' => 'nullable|regex:/^(https?:\/\/)?(www\.)?instagram\.com\//',
        //         'skype' => 'nullable|regex:/^(https?:\/\/)?join\.skype\.com\//',
        //         'linkedin' => 'nullable|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\//',
        //         'whatsapp' => 'nullable|regex:/^(https?:\/\/)?(www\.)?wa\.me\/|api\.whatsapp\.com\//',
        //     ],
        //     [
        //         'profile_photo.dimensions' => "Le format de l'image doit être de 239x308 pixels.",
        //         'code.required' => "Le code est obligatoire.",
        //         'code.min' => "Le code doit contenir au minimum 3 caractères.",
        //         'code.max' => "Le code doit contenir au maximum 10 caractères.",
        //         'code.unique' => "Ce code existe déjà.",
        //         'post_id.required' => "Le poste est obligatoire.",
        //         'name.required' => "Le nom complet est obligatoire.",
        //         'biography.required' => "La biographie est obligatoire.",
        //         'twitter.regex' => "Le lien doit être un lien Twitter.",
        //         'facebook.regex' => "Le lien doit être un lien Facebook.",
        //         'instagram.regex' => "Le lien doit être un lien Instagram.",
        //         'skype.regex' => "Le lien doit être un lien Skype.",
        //         'linkedin.regex' => "Le lien doit être un lien Linkedin.",
        //         'whatsapp.regex' => "Le lien doit être un lien Whatsapp.",
        //     ]
        // );

        try {
            $this->validate(
                $request,
                [
                    // 'profile_photo' => 'dimensions:width=239,height=308',
                    'profile_photo' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'code' => 'required|min:3|max:10|unique:teams',
                    'post_id' => 'required',
                    'name' => 'required|unique:teams',
                    'biography' => 'required',
                    'twitter' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\//'],
                    'facebook' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\//'],
                    'instagram' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\//'],
                    'linkedin' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\//'],
                    'skype' => ['nullable', 'regex:/^(https?:\/\/)?join\.skype\.com\//'],
                    'whatsapp' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?(wa\.me\/|api\.whatsapp\.com)/'],
                ],
                [
                    // 'profile_photo.dimensions' => "Le format de l'image doit être de 239x308 pixels.",
                    'profile_photo.required' => "La photo de profil est obligatoire.",
                    'profile_photo.max' => "Taille maximale de l'image : 2Mo.",
                    'profile_photo.mimes' => "Type d'image autorisé : JPG, JPEG et PNG.",
                    // 'profile_photo.dimensions' => "Le format de la photo de profil doit être de 239x308 pixels.",
                    'code.required' => "Le code est obligatoire.",
                    'code.min' => "Le code doit contenir au minimum à 3 caractères.",
                    'code.max' => "Le code doit contenir au maximum à 10 caractères.",
                    'code.unique' => "Ce code existe déjà.",
                    'post_id.required' => "Le poste est obligatoire.",
                    'name.required' => "Le nom complet est obligatoire.",
                    'biography.required' => "La biographie est obligatoire.",
                    'twitter.regex' => "Le lien doit être un lien Twitter.",
                    'facebook.regex' => "Le lien doit être un lien Facebook.",
                    'instagram.regex' => "Le lien doit être un lien Instagram.",
                    'skype.regex' => "Le lien doit être un lien Skype.",
                    'linkedin.regex' => "Le lien doit être un lien Linkedin.",
                    'whatsapp.regex' => "Le lien doit être un lien Whatsapp.",
                ]
            );
        } catch (ValidationException $e) {
            throw $e; // Lancer l'exception pour arrêter le processus
        }
    }

    private function updateValidations($request, $id)
    {
        try {
            $this->validate(
                $request,
                [
                    'profile_photo' => 'dimensions:width=239,height=308',
                    'code' => 'required|min:3|max:10|unique:teams,code,' . $id,
                    'post_id' => 'required',
                    'name' => 'required|unique:teams,name,' . $id,
                    'biography' => 'required',
                    'twitter' => 'nullable|regex:/^(https?:\/\/)?(www\.)?twitter\.com\//',
                    'facebook' => 'nullable|regex:/^(https?:\/\/)?(www\.)?facebook\.com\//',
                    'instagram' => 'nullable|regex:/^(https?:\/\/)?(www\.)?instagram\.com\//',
                    'skype' => 'nullable|regex:/^(https?:\/\/)?join\.skype\.com\//',
                    'linkedin' => 'nullable|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\//',
                    'whatsapp' => 'nullable|regex:/^(https?:\/\/)?(www\.)?wa\.me\/|api\.whatsapp\.com/',
                ],
                [
                    'profile_photo.dimensions' => "Le format de l'image doit être de 239x308 pixels.",
                    'code.required' => "Le code est obligatoire.",
                    'code.min' => "Le code doit contenir au minimum à 3 caractères.",
                    'code.max' => "Le code doit contenir au maximum à 10 caractères.",
                    'code.unique' => "Ce code existe déjà.",
                    'post_id.required' => "Le poste est obligatoire.",
                    'name.required' => "Le nom complet est obligatoire.",
                    'biography.required' => "La biographie est obligatoire.",
                    'twitter.regex' => "Le lien doit être un lien Twitter.",
                    'facebook.regex' => "Le lien doit être un lien Facebook.",
                    'instagram.regex' => "Le lien doit être un lien Instagram.",
                    'skype.regex' => "Le lien doit être un lien Skype.",
                    'linkedin.regex' => "Le lien doit être un lien Linkedin.",
                    'whatsapp.regex' => "Le lien doit être un lien Whatsapp.",
                ]
            );
        } catch (ValidationException $e) {
            throw $e; // Lancer l'exception pour arrêter le processus
        }
    }
}
