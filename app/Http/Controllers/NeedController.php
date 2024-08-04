<?php

namespace App\Http\Controllers;

use App\Models\Need;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function create(Request $request)
     {
         $need = new Need();
 
         $need->category = $request->input('category');
         $need->action = $request->input('action');
         $need->location = $request->input('location');
         $need->user_id = Auth::id();
         $need->save();
 
         return redirect('/home')->with(
             'success',
             'Nouvelle demande personnlisée publiée !!!'
         );
     }

    public function needsApi()
    {
        $data = Need::orderByDesc('id')
        ->leftJoin('users', 'needs.user_id', '=', 'users.id')
        ->select('needs.*', 'users.first_name as user_first_name', 'users.last_name as user_last_name', 'users.phone as user_phone')
        ->get();

        return response()->json($data);
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
