<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Validation\ValidationException;

class CommentController
{
    //
    public function store(StoreCommentRequest $request): void
    {
        $validated = $request->validated();
        $model = [
            "user_id" => auth()->id(),
            "content" => $validated["comment"],
            "Commentable_id" => $validated['commentableId'],
        ];

        $validated['commentableType'] ==='post' ? $model['Commentable_type'] = Post::class : $model['Commentable_type'] = Comment::class;

        Comment::create($model);
    }

}
