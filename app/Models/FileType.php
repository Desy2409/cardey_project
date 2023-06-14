<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileType extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'wording', 'description', 'max_size', 'authorized_files'];

    protected $casts = [
        'authorized_files' => 'array'
    ];

    public function fileUploads()
    {
        return $this->hasMany(FileUpload::class);
    }
}
