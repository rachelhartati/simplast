<?php

namespace App\Http\Controllers;
use App\MOdels\AgentStok;
use App\Models\Item;
use App\Models\User;

use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index(){
        $agentstok = AgentStok::where(id)->match->user->agent_id;
        $item = Item::all();
        $user = User::all();
        return view('distribusi.distribusi', compact('item', 'user', 'agentstok'));
    }

    
}
