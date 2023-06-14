<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
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
        $indexContact = "Configuration des informations de contact";

        $contact = $this->repo->first(Contact::class);

        return view('admin.pages.contact', compact('indexContact', 'contact'));
    }

    public function store(Request $request)
    {
        $this->validations($request);
        try {
            // dd('store', $request->all());
            $contact = new Contact();
            $contact->longitude = $request->longitude;
            $contact->latitude = $request->latitude;
            $contact->address = $request->address;
            $contact->email = ($request->email_2 != null) ? $request->email_1 . ';' . $request->email_2 : $request->email_1; //. ';' . $request->email_3;
            $contact->phone = ($request->phone_2 != null) ? $request->phone_1 . ';' . $request->phone_2 : $request->phone_1; //. ';' . $request->phone_3;
            $contact->resume = $request->resume;
            $contact->user_create_id = $this->user->id;
            $contact->save();

            return redirect()->back()->with('success', ['title' => "INFOS CONTACT", 'message' => "Enregistrement effectué avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur INFOS CONTACT", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validations($request);
        $contact = $this->repo->findOrFail(Contact::class, $id);
        try {
            // dd('update',$id);
            $contact->longitude = $request->longitude;
            $contact->latitude = $request->latitude;
            $contact->address = $request->address;
            $contact->email = ($request->email_2 != null) ? $request->email_1 . ';' . $request->email_2 : $request->email_1; //. ';' . $request->email_3;
            $contact->phone = ($request->phone_2 != null) ? $request->phone_1 . ';' . $request->phone_2 : $request->phone_1; //. ';' . $request->phone_3;
            $contact->resume = $request->resume;
            $contact->user_edit_id = $this->user->id;
            $contact->save();

            return redirect()->back()->with('success', ['title' => "INFOS CONTACT", 'message' => "Modification effectuée avec succès."]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', ['title' => "Erreur Modification INFOS CONTACT", 'message' => "Veuillez contacter le développeur."]);
        }
    }

    private function validations($request)
    {
        $this->validate(
            $request,
            [
                'phone_1' => 'required',
                'email_1' => 'required|email',
            ],
            [
                'phone_1.required'=>"N° Téléphone 1 obligatoire.",
                'email_1.required'=>"Adresse email 1 obligatoire.",
                'email_1.email'=>"Adresse email non valide.",
            ]
        );
    }
}
