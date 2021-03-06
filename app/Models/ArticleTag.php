<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends Model
{
    use HasFactory,SoftDeletes;

    public function tagName()
    {
        return $this->belongsTo('App\Models\Tag', 'tagId', 'id');
    }
}
