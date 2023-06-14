<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\SectionResume;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeSectionController extends Controller
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
        $indexSectionResume = "Configuration des textes introductifs des sections";

        $sectionResume = $this->repo->first(SectionResume::class);

        return view('admin.pages.resume_sections', compact('indexSectionResume', 'sectionResume'));
    }

    public function store(Request $request)
    {
        // dd('store', $request->all());
        try {
            $sectionResume = new SectionResume();
            $sectionResume->home_first_title = $request->home_first_title;
            $sectionResume->home_second_title = $request->home_second_title;
            // $sectionResume->about = $request->about;
            // $sectionResume->contact = $request->contact;
            $sectionResume->gallery = $request->gallery;
            $sectionResume->team = $request->team;
            $sectionResume->faq = $request->faq;
            // $sectionResume->social = $request->social;
            $sectionResume->user_create_id = $this->user->id;
            $sectionResume->save();

            return redirect()->back()->with('success', ['title' => "RESUME SECTION", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur RESUME SECTION", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd('update',$id);
        $sectionResume = $this->repo->findOrFail(SectionResume::class, $id);
        try {
            // dd('update',$id);
            $sectionResume->home_first_title = $request->home_first_title;
            $sectionResume->home_second_title = $request->home_second_title;
            // $sectionResume->about = $request->about;
            // $sectionResume->contact = $request->contact;
            $sectionResume->gallery = $request->gallery;
            $sectionResume->team = $request->team;
            $sectionResume->faq = $request->faq;
            // $sectionResume->social = $request->social;
            $sectionResume->user_edit_id = $this->user->id;
            $sectionResume->save();

            return redirect()->back()->with('success', ['title' => "RESUME SECTION", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Modification RESUME SECTION", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    private function validations($request)
    {
    }
}
