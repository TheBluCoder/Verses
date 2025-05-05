<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

//        dd($this->all());
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'author' => $this->author,
            'likesCount' => $this->likes_count,
            'IsLiked'=> $this->whenHas('is_liked', (bool)$this->is_liked, default: 0),
            'published' => $this->created_at->format('Y-m-d H:i:s'),
            'commentCount'=> $this->whenCounted('comments'),
            'comments' => $this->whenLoaded('comments', fn () => CommentResource::collection($this->comments)->resolve()),
        ];

    }

}
