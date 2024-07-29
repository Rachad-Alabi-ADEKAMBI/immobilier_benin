<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $datas = User::orderByDesc('id')->get();

        $datas = User::where('featured', 'yes')
        ->orderByDesc('id')
        ->get();

        return response()->json($datas);
    }
    
    public function deleteUserApi($id, Request $request)
    {
        $user = User::find($id);

        $user->situation = 'Deleted';

        $user->save();

        return response()->json('success');
    }

    public function advertiserApi($id)
    {
        $datas = User::find($id);

        $datas = DB::table('users')
            ->select(
                'users.*',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'users.phone as phone'
            )
            ->leftJoin('ads', 'ads.user_id', '=', 'users.id')
            ->where('ads.user_id', '=', $id)
            ->get();

       return response()->json($datas);
    }
}

