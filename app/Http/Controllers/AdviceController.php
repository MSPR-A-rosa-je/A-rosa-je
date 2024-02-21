<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advice;
use Illuminate\Support\Facades\Log;
use App\Constants\ValidationRules;

const MAX_STRING_LENGTH = 255;


class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advices = Advice::all();
        return view('advices.index', compact('advices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('advices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> ValidationRules::MAX_STRING_LENGTH,
            'creation_date' => 'nullable|datetime',
            'description' => 'required|string|max:2000',
            'owner_id' => ValidationRules::REQ_INT,
            'like_number' => 'nullable|integer'
        ]);

        try {
            $advice = Advice::create($validatedData);
            Log::info('Advice created: ' . $advice->id);
            return redirect()->route('advices.index')->
            with('success', 'Advice: ' . $advice->id . ' created successfully.');
        } catch (\Throwable $e) {
            return "<div>test</div>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Advice $advice)
    {
        return view('advices.show', compact('advice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advice $advice)
    {
        return view('advices.edit', compact('advice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advice $advice)
    {
        $validateData = $request->validate([
            'title'=> ValidationRules::MAX_STRING_LENGTH,
            'creation_date' => 'nullable|datetime',
            'description' => 'required|string|max:2000',
            'owner_id' => ValidationRules::REQ_INT,
            'like_number' => 'nullable|integer'
        ]);

        $advice->update($validateData);

        return redirect()->route('advices.index')->with('success', 'Advice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advice $advice)
    {
        try{
            $advice->delete();
            Log::info('advice deleted: '.$advice->id);
            return redirect()->route('advices.index')->with('success', 'Advice: '.$advice->id.'deleted successfully ✅');
        }catch (\Exception $e){
            return redirect()->route('advices.index')->
            with('error', 'An error occured while deleting the advice : '.$e->getMessage().'❌');
        }
    }
}
