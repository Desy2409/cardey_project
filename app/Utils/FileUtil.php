<?php

namespace App\Utils;

use App\Models\FileUpload;
use Exception;

class FileUtil
{


    public function storeFile($entity, $file, $personalizedFilename = null, $folder)
    {
        // dd('storeFile');
        try {
            // dd('1');
            if ($personalizedFilename) {
                // dd('if 1');
                $file->storeAs('public/' . $folder->path, $personalizedFilename . '.' . $file->getClientOriginalExtension());
            } else {
                // dd('else 1');
                $file->storeAs('public/' . $folder->path, $file->getClientOriginalName());
            }
            // dd('2');

            $fileSaved = FileUpload::create([
                "mime" => $file->getClientMimeType(),
                "original_filename" => $file->getClientOriginalName(),
                "filename" => ($personalizedFilename != null) ? $personalizedFilename . '.' . $file->getClientOriginalExtension() : $file->getClientOriginalName(),
                "link" => 'storage/' . $folder->path, //.'/'.$folder->name,//$this->storePath($entity->id, $name),
                "src" => ($personalizedFilename != null) ? 'storage/' . $folder->path . '/' . $personalizedFilename . '.' . $file->getClientOriginalExtension() : 'storage/' . $folder->path . '/' . $file->getClientOriginalName(), //.'/'.$folder->name,//$this->storePath($entity->id, $name),
                "personalized_filename" => $personalizedFilename,
                "folder_id" => $folder->id,
                "fileable_type" => get_class($entity),
                "fileable_id" => $entity->id
            ]);

            // dd('3');
            return $fileSaved;
        } catch (Exception $e) {
            return null;
        }
    }

    public function downloadFile($src)
    {
        // Chemin vers le fichier à télécharger
        // dd("=== filename ===", $filename);

        // $filePath = storage_path('app/public' . $filename);

        // dd("=== src ===", $src);

        if (file_exists($src)) {
            // Téléchargement du fichier
            // dd("=== file_exists($src) ===");
            // $file = $filePath . $filename;
            return response()->download($src);
        } else {
            // dd("=== else file_exists($src) ===");
            return response()->json(['error' => 'Fichier introuvable']);
        }
    }

    public function moveFileUpload($folder, $file)
    {
        if ($folder) {
            $file->store('public/' . $folder->path);
        }
        // $entityFolder = $this->path;
        // if ($this->addId) {
        //     $entityFolder .= '/' . $entity->id;
        // }

        // $extension = $file->getClientOriginalExtension();


        // if ($this->storage->exists($entityFolder)) {
        //     $this->storage->put($entityFolder . '/' . $name,  FileB::get($file));
        // } else {

        //     $this->storage->makeDirectory($entityFolder);
        //     $this->storage->put($entityFolder . '/' . $name,  FileB::get($file));
        // }
    }
}
