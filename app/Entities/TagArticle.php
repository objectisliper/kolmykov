<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
    protected $table = 'tag_articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tag_id',
        'article_id',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
