<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileTypeController extends Controller
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
    }

    public function store(Request $request)
    {
        try {
            //code...
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->with('error',['title'=>"ERREUR ENREGISTREMENT",'message'=>"Veuillez contacter l'administrateur.'"]);
        }
    }

    public function update($id)
    {
        try {
            //code...
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->with('error',['title'=>"ERREUR MODIFICATION",'message'=>"Veuillez contacter l'administrateur.'"]);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->with('error',['title'=>"ERREUR SUPPRESSION",'message'=>"Veuillez contacter l'administrateur.'"]);
        }
    }

    public function restore($id)
    {
        try {
            //code...
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->with('error',['title'=>"ERREUR RESTAURATION",'message'=>"Veuillez contacter l'administrateur.'"]);
        }
    }

    private function storeValidations($request)
    {
    }

    private function updateValidations($request, $id)
    {
    }
}
