<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
        // Fetch users who are not banned and order by ID in descending order
        $data = User::where('situation', '!=', 'Banned')
                    ->where('role', '!=', 'admin')
                    ->orderBy('id', 'desc')
                    ->get();
    
        // Return the data as JSON
        return response()->json($data);
    }

    public function userApi($id)
    {
        // Find the user by ID
        $user = User::find($id);
    
        // Check if the user was found
        if (!$user) {
            // Return a 404 response if the user was not found
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // Return the user data as a JSON response
        return response()->json($user);
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

    public function profile(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        $user = Auth::user();
        return view('pages.back.user.profile', ['user' => $user]);
    
    }


    public function banUserApi(Request $request)
    {
        // Validate the request input
        $request->validate([
            'id' => 'required|integer|exists:ads,id',
            'reason' => 'required|string|max:255',
        ]);

        // Find the ad by id
        $user = User::find($request->input('id'));

        // Check if the ad exists
        if (!$user) {
            return response()->json(['error' => 'Ad not found'], 404);
        }

        // Update the ad
        $user->reason = $request->input('reason');
        $user->situation = 'Banned';
        $user->save();

        // Return a success response
        return response()->json(['message' => 'Utilisateur banni']);
    }

    public function updateUserApi(Request $request)
    {
        // Validation des données
        $request->validate([
            'phone' => 'required|string',
            'description' => 'nullable|string',
            'featured' => 'required|in:yes,no',
        ]);

        // Récupération de l'utilisateur actuel
        $user = Auth::user();

        // Mise à jour des informations de l'utilisateur
        $user->phone = $request->input('phone');
        $user->description = $request->input('description');
        $user->featured = $request->input('featured');
        $user->save();

        // Réponse API
        return view('pages.back.user.profile')->with('message', 'Profil mis à jour avec succès');   
    }

    public function updateUserPictureApi(Request $request)
    {
        // Validate the request input
        $request->validate([
            'id' => 'required|integer|exists:ads,id',
            '' => 'required|string|max:255',
        ]);

        // Find the ad by id
        $user = User::find($request->input('id'));

        // Check if the ad exists
        if (!$user) {
            return response()->json(['error' => 'Ad not found'], 404);
        }

        // Update the ad
        $user->reason = $request->input('reason');
        $user->description = 'Banned';
        $user->save();

        // Return a success response
        return response()->json(['message' => 'Utilisateur banni']);
    }

    public function deleteAccountApi(Request $request)
    {
        // Validate the request input
        $request->validate([
            'id' => 'required|integer|exists:ads,id',
            '' => 'required|string|max:255',
        ]);

        // Find the ad by id
        $user = User::find($request->input('id'));

        // Check if the ad exists
        if (!$user) {
            return response()->json(['error' => 'Ad not found'], 404);
        }

        // Update the ad
        $user->reason = $request->input('reason');
        $user->description = 'Banned';
        $user->save();

        // Return a success response
        return response()->json(['message' => 'Utilisateur banni']);
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

