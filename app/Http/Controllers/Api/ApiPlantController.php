<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiPlantController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'specie_name' => 'required|max:255',
            'location'    => 'required|max:255',
            'status'      => 'required|max:255',
            'description' => 'required|max:2000',
            'photo'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $plantData = $validator->validated();
        Log::info('Validated data:', $plantData);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/plants', $filename, 'public');
            $plantData['url_photo'] = url('/storage/' . $filePath);
        }

        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication is required.',
            ], 401);
        }

        $plantData['owner_id'] = Auth::id();

        $plant = Plant::create($plantData);

        if ($plant && $plant->exists) {
            Log::info('Plant created: ' . $plant->id);

            return response()->json([
                'success' => true,
                'message' => 'Plant created successfully.',
                'data' => $plant
            ], 201);
        } else {
            Log::error('Failed to create plant.');

            return response()->json([
                'success' => false,
                'message' => 'Failed to create the plant.'
            ], 500);
        }
    }
}
