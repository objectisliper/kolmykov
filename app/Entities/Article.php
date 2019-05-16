<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'short_text',
        'full_text',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /*Relations*/

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_articles', 'article_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_articles', 'article_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}
