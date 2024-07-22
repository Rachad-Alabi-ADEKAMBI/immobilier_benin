<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home'); // Redirect to login page or any other page
    }

    public function usersApi()
    {
        $data = User::orderByDesc('id')->get();

        return response()->json($data);
    }

    public function advertisersApi()
    {
        $data = User::orderByDesc('id')->get();

        return response()->json($data);
    }
}

