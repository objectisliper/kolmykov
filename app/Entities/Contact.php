<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'description'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
