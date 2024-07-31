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
        'index',
        'follow',
    ];

    protected $casts = [
        'index' => 'boolean',
        'follow' => 'boolean',
    ];
}
