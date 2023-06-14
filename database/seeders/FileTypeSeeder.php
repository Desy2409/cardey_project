<?php

namespace Database\Seeders;

use App\Models\FileType;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file_type = File::get('database/datas/file_type.json');
        $fileTypes = json_decode($json_file_type);

        try {
            foreach ($fileTypes as $fileType) {
                $existingFolder = FileType::where('code', $fileType->code)->where('wording', $fileType->wording)->first();
                if (!$existingFolder) {
                    FileType::create([
                        'code' => $fileType->code,
                        'wording' => $fileType->wording,
                        'description' => $fileType->description,
                        'max_size' => $fileType->max_size,
                        'authorized_files' => $fileType->authorized_files,
                    ]);
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
