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
    /**
     * @OA\Get(
     *     path="/api/v1/plants",
     *     summary="Get all plants",
     *     tags={"Plants"},
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $plants = Plant::all();

        return response()->json($plants);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/plants",
     *     summary="Create a plant",
     *     tags={"Plants"},
     *
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="specie_name", type="string", example="My plant"),
     *                 @OA\Property(property="location", type="string", example="My location"),
     *                 @OA\Property(property="status", type="string", example="My status"),
     *                 @OA\Property(property="description", type="string", example="My description"),
     *                 @OA\Property(property="photo", type="string", format="binary"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="422", description="Unprocessable Entity")
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/v1/plants/{id}",
     *     summary="Update a plant",
     *     tags={"Plants"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="specie_name", type="string", example="My plant"),
     *                 @OA\Property(property="location", type="string", example="My location"),
     *                 @OA\Property(property="status", type="string", example="My status"),
     *                 @OA\Property(property="description", type="string", example="My description"),
     *                 @OA\Property(property="photo", type="string", format="binary"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="422", description="Unprocessable Entity")
     * )
     */
    public function update(Request $request, Plant $plant)
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

        if ($plant->update($plantData)) {
            Log::info('Plant updated: ' . $plant->id);
            return response()->json([
                'success' => true,
                'message' => 'Plant updated successfully.',
                'data'    => $plant
            ], 200);
        } else {
            Log::error('Failed to update plant.');
            return response()->json([
                'success' => false,
                'message' => 'Failed to update the plant.'
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/plants/{id}",
     *     summary="Delete a plant",
     *     tags={"Plants"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="500", description="Internal Server Error")
     * )
     */
    public function destroy(Plant $plant)
    {
        try {
            $plant->delete();
            Log::info('Plant deleted: ' . $plant->id);
            return response()->json([
                'success' => true,
                'message' => 'Plant deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to delete plant: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the plant.'
            ], 500);
        }
    }
}
