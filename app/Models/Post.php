<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'category_id'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
