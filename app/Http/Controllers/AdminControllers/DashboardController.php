<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    
    public function index()
    {
        // dd($this->user);
        $user = $this->user;
        $dashboard = "Tableau de bord";

        return view('admin.pages.dashboard', compact('user','dashboard'));
    }
}
