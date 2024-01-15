<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title', 'text_message', 'user_create_id', 'user_edit_id', 'user_delete_id',
        'user_publish_id', 'published_at', 'user_archive_id', 'archived_at',
        'user_restore_id', 'restored_at'
    ];

    protected $appends = ['user_create', 'user_edit', 'user_delete', 'user_publish', 'user_archive', 'user_restore'];

    public function fileUploads()
    {
        return $this->hasMany(FileUpload::class);
    }

    public function getUserCreateAttribute()
    {
        return User::where('id', $this->user_create_id)->first();
    }

    public function getUserEditAttribute()
    {
        return User::where('id', $this->user_edit_id)->first();
    }

    public function getUserDeleteAttribute()
    {
        return User::where('id', $this->user_delete_id)->first();
    }

    public function getUserArchiveAttribute()
    {
        return User::where('id', $this->user_archive_id)->first();
    }

    public function getUserPublishAttribute()
    {
        return User::where('id', $this->user_publish_id)->first();
    }

    public function getUserRestoreAttribute()
    {
        return User::where('id', $this->user_restore_id)->first();
    }
}
