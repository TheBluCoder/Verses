<?php

namespace App\Http\Controllers\web;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\api\Permissions\v1\Abilities;

class LoginController
{


    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $validated = $request->validated();
        $remember_me = $request->get('remember_me');

        if(!Auth::attempt($validated,$remember_me)){

           throw \Illuminate\Validation\ValidationException::withMessages(['credentials'=>"username or password incorrect"]);

        }
        $token =$request->user()->createToken(config('app.name'),Abilities::getAbilities($request->user()), now()->addDay() )->plainTextToken;
        session()->put('token',$token);
        $request->session()->regenerate();
        return redirect()->intended('/');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::user()->tokens()->delete();
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken(); // Prevent CSRF attacks after logout


        // Clear the session cookie on the user's browser
        return redirect('/')->withCookie(cookie()->forget('laravel_session'));
    }

}
