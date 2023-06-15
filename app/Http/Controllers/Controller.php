<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function defaultStoreValidations($request, $tableName)
    {
        $this->validate($request, [
            'code' => 'required|min:3|max:10|unique:' . $tableName,
            'wording' => 'required|min:3|max:50|unique:' . $tableName,
            'description' => 'max:255',
        ], [
            'code.required' => "Le code est obligatoire.",
            'code.min' => "Le code doit contenir au minimum à 3 caractères.",
            'code.max' => "Le code doit contenir au maximum à 10 caractères.",
            'code.unique' => "Ce code existe déjà.",
            'wording.required' => "Le libellé est obligatoire.",
            'wording.min' => "Le libellé doit contenir au minimum à 3 caractères.",
            'wording.max' => "Le libellé doit contenir au maximum à 50 caractères.",
            'wording.unique' => "Ce libellé existe déjà.",
            'description.max' => "La description doit contenir au maximum 255 caractères.",
        ]);
    }

    public function defaultUpdateValidations($request, $tableName, $id)
    {
        $this->validate($request, [
            'code' => 'required|min:3|max:10|unique:' . $tableName . ',code,' . $id,
            'wording' => 'required|min:3|max:50|unique:' . $tableName . ',wording,' . $id,
            'description' => 'max:255',
        ], [
            'code.required' => "Le code est obligatoire.",
            'code.min' => "Le code doit contenir au minimum à 3 caractères.",
            'code.max' => "Le code doit contenir au maximum à 10 caractères.",
            'code.unique' => "Ce code existe déjà.",
            'wording.required' => "Le libellé est obligatoire.",
            'wording.min' => "Le libellé doit contenir au minimum à 3 caractères.",
            'wording.max' => "Le libellé doit contenir au maximum à 50 caractères.",
            'wording.unique' => "Ce libellé existe déjà.",
            'description.max' => "La description doit contenir au maximum 255 caractères.",
        ]);
    }
}
