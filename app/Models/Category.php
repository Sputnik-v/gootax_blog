<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'category',
        'active',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
