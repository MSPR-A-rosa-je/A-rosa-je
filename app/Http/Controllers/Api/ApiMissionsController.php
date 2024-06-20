<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Constants\ValidationRules;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiMissionsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/missions",
     *     summary="Get all missions",
     *     tags={"Missions"},
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $missions = Mission::all();

        return response()->json($missions);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/missions/{id}",
     *     summary="Get an mission by ID",
     *     tags={"Missions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     *
     */
    public function show (Mission $mission)
    {
        return response()->json($mission);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/missions",
     *     summary="Create a mission",
     *     tags={"Missions"},
     *
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="start_date", type="date"),
     *                 @OA\Property(property="end_date", type="date"),
     *                 @OA\Property(property="candidates_list", type="string"),
     *                 @OA\Property(property="price", type="float"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="number_of_sessions", type="integer"),
     *                 @OA\Property(property="plants_list", type="string"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Mission created"),
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_date'         => ValidationRules::DATE,
            'end_date'           => ValidationRules::DATE,
            'candidates_list'    => ValidationRules::MAX_STRING_LENGTH,
            'price'              => 'required|float',
            'description'        => 'required|long|max:2000',
            'number_of_sessions' => ValidationRules::REQ_INT,
            'plants_list'        => ValidationRules::MAX_STRING_LENGTH,
        ]);

        try {
            $mission = Mission::create($validatedData);
            Log::info('mission created: ' . $mission->id);
            return response()->json($mission, 201);
        } catch (\Exception $e) {
            Log::error('Failed to create mission: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to create mission'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/v1/missions/{id}",
     *     summary="Update an mission by ID",
     *     tags={"Missions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="start_date", type="date", example="2022-01-01"),
     *                 @OA\Property(property="end_date", type="date", example="2022-01-01"),
     *                 @OA\Property(property="owner_id", type="integer", example="1"),
     *                 @OA\Property(property="candidates_list", type="string", example="My candidates list"),
     *                 @OA\Property(property="price", type="float", example="10.00"),
     *                 @OA\Property(property="description", type="string", example="My description"),
     *                 @OA\Property(property="gardien_id", type="integer", example="1"),
     *                 @OA\Property(property="number_of_sessions", type="integer", example="1"),
     *                 @OA\Property(property="plants_list", type="string", example="My plants list"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Mission updated"),
     * )
     */
    public function update(Request $request, Mission $mission)
    {
        $validateData = $request->validate([
            'start_date'         => ValidationRules::DATE,
            'end_date'           => ValidationRules::DATE,
            'owner_id'           => ValidationRules::REQ_INT,
            'candidates_list'    => ValidationRules::MAX_STRING_LENGTH,
            'price'              => 'required|float',
            'description'        => 'required|long|max:2000',
            'gardien_id'         => ValidationRules::REQ_INT,
            'number_of_sessions' => ValidationRules::REQ_INT,
            'plants_list'        => ValidationRules::MAX_STRING_LENGTH,
        ]);

        $mission->update($validateData);
        return response()->json($mission);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/missions/{id}",
     *     summary="Delete an mission by ID",
     *     tags={"Missions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Mission deleted"),
     * )
     */
    public function destroy(Mission $mission)
    {
        try {
            $mission->delete();
            Log::info('mission deleted: ' . $mission->id);
            return response()->json($mission);
        } catch (\Exception $e) {
            Log::error('Failed to delete mission: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete mission'], 500);
        }
    }
}
