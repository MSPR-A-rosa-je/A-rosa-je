<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|integer|max:10'
        ]);

        try{
            $address = Address::create($validateData);
            Log::info('Address created:'.$address->id);
            return redirect()->route('addresses.index')->with('success', 'Address'.$address->id.'created successfully.');
        } catch (\Throwable $e){
            return "<div>test</div>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $validateData = $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|integer|max:10'
        ]);

        $address->update($validateData);

        return redirect()->route('addresses.index')->with('success', 'Adress updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address$address)
    {
        try{
            $address->delete();
            Log::info('Address deleted:'.$address->id);
            return redirect()->route('addresses.index')->with(
                'success', 'Adress: '.$address->id.' deleted successfully ✅');
        }catch(\Exception $e){
            return redirect()->route('addresses.index')->with('error', 'An error occured while deleting the adress : '.$e->getMessage().'❌');
        }
    }
}
