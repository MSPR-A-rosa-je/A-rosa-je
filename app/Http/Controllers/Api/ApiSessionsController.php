<?php

namespace App\Http\Controllers\Api;

use App\Constants\ValidationRules;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class ApiSessionsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/sessions",
     *     tags={"Sessions"},
     *     summary="Returns all sessions",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $sessions = Session::all();
        return response()->json($sessions);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/sessions",
     *     tags={"Sessions"},
     *     summary="Create a new session",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="creation_date", type="date", format="date"),
     *             @OA\Property(property="plants_list", type="string", maxLength=2000),
     *             @OA\Property(property="owner_id", type="integer"),
     *             @OA\Property(property="mission_id", type="integer"),
     *             @OA\Property(property="note", type="string", maxLength=2000, nullable=true),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Successful operation")
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'creation_date' => 'nullable|date',
            'plants_list'   => 'required|string|max:2000',
            'owner_id'      => 'required|integer',
            'mission_id'    => 'required|integer',
            'note'          => 'nullable|string|max:2000'
        ]);

        try {
            $session = Session::create($validatedData);
            Log::info('Session created: ' . $session->id);
            return response()->json(['message' => 'Session created successfully', 'data' => $session], 201);
        } catch (\Throwable $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to create session', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/sessions/{id}",
     *     tags={"Sessions"},
     *     summary="Returns a session",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Session $session)
    {
        return response()->json($session);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/sessions/{id}",
     *     tags={"Sessions"},
     *     summary="Update a session",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="creation_date", type="date", format="date"),
     *             @OA\Property(property="plants_list", type="string", maxLength=2000),
     *             @OA\Property(property="owner_id", type="integer"),
     *             @OA\Property(property="mission_id", type="integer"),
     *             @OA\Property(property="note", type="string", maxLength=2000, nullable=true),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function update(Request $request, Session $session)
    {
        $validateData = $request->validate([
            'creation_date' => 'nullable|date',
            'plants_list'   => 'required|string|max:2000',
            'owner_id'      => 'required|integer',
            'mission_id'    => 'required|integer',
            'note'          => 'nullable|string|max:2000'
        ]);

        $session->update($validateData);
        return response()->json(['message' => 'Session updated successfully', 'data' => $session]);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/sessions/{id}",
     *     tags={"Sessions"},
     *     summary="Delete a session",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function destroy(Session $session)
    {
        try {
            $session->delete();
            Log::info('Session deleted: ' . $session->id);
            return response()->json(['message' => 'Session deleted successfully']);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to delete session', 'error' => $e->getMessage()], 500);
        }
    }
}
