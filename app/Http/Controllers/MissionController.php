<?php

namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::all();

        return view('missions.index', compact('missions'));
    }

    public function create()
    {
        return view('missions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_date'         => ValidationRules::DATE,
            'end_date'           => ValidationRules::DATE,
            'candidates_list'    => ValidationRules::MAX_STRING_LENGTH,
            'price'              => 'required|float',
            'description'        => 'required|long|max:2000',
            'number_of_sessions' => ValidationRules::REQ_INT,
            'plants_list'        => ValidationRules::MAX_STRING_LENGTH,
        ]);

        try {
            $mission = Mission::create($validatedData);
            Log::info('Mission created: ' . $mission->id);

            return redirect()
                       ->route('missions.index')
                       ->with('success', 'Mission: ' . $mission->id . ' created successfully.');
        } catch (\Throwable $e) {
            return '<div>test</div>';
        }
    }

    public function show(Mission $mission)
    {
        return view('missions.show', compact('mission'));
    }

    public function edit(Mission $mission)
    {
        return view('missions.edit', compact('mission'));
    }

    public function update(Request $request, Mission $mission)
    {
        $validateData = $request->validate([
            'start_date'         => ValidationRules::DATE,
            'end_date'           => ValidationRules::DATE,
            'owner_id'           => ValidationRules::REQ_INT,
            'candidates_list'    => ValidationRules::MAX_STRING_LENGTH,
            'price'              => 'required|float',
            'description'        => 'required|long|max:2000',
            'gardien_id'         => ValidationRules::REQ_INT,
            'number_of_sessions' => ValidationRules::REQ_INT,
            'plants_list'        => ValidationRules::MAX_STRING_LENGTH,
        ]);

        $mission->update($validateData);

        return redirect()->route('missions.index')->with('success', 'Mission updated successfully');
    }

    public function destroy(Mission $mission)
    {
        try {
            $mission->delete();
            Log::info('Mission deleted: ' . $mission->id);

            return redirect()
                       ->route('missions.index')
                       ->with('success', 'Mission: ' . $mission->id . 'deleted successfully ✅');
        } catch (\Exception $e) {
            return redirect()
                       ->route('missions.index')
                       ->with('error', 'An error occured while deleting the mission : ' . $e->getMessage() . '❌');
        }
    }
}
