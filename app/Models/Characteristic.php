<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'data_type',
    ];

    /* public function prop_chars(){
        return $this->hasMany(CharacteristicProperty::class, 'characteristic_id');
    } */

    /* public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'characteristic_properties')->using(CharacteristicProperty::class);
    } */

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'characteristic_properties')
                    ->withPivot('value')
                    ->withTimestamps();
    }
}
