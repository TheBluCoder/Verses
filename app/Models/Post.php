<?php

namespace App\Models;

use App\Models\Scopes\PostIsLikedScope;
use App\Models\Scopes\PublishedScope;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Traits\HasLikesAndIsLikedScope;
use Mews\Purifier\Casts\CleanHtmlOutput;


class Post extends Model
{
    /** @use HasFactory<PostFactory>
     *  @use HasLikesAndIsLikedScope */

    use HasFactory, HasLikesAndIsLikedScope;

    public $with = ['author'];
    protected $guarded = [];

    protected $casts= [
        "content" => CleanHtmlOutput::class,
    ];

    public function author():belongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id', relation: 'author');
    }

    public function likes(): MorphMany{
       return $this->morphMany(Likes::class, 'likeable' );
    }

    public function scopeTopPoems(Builder $query): void
    {
        $query->orderBy('likes_count', 'desc');
    }

    public function scopeCommentCount(Builder $query): void{
        $query->withCount('comments');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public static function booted(): void
    {
        static::addGlobalScope(new PublishedScope);
        static::addGlobalScope(new PostIsLikedScope);
    }


}
