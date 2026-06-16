<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\User;
use App\Models\Item;
use App\Models\Storan;
use App\Models\Gaji;
use App\Models\AgentStok;
use App\Models\AgentJob;
use App\Models\AgentRequest;
use App\Models\StoranAnggota;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = [];

        if ($user->hasRole('admin')) {
            $data['totalAgen']     = Agent::count();
           $data['totalAnggota'] = User::whereHas('roles', function($q) {
    $q->where('name', 'anggota');
})->count();
            $data['totalItem']     = Item::count();
            $data['totalSetoran']  = Storan::count();
            $data['totalUpah']     = Gaji::sum('total');
            $data['setoranTerbaru'] = Storan::with('agent')->latest()->take(5)->get();
            $data['requestTerbaru'] = AgentRequest::with('agent')->latest()->take(5)->get();
        }

        if ($user->hasRole('agent')) {
            $agentId = $user->agent_id;
            $data['totalAnggota']      = User::where('agent_id', $agentId)->count();
            $data['totalStok']         = AgentStok::where('agent_id', $agentId)->sum('jumlah_barang');
            $data['totalSetoran']      = StoranAnggota::where('agent_id', $agentId)->count();
            $data['totalDistribusi']   = AgentJob::where('agent_id', $agentId)->count();
            $data['setoranTerbaru']    = StoranAnggota::with('user', 'item')
                                            ->where('agent_id', $agentId)->latest()->take(5)->get();
            $data['distribusiTerbaru'] = AgentJob::with('user', 'item')
                                            ->where('agent_id', $agentId)->latest()->take(5)->get();
            $data['items']             = Item::all();
        }

        if ($user->hasRole('anggota')) {
            $data['totalPekerjaan']   = AgentJob::where('user_id', $user->id)->count();
            $data['totalItemDiterima']= AgentJob::where('user_id', $user->id)->sum('jumlah');
            $data['totalSetoran']     = StoranAnggota::where('user_id', $user->id)->count();
            $data['totalGaji']        = Gaji::where('user_id', $user->id)->sum('total');
            $data['pekerjaanTerbaru'] = AgentJob::with('agent', 'item')
                                            ->where('user_id', $user->id)->latest()->take(5)->get();
            $data['setoranTerbaru']   = StoranAnggota::with('item')
                                            ->where('user_id', $user->id)->latest()->take(5)->get();
        }

        return view('dashboard', $data);
    }
}
