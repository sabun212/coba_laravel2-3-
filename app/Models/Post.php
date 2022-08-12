<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;


    protected $guarded = ['id'];
    protected $with = ['category', 'author'];


    public function scopeFilter($query, array $filters){
        // if(isset($filters['search'])? $filters['search'] : false) {
        //     return $query->where('title','like','%' .$filters['search']. '%')
        //     ->orWhere('body','like','%' . $filters['search']. '%' );
        // }

        //search all

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title','like','%' .$search. '%')
            ->orWhere('body','like','%' . $search. '%' );
        });

        //search dari category
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->WhereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        //search dari author nya
        $query->when($filters['author'] ?? false,fn ($query, $author)=>
        $query->whereHas('author', fn($query)=>
        $query->where('name', $author))
    );
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
