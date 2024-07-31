<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function create(Request $request)
    {
        $ad = new Ad();

        $ad->name = $request->input('name');
        $ad->price = $request->input('price');
        $ad->description = $request->input('description');
        $ad->rooms = $request->input('rooms');
        $ad->bathrooms = $request->input('bathrooms');
        $ad->location = $request->input('location');
        $ad->category = $request->input('category');
        $ad->people = $request->input('people');
        $ad->size = $request->input('size');
        $ad->action = $request->input('action');
        $ad->user_id = auth()->id();

        $ad->situation = 'Disponible';
        $ad->views = 0;

        $pic1 = $request->file('pic1');
        if ($pic1) {
            $imagename = time() . '.' . $pic1->getClientOriginalExtension();
            $pic1->move(public_path('img/ads'), $imagename);
            $ad->pic1 = $imagename;
        }

        for ($i = 2; $i < 11; $i++) {
            $pic = 'pic' . $i;
            $file = $request->file($pic);

            if ($file) {
                $imagename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/ads'), $imagename);
                $ad->$pic = $imagename;
            }
        }

        $ad->save();

        return redirect('/dashboard')->with(
            'success',
            'Nouvelle annonce publiée !!!'
        );
    }

    public function search(Request $request)
    {
        $category = $request->input('category');
        $action = $request->input('action');
        $location = $request->input('location');

        $datas = Ad::where('category', $category)
        ->where('action', $action)
        ->where('location', $location)
        ->where('situation', 'Disponible')
        ->orderByDesc('id')
        ->get();

        return view('pages/front/results', compact('datas'));
        //return response()->json($datas);
    }


    public function editAd($id, Request $request)
    {
        $ad = Ad::find($id);

        $ad->name = $request->input('name');
        $ad->price = $request->input('price');
        $ad->description = $request->input('description');
        $ad->rooms = $request->input('rooms');
        $ad->bathrooms = $request->input('bathrooms');
        $ad->kitchens = $request->input('kitchens');
        $ad->parkings = $request->input('parkings');
        $ad->living_rooms = $request->input('living_rooms');
        $ad->warehouses = $request->input('warehouses');
        $ad->location = $request->input('location');

        $ad->area = $request->input('area');
        $ad->size = $request->input('size');
        $ad->offices = $request->input('offices');
        $ad->action = $request->input('action');
        $ad->category = $request->input('category');
        $ad->seller_id = auth()->id();

        $ad->status = 'Disponible';
        $ad->views = 0;
        $ad->shares = 0;

        $pic1 = $request->file('pic1');
        if ($pic1) {
            $imagename = time() . '.' . $pic1->getClientOriginalExtension();
            $pic1->move(public_path('img/ads'), $imagename);
            $ad->pic1 = $imagename;
        }

        for ($i = 2; $i < 8; $i++) {
            $pic = 'pic' . $i;
            $file = $request->file($pic);

            if ($file) {
                $imagename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/ads'), $imagename);
                $ad->$pic = $imagename;
            }
        }

        $ad->save();

        return redirect('/dashboard')->with('success', 'Annonce modifiée !!!');
    }


    public function stopAdApi(Request $request)
{
    // Validate the request input
    $request->validate([
        'id' => 'required|integer|exists:ads,id',
        'reason' => 'required|string|max:255',
    ]);

    // Find the ad by id
    $ad = Ad::find($request->input('id'));

    // Check if the ad exists
    if (!$ad) {
        return response()->json(['error' => 'Ad not found'], 404);
    }

    // Update the ad
    $ad->reason = $request->input('reason');
    $ad->situation = 'Stop';
    $ad->save();

    // Return a success response
    return response()->json(['message' => 'Annonce mise en stop']);
}

    

    /**
     * Store a newly created resource in storage.
     */
    public function adView($id)
    {
        $info = Ad::find($id);
    
        if (!$info) {
            return redirect('/ads')->with('error', "This page doesn't exist, error 404");
        }
    
        // Increment views count
        $info->views++;
        $info->save();
    
        $datas_first = DB::table('ads')
            ->select(
                'ads.*',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'users.phone as phone'
            )
            ->leftJoin('users', 'ads.user_id', '=', 'users.id')
            ->where('ads.id', '=', $id)
            ->first();
    
        $category = $info->category;
    
        $datas_second = Ad::where('category', $category)
            ->where('id', '!=', $id) // Exclude current ad
            ->take(3)
            ->get();
    
        return view('pages/front/ad', compact('datas_first', 'datas_second'));
       //return response()->json($datas_first);
    }
    


    public function allAds()
    {
        return view('pages/back/admin/allAds');
    }

    public function allAdsApi()
    {
        $data = Ad::orderByDesc('id')
            ->leftJoin('users', 'ads.user_id', '=', 'users.id')
            ->select('ads.*', 'users.first_name as user_first_name', 'users.last_name as user_last_name') // Combine columns in a single select
            ->get();
    
        return response()->json($data);
    }
    
    

    public function availableAdsApi()
    {
        $data = Ad::where('situation', 'Disponible')
            ->orderByDesc('id')
            ->get();

        return response()->json($data);
    }

    public function availableToRentApi()
    {
        $data = Ad::where('situation', 'Disponible')
            ->where('action', 'A louer')
            ->orderByDesc('id')
            ->get();

        return response()->json($data);
    }

    public function availableToSellApi()
    {
        $data = Ad::where('situation', 'Disponible')
            ->where('action', 'A vendre')
            ->orderByDesc('id')
            ->get();

        return response()->json($data);
    }

    public function lastAvailableAdsApi()
    {
        $data = Ad::where('status', 'Disponible')
            ->orderByDesc('id')
            ->take(2)
            ->get();

        return response()->json($data);
    }

    public function adApi($id)
    {
        $data = Ad::find($id);

        return response()->json($data);
    }

    public function myAdsApi()
    {
        $userId = auth()->id();
        $data = Ad::where('user_id', $userId)
            ->orderByDesc('id')
            ->get();

        return response()->json($data);
    }

    public function editAdView($id)
    {
        $data = Ad::find($id);

        return view('pages/back/users/edit', compact('data'));
    }

    public function deleteAdView($id)
    {
        $data = Ad::find($id);

        return view('pages/back/delete', compact('data'));
    }

    public function deleteAd($id)
    {
        $data = Ad::find($id);

        $data->delete();

        return redirect('/dashboard')->with('success', 'Annonce supprimée !!!');
    }

    public function adsView()
    {
        return view('pages/front/ads');
    }

    public function myAds()
    {
        return view('pages/back/users/myAds');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
