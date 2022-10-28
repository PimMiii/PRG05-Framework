<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function beers(){
        return $this->hasMany(Beer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
