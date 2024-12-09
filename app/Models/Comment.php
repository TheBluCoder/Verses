<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Traits\HasPublishAndLikesScope;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory>
     *     @use HasPublishAndLikesScope */
    use HasFactory;


    public  $with=['replies','author'];
    public function post():BelongsTo{
        return $this->belongsTo(Post::class, );
    }

    public function replies(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function author(): BelongsTo{
        return $this->belongsTo(User::class );
    }




}
