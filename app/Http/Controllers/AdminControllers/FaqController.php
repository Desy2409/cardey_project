<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
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
        $indexFaq = "Foire aux questions";

        $faq = null;
        $faqs = $this->repo->selectAllOrderBy(Faq::class, 'created_at', 'asc');
        if ($id) {
            $faq = $this->repo->findOrFail(Faq::class, $id);
        }

        return view('admin.pages.faq', compact('indexFaq', 'faqs', 'faq'));
    }

    public function store(Request $request)
    {
        // dd('store');
        $this->storeValidations($request);
        try {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->response = $request->response;
            $faq->user_create_id = $this->user->id;
            $faq->save();

            return redirect()->back()->with('success', ['title' => "FOIRE AUX QUESTIONS", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur FOIRE AUX QUESTIONS", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd('update');
        $this->updateValidations($request, $id);
        $faq = $this->repo->findOrFail(Faq::class, $id);
        try {
            $faq->question = $request->question;
            $faq->response = $request->response;
            $faq->user_edit_id = $this->user->id;
            $faq->save();

            return redirect()->route('faq.index')->with('success', ['title' => "FOIRE AUX QUESTIONS", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur modification FOIRE AUX QUESTIONS", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function destroy($id)
    {
        // dd('destroy');
        $faq = $this->repo->findOrFail(Faq::class, $id);
        try {
            $faq->delete();

            return redirect()->back()->with('success', ['title' => "FOIRE AUX QUESTIONS", 'message' => "Suppression effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Suppression FOIRE AUX QUESTIONS", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function restore($id)
    {
        // dd('restore');
        $faq = $this->repo->findOrFail(Faq::class, $id);
        try {
            $faq->restore();
            return redirect()->back()->with('success', ['title' => "FOIRE AUX QUESTIONS", 'message' => "Restauration effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Restauration FOIRE AUX QUESTIONS", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function trash($id)
    {
        // dd('trash');
        try {
            $indexTrashFaq = "FAQ supprimés";
            $trashFaqs = $this->repo->selectAllOrderByTrashed(Faq::class, 'deleted_at', 'desc');

            return view('', compact('indexTrashFaq', 'trashFaqs'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    private function storeValidations($request)
    {
        // dd('storeValidations');
        $this->validate(
            $request,
            [
                'question' => 'required|unique:faqs',
                'response' => 'required|unique:faqs',
            ],
            [
                'question.required' => "La question est obligatoire.",
                'question.unique' => "Cette question a déjà été posée.",
                'response.required' => "La réponse est obligatoire",
                'response.unique' => "Cette réponse est déjà liée à une question",
            ]
        );
    }

    private function updateValidations($request, $id)
    {
        $this->validate(
            $request,
            [
                'question' => 'required|unique:faqs,question,' . $id,
                'response' => 'required|unique:faqs,response,' . $id,
            ],
            [
                'question.required' => "La question est obligatoire.",
                'question.unique' => "Cette question a déjà été posée.",
                'response.required' => "La réponse est obligatoire",
                'response.unique' => "Cette réponse est déjà liée à une question",
            ]
        );
    }
}
