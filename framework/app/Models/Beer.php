<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    public function brewer(){
        return $this->belongsTo(Brewer::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
