<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code', 'name', 'post', 'description', 'twitter', 'facebook', 'instagram', 'linkedin', 'whatsapp',
        'user_create_id', 'user_edit_id', 'user_delete_id', 'user_restore_id', 'restored_at'
    ];

    protected $appends = ['user_create', 'user_edit', 'user_delete', 'user_restore', 'restored_at'];

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

    public function getUserRestoreAttribute()
    {
        return User::where('id', $this->user_restore_id)->first();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
