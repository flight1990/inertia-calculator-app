<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    public $table = 'seo';

    protected $fillable = [
        'url',
        'h1',
        'title',
        'description',
        'keywords',
        'robots',
        'no_index',
        'no_follow',
    ];

    protected $casts = [
        'no_index' => 'boolean',
        'no_follow' => 'boolean',
    ];
}
