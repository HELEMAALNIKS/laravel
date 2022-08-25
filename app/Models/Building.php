<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $table = 'buildings';
        public $timestamps = true;
    
    protected $casts = [];

    protected $fillable = [
            'title',
            'description',
            'architect',
            'constructionyear',
            'created_at',
            'image_path',
            'user_id'
        ];
}
