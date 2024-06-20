<?php

namespace App\Http\Controllers\Api;

use App\Constants\ValidationRules;
use App\Models\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ApiAdvicesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/advices",
     *     tags={"Advices"},
     *     summary="Get all advices",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $advices = Advice::all();
        return response()->json($advices);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/advices",
     *     tags={"Advices"},
     *     summary="Create a new advice",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", maxLength=255),
     *             @OA\Property(property="creation_date", type="date"),
     *             @OA\Property(property="description", type="string", maxLength=2000),
     *             @OA\Property(property="owner_id", type="integer"),
     *             @OA\Property(property="like_number", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Successful operation")
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => ValidationRules::MAX_STRING_LENGTH,
            'creation_date' => 'nullable|date',
            'description'   => 'required|string|max:2000',
            'owner_id'      => 'required|integer',
            'like_number'   => 'nullable|integer'
        ]);

        try {
            $advice = Advice::create($validatedData);
            Log::info('Advice created: ' . $advice->id);
            return response()->json(['message' => 'Advice created successfully', 'data' => $advice], 201);
        } catch (\Throwable $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to create advice', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/advices/{id}",
     *     summary="Get an advice by ID",
     *     tags={"Advices"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Advice $advice)
    {
        return response()->json($advice);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/advices/{id}",
     *     summary="Update an advice by ID",
     *     tags={"Advices"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", maxLength=255),
     *             @OA\Property(property="creation_date", type="date"),
     *             @OA\Property(property="description", type="string", maxLength=2000),
     *             @OA\Property(property="owner_id", type="integer"),
     *             @OA\Property(property="like_number", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function update(Request $request, Advice $advice)
    {
        $validateData = $request->validate([
            'title'         => ValidationRules::MAX_STRING_LENGTH,
            'creation_date' => 'nullable|date',
            'description'   => 'required|string|max:2000',
            'owner_id'      => 'required|integer',
            'like_number'   => 'nullable|integer'
        ]);

        $advice->update($validateData);
        return response()->json(['message' => 'Advice updated successfully', 'data' => $advice]);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/advices/{id}",
     *     summary="Delete an advice by ID",
     *     tags={"Advices"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function destroy(Advice $advice)
    {
        try {
            $advice->delete();
            Log::info('Advice deleted: ' . $advice->id);
            return response()->json(['message' => 'Advice deleted successfully']);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to delete advice', 'error' => $e->getMessage()], 500);
        }
    }
}

