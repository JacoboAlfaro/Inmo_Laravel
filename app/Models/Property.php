<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Location;
use App\Models\Category;
use App\Models\Business;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress',
        'price',
        'user_id',
        'location_id',
        'category_id',
        'business_id',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function business(){
        return $this->belongsTo(Business::class, 'business_id');
    }

    /* public function prop_chars(){
        return $this->hasMany(CharacteristicProperty::class, 'property_id');
    } */

    /* public function characteristics(): BelongsToMany
    {
        return $this->belongsToMany(Characteristic::class, 'characteristic_properties')->using(CharacteristicProperty::class);
    } */

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'characteristic_properties')
                    ->withPivot('value')
                    ->withTimestamps();
    }
}
