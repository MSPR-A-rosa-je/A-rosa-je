<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use Illuminate\Support\Facades\Log;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = Mission::all();
        return view('missions.index', compact('missions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('missions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|datetime',
            'end_date' => 'required|datetime',
            'candidates_list' => 'required|string|max:255',
            'price' => 'required|float',
            'description' => 'required|long|max:2000',
            'number_of_sessions' => 'required|integer',
            'plants_list' => 'required|string|max:255',
        ]);

        try {
            $mission = Mission::create($validatedData);
            Log::info('Mission created: ' . $plant->id);
            return redirect()->route('missions.index')->with('success', 'Mission: ' . $mission->id . ' created successfully.');
        } catch (\Throwable $e) {
            return "<div>test</div>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        return view('missions.show', compact('mission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mission $mission)
    {
        return view('missions.edit', compact('mission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mission $mission)
    {
        $validateData = $request->validate([
            'start_date' => 'required|datetime',
            'end_date' => 'required|datetime',
            'owner_id' => 'required|integer',
            'candidates_list' => 'required|string|max:255',
            'price' => 'required|float',
            'description' => 'required|long|max:2000',
            'gardien_id' => 'required|integer',
            'number_of_sessions' => 'required|integer',
            'plants_list' => 'required|string|max:255',
        ]);

        $mission->update($validateData);

        return redirect()->route('missions.index')->with('success', 'Mission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mission $mission)
    {
        try{
            $mission->delete();
            Log::info('Mission deleted: '.$mission->id);
            return redirect()->route('missions.index')->with('success', 'Mission: '.$mission->id.'deleted successfully ✅');
        }catch (\Exception $e){
            return redirect()->route('missions.index')->with('error', 'An error occured while deleting the mission : '.$e->getMessage().'❌');
        }
    }
}
