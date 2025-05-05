<?php

namespace App\Http\Controllers\web;

use App\Http\Requests\CreateAccountRequest;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class UserController
{
    public function create(): \Inertia\Response
    {

        return Inertia::render('Auth/Register');
    }

    public function store(CreateAccountRequest $request): Application|Redirector|RedirectResponse
    {
        $validated = $request->validated();
        $newUser = User::create(Arr::except($validated, 'favorite'));
        return redirect('/login');
    }

    public function show(User $user): \Inertia\Response{
        $posts = $user->posts()->get();
        return Inertia::render('Profile/Show', ['user' => $user, 'posts'=> $posts ]);
    }
}
