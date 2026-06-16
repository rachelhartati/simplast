<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;

class GajiController extends Controller
{
    public function index()
    {
        $gaji = Gaji::where('user_id', auth()->user()->id)->get();
        return view('gaji.index', compact('gaji'));
    }
}
