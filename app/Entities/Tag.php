<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = [
      'title', 'description'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
