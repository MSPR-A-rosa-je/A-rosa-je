<?php

namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

const MAX_STRING_LENGTH = 255;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();

        return view('back.addresses.index.blade.php', compact('addresses'));
    }

    public function create()
    {
        return view('back.addresses.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'address'  => ValidationRules::MAX_STRING_LENGTH,
            'city'     => ValidationRules::MAX_STRING_LENGTH,
            'zip_code' => 'required|integer|max:10'
        ]);

        try {
            $address = Address::create($validateData);
            Log::info('Address created:' . $address->id);

            return redirect()
                       ->route('addresses.index.blade.php')
                       ->with('success', 'Address' . $address->id . 'created successfully.');
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }

    public function show(Address $address)
    {
        return view('back.addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        return view('back.addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $validateData = $request->validate([
            'address'  => ValidationRules::MAX_STRING_LENGTH,
            'city'     => ValidationRules::MAX_STRING_LENGTH,
            'zip_code' => 'required|integer|max:10'
        ]);

        $address->update($validateData);

        return redirect()
                   ->route('addresses.index.blade.php')
                   ->with('success', 'Adress updated successfully');
    }

    public function destroy(Address $address)
    {
        try {
            $address->delete();
            Log::info('Address deleted:' . $address->id);

            return redirect()->route('addresses.index.blade.php')->with(
                'success',
                'Adress: ' . $address->id . ' deleted successfully ✅'
            );
        } catch (\Exception $e) {
            return redirect()->route('addresses.index.blade.php')->with(
                'error',
                'An error occured while deleting the adress : ' . $e->getMessage() . '❌'
            );
        }
    }
}
