<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AboutController extends Controller
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

    public function index()
    {
        $indexAbout = "Configuration des réseaux sociaux";

        $about = $this->repo->first(About::class);

        return view('admin.pages.about', compact('indexAbout', 'about'));
    }

    public function store(Request $request)
    {
        $this->validations($request);
        try {
            // dd('store', $request->all());

            $about = new About();
            $about->about_section_1 = $request->about_section_1;
            $about->about_section_2 = $request->about_section_2;
            $about->twitter = $request->twitter;
            $about->facebook = $request->facebook;
            $about->instagram = $request->instagram;
            $about->skype = $request->skype;
            $about->linkedin = $request->linkedin;
            $about->whatsapp = $request->whatsapp;
            $about->resume = $request->resume;
            $about->user_create_id = $this->user->id;
            $about->save();

            return redirect()->back()->with('success', ['title' => "RESEAUX SOCIAUX", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur RESEAUX SOCIAUX", 'message' => "Veuillez abouter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validations($request);
        $about = $this->repo->findOrFail(About::class, $id);
        try {
            // dd('update',$id);
            $about->about_section_1 = $request->about_section_1;
            $about->about_section_2 = $request->about_section_2;
            $about->twitter = $request->twitter;
            $about->facebook = $request->facebook;
            $about->instagram = $request->instagram;
            $about->skype = $request->skype;
            $about->linkedin = $request->linkedin;
            $about->whatsapp = $request->whatsapp;
            $about->whatsapp = $request->whatsapp;
            $about->resume = $request->resume;
            $about->user_edit_id = $this->user->id;
            $about->save();

            return redirect()->back()->with('success', ['title' => "RESEAUX SOCIAUX", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Modification RESEAUX SOCIAUX", 'message' => "Veuillez abouter le développeur."]);
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
    private function validationsOld($request)
    {
        try {
            $this->validate(
                $request,
                [
                    'twitter' => 'nullable|regex:/^(https?:\/\/)?(www\.)?twitter\.com\//',
                    'facebook' => 'nullable|regex:/^(https?:\/\/)?(www\.)?facebook\.com\//',
                    'instagram' => 'nullable|regex:/^(https?:\/\/)?(www\.)?instagram\.com\//',
                    'skype' => 'nullable|regex:/^(https?:\/\/)?join\.skype\.com\//',
                    'linkedin' => 'nullable|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\//',
                    'whatsapp' => 'nullable|regex:/^(https?:\/\/)?(www\.)?wa\.me\/|api\.whatsapp\.com/',
                ],
                [
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
