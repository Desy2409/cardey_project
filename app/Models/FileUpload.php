<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileUpload extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'mime', 'original_filename', 'filename', 'link', 'src', 'personalized_filename',
        'size', 'folder_id', 'fileable_type', 'fileable_id', 'gallery_id'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function filetype()
    {
        return $this->belongsTo(FileType::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
