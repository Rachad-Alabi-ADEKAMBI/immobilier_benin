<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class HomeController extends Controller
{
    public function home()
    {   
        $datas_first = Ad::where('situation', 'Disponible')
        ->orderByDesc('id')
        ->take(3)
        ->get();

        $datas_second = Ad::where('situation', 'Disponible')
        ->orderByDesc('id')
        ->take(3)
        ->get();
      
        return view('/pages/front/welcome', compact('datas_first'), compact('datas_second'));
    }
}
