<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Constants\ValidationRules;

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
            'pseudo' => ValidationRules::MAX_STRING_LENGTH,
            'first_name' => ValidationRules::MAX_STRING_LENGTH,
            'last_name' => ValidationRules::MAX_STRING_LENGTH,
            'email' => 'required|string|email|max:255|unique:users',
            'birth_date' => ValidationRules::DATE,
            'password' => 'required|string|min:6',
        ]);

        $validatedData['is_admin'] = false;
        $validatedData['is_botanist'] = false;
        $validatedData['creation_date'] = now();

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        try {
            $user = User::create($validatedData);
            Log::info('User created: ' . $user->pseudo);
            return redirect()->route('users.index')->
            with('success', 'User : ' . $user->pseudo . ' created successfully.');
        } catch (\Throwable $e) {
            return redirect()->route('users.index')->
            with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        error_log("dfghj");
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        error_log("AAAAAAA");
        $validatedData = $request->validate([
            'is_botanist' => 'required|boolean',
            'creation_date' => ValidationRules::DATE,
            'botanist_since' => 'nullable|date',
            'pseudo' => ValidationRules::MAX_STRING_LENGTH,
            'first_name' => ValidationRules::MAX_STRING_LENGTH,
            'last_name' => ValidationRules::MAX_STRING_LENGTH,
            'phone_number' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'birth_date' => ValidationRules::DATE,
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
            return redirect()->route('users.index')->
            with('success', 'User: ' . $user->pseudo . ' Edited successfully ✅');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->
            with('error', 'An error occurred while editing the user: ' . $e->getMessage() . '❌');
        }
    }
    public function destroy(User $user)
    {
        try {
            $user->delete();
            Log::info('User deleted: ' . $user->pseudo);
            return redirect()->route('users.index')->
            with('success', 'User: ' . $user->pseudo . ' deleted successfully ✅');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->
            with('error', 'An error occurred while deleting the user: ' . $e->getMessage() . '❌');
        }
    }
}
