<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
      'comment',
    ];

    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
