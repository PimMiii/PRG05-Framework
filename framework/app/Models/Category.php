<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function beers(){
        return $this->belongsToMany(Beer::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', 1);
    }
}
