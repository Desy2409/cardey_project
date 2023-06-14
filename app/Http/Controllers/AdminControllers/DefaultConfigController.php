<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultConfigController extends Controller
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

    public function indexContact()
    {
        $indexContact = "Configuration des informations de contact";

        $contact = $this->repo->first(Contact::class);

        return view('admin.pages.contact', compact('indexContact','contact'));
    }
    public function indexTeam()
    {
    }
    public function indexAbout()
    {
    }
}
