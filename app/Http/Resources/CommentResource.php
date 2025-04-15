<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this->likesCount);
       return  [
                "id"=>$this->id,
                "author"=>$this->author,
                "content"=>$this->content,
                "likesCount"=>$this->likes_count,
                "postedOn"=>$this->created_at,
                'isLiked'=> $this->whenHas('is_liked', (bool)$this->is_liked, default: 0),
                "replies"=>CommentResource::collection($this->replies)->resolve(),
           ];
    }
}
