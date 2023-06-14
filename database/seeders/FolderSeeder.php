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
        $existingFolder = Folder::where('affiliation', 'parent')->where('name', "DOSSIER RACINE")->first();
        if (!$existingFolder) {
            Folder::create([
                'affiliation' => 'parent',
                'name' => "DOSSIER RACINE",
                'path' => "DOSSIER RACINE",
            ]);

            Storage::makeDirectory("public/DOSSIER RACINE");
        }
    }
}
