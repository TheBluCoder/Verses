<?php

namespace App\Models\Scopes;

use App\Models\Likes;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CommentIsLikedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $userId = Auth::id();
        $builder->selectSub( "SELECT EXISTS(SELECT 1 FROM likes WHERE likeable_id = comments.id AND user_id = $userId AND likeable_type = 'App\\Models\\Comment') ", "is_liked" );

    }
}
