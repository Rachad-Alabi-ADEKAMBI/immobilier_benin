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
        // Find the user by id
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Fetch user details along with their ads
        $datas = DB::table('users')
            ->leftJoin('ads', 'ads.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->select(
                'users.id as user_id',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'users.phone as phone',
                'ads.name as ad_name',
                'ads.category as category',
                'ads.price as price',
                'ads.location as location',
                'ads.created_at as created_at',
                'ads.people as people',
                'ads.bathrooms as bathrooms',
                'ads.pic1 as pic1',
                'ads.size as size'
            )
            ->get();
    
        return response()->json($datas);
    }
    
}

