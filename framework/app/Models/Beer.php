<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'percentage', 'description'];

    public function brewer(){
        return $this->belongsTo(Brewer::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function calculateRating() {
        $rating = 0;
        foreach($this->reviews as $review){
            $rating += $review->rating;
        }
        if($this->reviews->count() > 0) {
            $rating = $rating / $this->reviews->count();
        }
        return $rating;
    }
}
