<?php

namespace App\Models\Scopes;

use App\Models\Likes;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class PostIsLikedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $userId = Auth::id()?? "null";
        $builder->selectSub(function ($query) use ($userId) {
            $query->selectRaw(
                'EXISTS(SELECT 1 FROM likes WHERE likeable_id = posts.id AND user_id = ? AND likeable_type = ?)',
                [$userId, 'App\Models\Post']
            );
        }, 'is_liked');

    }
}
