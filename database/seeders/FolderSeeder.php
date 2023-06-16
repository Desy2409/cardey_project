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
        $existingRootFolder = Folder::where('affiliation', 'parent')->where('name', "DOSSIER RACINE")->first();
        if (!$existingRootFolder) {
            Folder::create([
                'affiliation' => 'parent',
                'name' => "DOSSIER RACINE",
                'path' => "DOSSIER RACINE",
            ]);
            
            Storage::makeDirectory("public/DOSSIER RACINE");
        }

        $existingTeamFolder = Folder::where('affiliation', 'child')->where('name', "PHOTO EQUIPE")->first();
        if (!$existingTeamFolder) {
            Folder::create([
                'affiliation' => 'child',
                'name' => "PHOTO EQUIPE",
                'path' => "DOSSIER RACINE/PHOTO EQUIPE",
                'folder_id' => 1,
            ]);
            
            Storage::makeDirectory("public/DOSSIER RACINE/PHOTO EQUIPE");
        }
    }
}
