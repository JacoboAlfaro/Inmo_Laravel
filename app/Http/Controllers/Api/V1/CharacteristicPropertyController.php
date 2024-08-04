<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CharacteristicProperty;
use Illuminate\Http\Request;

class CharacteristicPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charProps = CharacteristicProperty::get();
        return response()->json(['data' => $charProps], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $charProp = CharacteristicProperty::create($request->all());
        return response()->json(['data' => $charProp], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CharacteristicProperty $characteristicProperty)
    {
dd($characteristicProperty);

        return response()->json(['data' => $characteristicProperty], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CharacteristicProperty $characteristicProperty)
    {
        $characteristicProperty->update($request->all());
        return response()->json(['data' => $characteristicProperty], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CharacteristicProperty $characteristicProperty)
    {
        $characteristicProperty->delete();
        return response(null, 204);
    }
}
