<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Requests\Api\v1\Business\BusinessStoreRequest;
use App\Http\Requests\Api\v1\Business\BusinessUpdateRequest;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::orderBy('name', 'asc')->get();
        return response()->json(['data' => $businesses], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessStoreRequest $request)
    {
        $business = Business::create($request->all());
        return response()->json(['data' => $business], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        return response()->json(['data' => $business], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessUpdateRequest $request, Business $business)
    {
        $business->update($request->all());
        return response()->json(['data' => $business], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return response(null, 204);
    }
}
