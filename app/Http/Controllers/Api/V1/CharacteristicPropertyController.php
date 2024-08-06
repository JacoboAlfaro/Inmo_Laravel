<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CharacteristicProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\v1\CharacteristicProperty\CharacteristicPropertyStoreRequest;
use App\Http\Requests\Api\v1\CharacteristicProperty\CharacteristicPropertyUpdateRequest;

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
    public function store(CharacteristicPropertyStoreRequest $request)
    {
        $charProp = CharacteristicProperty::create($request->all());
        return response()->json(['data' => $charProp], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($characteristic_id, $property_id)
    {
        $characteristicProperty = DB::table('characteristic_properties')
                                    ->where('characteristic_id', $characteristic_id)
                                    ->where('property_id', $property_id)
                                    ->first();
        
        if (!$characteristicProperty) {
            return response()->json(['message' => 'Record not found.'], 404);
        }

        return response()->json(['data' => $characteristicProperty], 200);
    }

    public function destroy($characteristic_id, $property_id){
        $characteristicProperty = DB::table('characteristic_properties')
                                    ->where('characteristic_id', $characteristic_id)
                                    ->where('property_id', $property_id)
                                    ->first();
        
        if (!$characteristicProperty) {
            return response()->json(['message' => 'Record not found.'], 404);
        }

        DB::table('characteristic_properties')
        ->where('characteristic_id', $characteristic_id)
        ->where('property_id', $property_id)
        ->delete();
        
        return response(null, 204);
    }
}
