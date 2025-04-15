<?php

namespace App\Http\Controllers\web;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class PostController
{
    //
    public function index(): Response
    {
        $posts = request()->path() === "top-posts"
            ? Post::query()->TopPoems()->CommentCount()->get()
            : Post::query()->latest()->CommentCount()->get();

        // Transform the collection with PostResource
        $posts = PostResource::collection($posts)->resolve();

        // Pass the transformed data to the Inertia view
        return Inertia::render('Home', [
            'posts' => $posts,
        ]);
    }


    public function show(int $id): Response
    {
        // Retrieve the post with eager-loaded relationships
        $post = Post::query()
            ->with(['comments'])
            ->find($id);

        if (!$post) {
            abort(404, 'Post not found');
        }

        return Inertia::render('Post/Show', [
            'post' => PostResource::make($post)->resolve(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Post/Create');
    }


    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        try {
            $newPost = Auth::user()->posts()->create($validated);

            return redirect()->route('home');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to create post', ['error' => $e->getMessage()]);

            // Provide a user-friendly error message
            return redirect()->back()->withErrors(['error' => 'Unable to save your post. Please try again later.']);
        }
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->back();
    }


}
