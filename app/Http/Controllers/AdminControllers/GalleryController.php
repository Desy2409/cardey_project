<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
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
        $indexGallery = "Mise à jour de la gallerie";

        return view('admin.pages.gallery', compact('indexGallery'));
    }
}
