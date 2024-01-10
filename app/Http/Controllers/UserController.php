<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pseudo' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'birth_date' => 'required|date',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['is_botanist'] = false;
        $validatedData['creation_date'] = now();

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        try {
            $user = User::create($validatedData);
            Log::info('User created: ' . $user->pseudo);
            return redirect()->route('users.index')->with('success', 'User: ' . $user->pseudo . ' created successfully.');
        } catch (\Throwable $e) {
            return "<div>test</div>";
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'is_botanist' => 'required|boolean',
            'creation_date' => 'required|date',
            'botanist_since' => 'nullable|date',
            'pseudo' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'birth_date' => 'required|date',
            'url_picture' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
            'address_id' => 'nullable|integer|exists:addresses,id'
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {

            unset($validatedData['password']);
        }
        try {
            $user->update($validatedData);
            Log::info('User updated: ' . $user->pseudo);
            return redirect()->route('users.index')->with('success', 'User: ' . $user->pseudo . ' Edited successfully ✅');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while editing the user: ' . $e->getMessage() . '❌');
        }
    }
    public function destroy(User $user)
    {
        try {
            $user->delete();
            Log::info('User deleted: ' . $user->pseudo);
            return redirect()->route('users.index')->with('success', 'User: ' . $user->pseudo . ' deleted successfully ✅');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while deleting the user: ' . $e->getMessage() . '❌');
        }
    }
}
