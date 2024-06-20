<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Constants\ValidationRules;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

const MAX_STRING_LENGTH = 255;

/**
 * @OA\Tag(
 *     name="Address",
 * )
 */
class ApiAddressController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/address",
     *     summary="Get all addresses",
     *     tags={"Address"},
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $addresses = Address::all();

        return response()->json($addresses);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/address",
     *     summary="Create an address",
     *     tags={"Address"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="address",
     *                     type="string",
     *                     maxLength=255
     *                 ),
     *                 @OA\Property(
     *                     property="city",
     *                     type="string",
     *                     maxLength=255
     *                 ),
     *                 @OA\Property(
     *                     property="zip_code",
     *                     type="integer",
     *                     maximum=9999999999
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Address created"),
     *     @OA\Response(response="500", description="Failed to create address")
     * )
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'address'  => 'required|max:'. MAX_STRING_LENGTH,
            'city'     => 'required|max:'. MAX_STRING_LENGTH,
            'zip_code' => 'required|integer|max:10'
        ]);

        try {
            $address = Address::create($validateData);
            Log::info('Address created: ' . $address->id);

            return response()->json(['message' => 'Address created successfully.', 'address' => $address], 201);
        } catch (\Throwable $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to create address.'], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/address/{id}",
     *     summary="Get an address by ID",
     *     tags={"Address"},
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
     */
    public function show(Address $address)
    {
        return response()->json($address);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/address/{id}",
     *     summary="Update an address by ID",
     *     tags={"Address"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="address",
     *                     type="string",
     *                     maxLength=255
     *                 ),
     *                 @OA\Property(
     *                     property="city",
     *                     type="string",
     *                     maxLength=255
     *                 ),
     *                 @OA\Property(
     *                     property="zip_code",
     *                     type="integer",
     *                     maximum=9999999999
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Address updated"),
     *     @OA\Response(response="500", description="Failed to update address")
     * )
     */
    public function update(Request $request, Address $address)
    {
        $validateData = $request->validate([
            'address'  => 'required|max:'. MAX_STRING_LENGTH,
            'city'     => 'required|max:'. MAX_STRING_LENGTH,
            'zip_code' => 'required|integer|max:10'
        ]);

        try {
            $address->update($validateData);
            return response()->json(['message' => 'Address updated successfully.', 'address' => $address]);
        } catch (\Throwable $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to update address.'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/address/{id}",
     *     summary="Delete an address by ID",
     *     tags={"Address"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Address deleted"),
     *     @OA\Response(response="500", description="Failed to delete address")
     * )
     */
    public function destroy(Address $address)
    {
        try {
            $id = $address->id;
            $address->delete();
            Log::info('Address deleted: ' . $id);

            return response()->json(['message' => 'Address deleted successfully.']);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['message' => 'Failed to delete address.'], 500);
        }
    }
}

