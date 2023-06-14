<?php

namespace App\Http\Controllers\ShowControllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\SectionResume;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public $repo;
    public function __construct(BaseRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $about = $this->repo->first(About::class);
        $contact = $this->repo->first(Contact::class);
        $sectionResume = $this->repo->first(SectionResume::class);

        return view('showcase.pages.index', compact('about','contact','sectionResume'));
    }
}
