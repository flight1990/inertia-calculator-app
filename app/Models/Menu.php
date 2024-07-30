<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = [
        'title',
        'url',
        '_lft',
        '_rgt',
        'parent_id'
    ];
}
