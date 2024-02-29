<?php

namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();

        return view('back.plants.index', compact('plants'));
    }

    public function create()
    {
        return view('back.plants.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'specie_name' => ValidationRules::MAX_STRING_LENGTH,
            'location'    => ValidationRules::MAX_STRING_LENGTH,
            'url_photo'   => ValidationRules::MAX_STRING_LENGTH,
            'status'      => ValidationRules::MAX_STRING_LENGTH,
            'description' => 'required|long|max:2000',
        ]);

        try {
            $plant = Plant::create($validatedData);
            Log::info('Plant created: ' . $plant->id);

            return redirect()
                       ->route('plants.index')
                       ->with('success', 'Plant: ' . $plant->id . ' created successfully.');
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }

    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $validateData = $request->validate([
            'specie_name' => ValidationRules::MAX_STRING_LENGTH,
            'location'    => ValidationRules::MAX_STRING_LENGTH,
            'url_photo'   => ValidationRules::MAX_STRING_LENGTH,
            'status'      => ValidationRules::MAX_STRING_LENGTH,
            'description' => ValidationRules::MAX_STRING_LENGTH,
        ]);

        $plant->update($validateData);

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully');
    }

    public function destroy(Plant $plant)
    {
        try {
            $plant->delete();
            Log::info('Plant deleted: ' . $plant->id);

            return redirect()
                       ->route('plants.index')
                       ->with('success', 'Plant: ' . $plant->id . ' deleted successfully ✅');
        } catch (\Exception $e) {
            return redirect()
                       ->route('plants.index')
                       ->with('error', 'An error occured while deleting the plant : ' . $e->getMessage() . '❌');
        }
    }
}
