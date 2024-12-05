<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Likes extends Model
{
    /** @use HasFactory<\Database\Factories\LikesFactory> */
    use HasFactory;

    public $timestamps = false;

    public function post():BelongsTo{
        return $this->belongsTo(Post::class);
    }
}
