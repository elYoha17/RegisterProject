<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Register;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterManagmentController extends Controller
{
    public function manage(Register $register)
    {
        if(request()->user()->cannot('view', $register))
            abort(403);

        $presents = $register->agents()->get();
        $agents = Agent::where('user_id', $register->user_id)->orderBy('first_name')->get();

        return view('registers.manage', compact('register', 'agents', 'presents'));
    }

    public function add(Register $register, Agent $agent)
    {
        if(request()->user()->cannot('update', $register))
            abort(403);

        DB::table('agent_register')->insert([
            'agent_id' => $agent->id,
            'register_id' => $register->id,
        ]);

        return redirect()->route('registers.manage', $register);
    }
    
    public function remove(Register $register, Agent $agent)
    {
        if(request()->user()->cannot('update', $register))
            abort(403);

        DB::table('agent_register')->where([
            'agent_id' => $agent->id,
            'register_id' => $register->id,
        ])->delete();

        return redirect()->route('registers.manage', $register);
    }

    public function count(Register $register)
    {
        $count = $register->agents()->count();
        return response()->json([
            'count' => $count,
        ]);
    }
}
