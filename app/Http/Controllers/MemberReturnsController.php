<?php

namespace App\Http\Controllers;

use App\Models\AgentJob;
use App\Models\Item;
use App\Models\MemberReturn;
use Illuminate\Http\Request;

class MemberReturnController extends Controller
{
    public function index()
    {
        $returns = MemberReturn::with('agentJob', 'user', 'item')
            ->whereHas('agentJob', function ($query) {
                $query->where('agent_id', auth()->user()->agent_id);
            })
            ->latest()
            ->get();
        return view('member_return.index', compact('returns'));
    }

    public function create()
    {
        $agentJobs = AgentJob::where('agent_id', auth()->user()->agent_id)
            ->where('status', AgentJob::STATUS_IN_PROGRESS)
            ->with('user', 'item')
            ->get();
        return view('member_return.create', compact('agentJobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_job_id' => 'required|exists:agent_job,id',
            'jumlah_pcs' => 'required|numeric|min:1',
            'tanggal_return' => 'required|date',
        ]);

        $agentJob = AgentJob::findOrFail($request->agent_job_id);

        MemberReturn::create([
            'agent_job_id' => $request->agent_job_id,
            'user_id' => $agentJob->user_id,
            'item_id' => $agentJob->item_id,
            'jumlah_pcs' => $request->jumlah_pcs,
            'tanggal_return' => $request->tanggal_return,
        ]);

        return redirect()->route('member-return.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $return = MemberReturn::with('agentJob', 'user', 'item')->findOrFail($id);
        return view('member_return.show', compact('return'));
    }

    public function destroy($id)
    {
        $return = MemberReturn::findOrFail($id);
        $return->delete();
        return redirect()->route('member-return.index')->with('success', 'Data berhasil dihapus');
    }
}