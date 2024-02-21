<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\Log;
use App\Constants\ValidationRules;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'creation_date' => 'nullable|datetime',
            'plants_list' => 'required|string|max:2000',
            'owner_id' => ValidationRules::REQ_INT,
            'mission_id' => ValidationRules::REQ_INT,
            'note' => 'nullable|string|max:2000'
        ]);

        try {
            $session = Session::create($validatedData);
            Log::info('Session created: ' . $session->id);
            return redirect()->route('sessions.index')->
            with('success', 'Session: ' . $session->id . ' created successfully.');
        } catch (\Throwable $e) {
            return "<div>test</div>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        $validateData = $request->validate([
            'creation_date' => 'nullable|datetime',
            'plants_list' => 'required|string|max:2000',
            'owner_id' => ValidationRules::REQ_INT,
            'mission_id' => ValidationRules::REQ_INT,
            'note' => 'nullable|string|max:2000'
        ]);

        $session->update($validateData);

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        try{
            $session->delete();
            Log::info('session deleted: '.$session->id);
            return redirect()->route('sessions.index')->
            with('success', 'Session: '.$session->id.'deleted successfully ✅');
        }catch (\Exception $e){
            return redirect()->route('sessions.index')->
            with('error', 'An error occured while deleting the session : '.$e->getMessage().'❌');
        }
    }
}
