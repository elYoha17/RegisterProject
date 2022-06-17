<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use App\Models\Agent;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = Register::where('user_id', Auth::id())->orderBy('date', 'desc')->withCount('agents')->get();
        
        return view('registers.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisterRequest $request)
    {
        $register = Register::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
        ]);

        return redirect()->route('registers.manage', $register);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        if(request()->user()->cannot('view', $register))
            abort(403);

        $agents = $register->agents()->orderBy('first_name')->withCount('registers')->get();

        return view('registers.show', compact('register', 'agents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        if(request()->user()->cannot('view', $register))
            abort(403);

        return view('registers.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegisterRequest  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisterRequest $request, Register $register)
    {
        if(request()->user()->cannot('update', $register))
            abort(403);

        $register->date = $request->date;
        $register->save();

        return redirect()->route('registers.show', compact('register'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        if(request()->user()->cannot('delete', $register))
            abort(403);
        
        $register->delete();

        return redirect()->route('registers.index');
    }
}
