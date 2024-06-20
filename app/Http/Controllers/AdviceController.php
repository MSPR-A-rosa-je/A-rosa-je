<?php

namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use App\Models\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AdviceController extends Controller
{
    public function index()
    {
        $advices = Advice::all();

        return view('back.advices.index', compact('advices'));
    }

    public function create()
    {
        return view('back.advices.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => ValidationRules::MAX_STRING_LENGTH,
            'creation_date' => 'nullable|datetime',
            'description'   => 'required|string|max:2000',
            'owner_id'      => ValidationRules::REQ_INT,
            'like_number'   => 'nullable|integer'
        ]);

        try {
            $advice = Advice::create($validatedData);
            Log::info('Advice created: ' . $advice->id);

            return redirect()
                       ->route('advices.index')
                       ->with('success', 'Advice: ' . $advice->id . ' created successfully.');
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }

    public function show(Advice $advice)
    {
        return view('back.advices.show', compact('advice'));
    }

    public function edit(Advice $advice)
    {
        return view('back.advices.edit', compact('advice'));
    }

    public function update(Request $request, Advice $advice)
    {
        $validateData = $request->validate([
            'title'         => ValidationRules::MAX_STRING_LENGTH,
            'creation_date' => 'nullable|datetime',
            'description'   => 'required|string|max:2000',
            'owner_id'      => ValidationRules::REQ_INT,
            'like_number'   => 'nullable|integer'
        ]);

        $advice->update($validateData);

        return redirect()->route('advices.index')->with('success', 'Advice updated successfully');
    }

    public function destroy(Advice $advice)
    {
        try {
            $advice->delete();
            Log::info('advice deleted: ' . $advice->id);

            return redirect()
                       ->route('advices.index')
                       ->with('success', 'Advice: ' . $advice->id . 'deleted successfully ✅');
        } catch (\Exception $e) {
            return redirect()
                       ->route('advices.index')
                       ->with('error', 'An error occured while deleting the advice : ' . $e->getMessage() . '❌');
        }
    }
}
