<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
     protected $guarded = [
        'id',
    ];
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

     public function places()
    {
        return $this->hasMany(Place::class);
    }
}
