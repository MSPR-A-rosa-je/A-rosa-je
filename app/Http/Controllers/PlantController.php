<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Log;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plant::all();
        return view('plants.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'specie_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'url_photo' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'description' => 'required|long|max:2000',
        ]);

        try {
            $plant = Plant::create($validatedData);
            Log::info('Plant created: ' . $plant->id);
            return redirect()->route('plants.index')->with('success', 'Plant: ' . $plant->id . ' created successfully.');
        } catch (\Throwable $e) {
            return "<div>test</div>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $validateData = $request->validate([
            'specie_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'url_photo' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $plant->update($validateData);

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        try{
            $plant->delete();
            Log::info('Plant deleted: '.$plant->id);
            return redirect()->route('plants.index')->with('success', 'Plant: '.$plant->id.'deleted successfully ✅');
        }catch (\Exception $e){
            return redirect()->route('plants.index')->with('error', 'An error occured while deleting the plant : '.$e->getMessage().'❌');
        }
    }
}
