<?php

namespace App\Http\Requests;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\NoReturn;

class LikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You can add specific authorization logic here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => $this->getRouteValidationRule(),
            'user_id' => 'required|integer',
            'likeable_type' => 'required|string',
        ];
    }

    /**
     * Add additional attributes to validated data.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
            'likeable_type' => $this->getLikeableType(),
        ]);

    }

    /**
     * Determine validation rule based on the route.
     */
    private function getRouteValidationRule(): string
    {
        if ($this->routeIs('post.like', 'post.unlike')) {
            return 'required|exists:posts,id';
        } elseif ($this->routeIs('comment.like', 'comment.unlike')) {
            return 'required|exists:comments,id';
        }

        abort(400, 'Invalid route');
    }

    /**
     * Get the likeable type based on the route.
     */
    private function getLikeableType(): string
    {
        return $this->routeIs('post.like','post.unlike') ? Post::class : Comment::class;
    }
}
