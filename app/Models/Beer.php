<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'percentage', 'description', 'brewer_id'];

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
        $this->rating = 0;
        foreach($this->reviews as $review){
            $this->rating += $review->rating;
        }
        if($this->reviews->count() > 0) {
            $this->rating = $this->rating / $this->reviews->count();
        }
        return $this->rating/10;
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('name', 'like', '%'.$filters['search'].'%')
                ->orWhere('description', 'like', '%'.$filters['search'].'%')
                ->orWhereRelation('reviews', 'comment', 'like', '%'.$filters['search'].'%');
        }

        if ($filters['searchCategory']?? false) {
            $i=0;
            foreach ($filters['searchCategory'] as $filterCategory)
                if($i===0) {
                    $query->whereRelation('categories', 'id', 'like', $filterCategory);
                    ;
                } else {
                    $query->orWhereRelation('categories', 'id', 'like', $filterCategory);
                }
        }
    }


    public function scopeVisible($query)
    {
        return $query->where('is_visible', 1);
    }
}
