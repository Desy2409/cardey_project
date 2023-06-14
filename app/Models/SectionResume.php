<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionResume extends Model
{
    use SoftDeletes;

    protected $fillable = ['home_first_title', 'home_second_title', 'gallery', 'team', 'faq'];
    // protected $fillable = [
    //     'home_first_title', 'home_second_title','about', 'contact', 'gallery', 'team',
    //     'faq', 'social'
    // ];
}
