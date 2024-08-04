<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'property_id',
        'characteristic_id',
    ];

    /* public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function characteristic(){
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    } */
}
