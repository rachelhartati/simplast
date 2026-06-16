<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentJob;

class PekerjaanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:anggota']);
    }

    public function index()
    {
        $pekerjaan = AgentJob::with(['agent', 'item'])
                             ->where('user_id', auth()->id())
                             ->orderByDesc('tanggal_diberikan')
                             ->get();

        return view('pekerjaan', compact('pekerjaan'));
    }
}
