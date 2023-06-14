<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'affiliation', 'path', 'folder_id', 'user_delete_id'];

    protected $appends = ['parent', 'user_delete'];

    public function parent()
    {
        // return Folder::where('id', $this->folder_id)->first();
        return $this->belongsTo(Folder::class);
    }

    public function children()
    {
        return $this->hasMany(Folder::class); //Folder::where('id', $this->folder_id)->first();
    }

    public function getParentAttribute()
    {
        return Folder::where('affiliation', 'child')->where('folder_id', $this->folder_id)->first();
    }

    public function getUserDeleteAttribute()
    {
        return User::where('id', $this->user_delete_id)->first();
    }

    public function fileUploads()
    {
        return $this->hasMany(FileUpload::class);
    }
}
