<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingRootFolder = Folder::where('affiliation', 'parent')->where('name', "CARDEY_TOGO")->first();
        if (!$existingRootFolder) {
            Folder::create([
                'affiliation' => 'parent',
                'name' => "CARDEY_TOGO",
                'path' => "CARDEY_TOGO",
            ]);
            
            Storage::makeDirectory("public/CARDEY_TOGO");
        }

        $existingTeamFolder = Folder::where('affiliation', 'child')->where('name', "PHOTO_EQUIPE")->first();
        if (!$existingTeamFolder) {
            Folder::create([
                'affiliation' => 'child',
                'name' => "PHOTO_EQUIPE",
                'path' => "CARDEY_TOGO/PHOTO_EQUIPE",
                'folder_id' => 1,
            ]);
            
            Storage::makeDirectory("public/CARDEY_TOGO/PHOTO_EQUIPE");
        }

        $existingGalleryFolder = Folder::where('affiliation', 'child')->where('name', "GALERIE")->first();
        if (!$existingGalleryFolder) {
            Folder::create([
                'affiliation' => 'child',
                'name' => "GALERIE",
                'path' => "CARDEY_TOGO/GALERIE",
                'folder_id' => 1,
            ]);
            
            Storage::makeDirectory("public/CARDEY_TOGO/GALERIE");
        }
    }
}
