<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image_path',
        'recipe_data',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'recipe_data' => 'array'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
