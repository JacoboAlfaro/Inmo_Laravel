<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\v1\Property\PropertyStoreRequest;
use App\Http\Requests\Api\v1\Property\PropertyUpdateRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $properties = Property::get();
    //     return response()->json(['data' => $properties], 200);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyStoreRequest $request)
    {
        $property = Property::create($request->all());
        return response()->json(['data' => $property], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $property->characteristics;
        return response()->json(['data' => $property], 200);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyUpdateRequest $request, Property $property)
    {
        $property->update($request->all());
        return response()->json(['data' => $property], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response(null, 204);
    }

    public function index(Request $request) {
        $params = $request->query();
        
        //Elimina los 2 primeros parametros obligatorios y los agrega a otra
        $obligados = array_slice($params, 0, 2, true);
        $queryParams = array_slice($params, 2, null, true);

        $keys = array_keys($queryParams);
        $keysObligados = array_keys($obligados);
    
        $characteristicsIds = DB::table('characteristics')->whereIn('name', $keys)->pluck('id');

        //Llama metodo privado
        $orWhere = $this->formatQuery($characteristicsIds, $queryParams, $keys);
        $properties = DB::table('properties', 'p')->WhereRaw($orWhere)->get();
                        
        //Inmuebles que cumplen con los filtros
        $Business = DB::table('businesses')->where('name', $obligados[$keysObligados[0]])->first();
        $Category = DB::table('categories')->where('name', $obligados[$keysObligados[1]])->first();

        $filtred = $properties->where('business_id', $Business->id)->where('category_id', $Category->id);

        if($filtred->isEmpty()){
            return response(null, 204);
        }

        return response()->json([
            'queryParams' => $queryParams,
            'keys'=>$keys, 
            'charac'=> $characteristicsIds,
            'properties' => $properties,
            'data' => $filtred
        ], 200);
    }

    private function orwhereText($id, $value, $data_type){

        if($data_type == 'String'){
            return "(SELECT * FROM characteristic_properties cp WHERE cp.property_id = p.id AND cp.characteristic_id =". $id . " AND cp.value = '". $value ."') ";
        }
        elseif($data_type == 'Numeric'){
            return "(SELECT * FROM characteristic_properties cp WHERE cp.property_id = p.id AND cp.characteristic_id =". $id . " AND cp.value >= '". $value ."') ";
        }
        else{
            return "";
        }
    }

    private function formatQuery($characteristicsIds, $queryParams, $keys){
        $orWhere = '';
        $num = 0;
        foreach ($characteristicsIds as $characteristicId) {
            $value = $queryParams[$keys[$num]];
            $data_type = DB::table('characteristics')->where('id', $characteristicId)->first('data_type');
            // dump($data_type);
            $orStatement = $this->orwhereText($characteristicId, $value, $data_type->data_type);
            $orWhere = $orWhere. " AND exists " . $orStatement;
            // dump($orStatement, $orWhere);
            $num++;
        }
        $orWhere = ltrim($orWhere, "AND ");

        return $orWhere;
    }

    //METODOS PRIVADOS
    // private function orwhereText($id, $value, $data_type){

    //     if($data_type == 'String'){
    //         return "(characteristic_id =". $id . " AND value = '". $value ."') ";
    //     }
    //     elseif($data_type == 'Numeric'){
    //         return "(characteristic_id =". $id . " AND value >= '". $value ."') ";
    //     }
    //     else{
    //         return "";
    //     }
    // }

    // private function formatQuery($characteristicsIds, $queryParams, $keys){
    //     $orWhere = '';
    //     $num = 0;
    //     foreach ($characteristicsIds as $characteristicId) {
    //         $value = $queryParams[$keys[$num]];
    //         $data_type = DB::table('characteristics')->where('id', $characteristicId)->first('data_type');
    //         // dump($data_type);
    //         $orStatement = $this->orwhereText($characteristicId, $value, $data_type->data_type);
    //         $orWhere = $orWhere. " AND " . $orStatement;
    //         // dump($orStatement, $orWhere);
    //         $num++;
    //     }
    //     $orWhere = ltrim($orWhere, "AND ");

    //     return $orWhere;
    // }
}
