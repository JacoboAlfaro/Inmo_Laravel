<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->hasOne(Property::class, 'category_id');
    }

}