<?php

namespace App\Http\Controllers\web;


use App\Http\Requests\LikeRequest;
use App\Models\Likes;
use App\Models\Post;

class LikesController
{
    public function store(LikeRequest $request): void
    {
        // Get validated data and add dynamic fields
        $validated = $request->validated();


       $like =  Likes::query()->firstOrCreate([
            'user_id' => $validated['user_id'],
            'likeable_id' => $validated['id'],
            'likeable_type' => $validated['likeable_type'],
        ]);
    }

    public function destroy(LikeRequest $request): void{
        $validated = $request->validated();

        Likes::query()->where(  'user_id' , $validated['user_id'])
            ->where( 'likeable_id', $validated['id'] )
            ->where( 'likeable_type', $validated['likeable_type'] )
            ->delete();
    }
}
