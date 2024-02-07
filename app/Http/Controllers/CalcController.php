<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function result(Request $request)
    {
        $h = floatval($request->input('h'));
        $r = floatval($request->input('r'));
    
        $v = round(pi() * pow($r, 2) * $h,2);
        $p = round(2 * pi() * $r * ($r + $h),2);
    
        return view('calc')->with(['v' => $v, 'p' => $p]);
    }
}