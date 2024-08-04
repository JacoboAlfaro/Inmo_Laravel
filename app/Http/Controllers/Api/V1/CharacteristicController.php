<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Characteristic;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characteristics = Characteristic::get();
        return response()->json(['data' => $characteristics], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $characteristic = Characteristic::create($request->all());
        return response()->json(['data' => $characteristic], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Characteristic $characteristic)
    {
        return response()->json(['data' => $characteristic], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Characteristic $characteristic)
    {
        $characteristic->update($request->all());
        return response()->json(['data' => $characteristic], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();
        return response(null, 204);
    }
}
