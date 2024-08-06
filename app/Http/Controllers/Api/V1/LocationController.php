<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\Api\v1\Location\LocationStoreRequest;
use App\Http\Requests\Api\v1\Location\LocationUpdateRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::orderBy('department', 'asc')->get();
        return response()->json(['data' => $locations], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        $location = Location::create($request->all());
        return response()->json(['data' => $location], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return response()->json(['data' => $location], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, Location $location)
    {
        $location->update($request->all());
        return response()->json(['data' => $location], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response(null, 204);
    }
}
