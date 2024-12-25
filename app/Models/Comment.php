<?php

namespace App\Models;

use App\Models\Scopes\CommentIsLikedScope;
use App\Models\Scopes\PostIsLikedScope;
use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Traits\HasLikesAndIsLikedScope;

class Comment extends Model
{
    /** @use HasFactory<CommentFactory>
     *     @use HasLikesAndIsLikedScope */
    use HasFactory, HasLikesAndIsLikedScope;


    public  $with=['replies','author'];
    protected $guarded= [];

    public function post():BelongsTo{
        return $this->belongsTo(Post::class);
    }

    public function replies(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function author(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id', relation: 'author' );
    }

    public function likes(): MorphMany{
        return $this->morphMany(Likes::class, 'likeable');
    }

    public static function  booted()
    {
        static::addGlobalScope(CommentIsLikedScope::class);
    }




}
