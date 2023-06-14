<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'about_section_1', 'about_section_2', 'twitter', 'facebook',
        'instagram', 'skype', 'linkedin', 'whatsapp','resume'
    ];
}
