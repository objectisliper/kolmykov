<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'description'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
