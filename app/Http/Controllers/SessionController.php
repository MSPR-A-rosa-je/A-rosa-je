<?php

namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();

        return view('back.sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('back.sessions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'creation_date' => 'nullable|datetime',
            'plants_list'   => 'required|string|max:2000',
            'owner_id'      => ValidationRules::REQ_INT,
            'mission_id'    => ValidationRules::REQ_INT,
            'note'          => 'nullable|string|max:2000'
        ]);

        try {
            $session = Session::create($validatedData);
            Log::info('Session created: ' . $session->id);

            return redirect()
                       ->route('sessions.index.blade.php')
                       ->with('success', 'Session: ' . $session->id . ' created successfully.');
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }

    public function show(Session $session)
    {
        return view('back.sessions.show', compact('session'));
    }

    public function edit(Session $session)
    {
        return view('back.sessions.edit', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $validateData = $request->validate([
            'creation_date' => 'nullable|datetime',
            'plants_list'   => 'required|string|max:2000',
            'owner_id'      => ValidationRules::REQ_INT,
            'mission_id'    => ValidationRules::REQ_INT,
            'note'          => 'nullable|string|max:2000'
        ]);

        $session->update($validateData);

        return redirect()->route('sessions.index.blade.php')->with('success', 'Session updated successfully');
    }

    public function destroy(Session $session)
    {
        try {
            $session->delete();
            Log::info('session deleted: ' . $session->id);

            return redirect()
                       ->route('sessions.index.blade.php')
                       ->with('success', 'Session: ' . $session->id . 'deleted successfully ✅');
        } catch (\Exception $e) {
            return redirect()
                       ->route('sessions.index.blade.php')
                       ->with('error', 'An error occured while deleting the session : ' . $e->getMessage() . '❌');
        }
    }
}
