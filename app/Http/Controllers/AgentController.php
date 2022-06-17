<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::where('user_id', Auth::id())
            ->withCount('registers')->orderBy('first_name')->orderBy('last_name')->get();

        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgentRequest $request)
    {   
        $agent = Agent::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        Session::flash('success', "{$agent->first_name} {$agent->last_name} a été créé avec success");

        return redirect()->route('agents.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        if(request()->user()->cannot('view', $agent))
            abort(403);
        
        $registers = $agent->registers()->orderBy('date', 'desc')->withCount('agents')->get();

        return view('agents.show', compact('agent', 'registers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        if(request()->user()->cannot('view', $agent))
            abort(403);
            
        return view('agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgentRequest  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        if(request()->user()->cannot('update', $agent))
            abort(403);

        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->save();

        return redirect()->route('agents.show', compact('agent'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        if(request()->user()->cannot('delete', $agent))
            abort(403);

        $agent->delete();

        return redirect()->route('agents.index');
    }
}
