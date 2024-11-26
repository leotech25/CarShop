<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    //this fillable provide defines all the columns that can be filled in the database
    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at',
     ];

     public function carType(): BelongsTo
     {
         return $this->belongsTo(CarType::class);
     }

     public function fuelType(): BelongsTo
     {
         return $this->belongsTo(FuelType::class);
     }

     public function maker(): BelongsTo
     {
         return $this->belongsTo(Maker::class);
     }

     public function model(): BelongsTo
     {
         return $this->belongsTo(\App\Models\Model::class);
     }

     public function owner(): BelongsTo
     {
         return $this->belongsTo(User::class, 'user_id');
     }

     public function city(): BelongsTo
     {
         return $this->belongsTo(City::class);
     }

     public function features(): HasOne
     {
         return $this->hasOne(CarFeatures::class);
     }

     public function images(): HasMany
     {
         return $this->hasMany(CarImage::class);
     }

     public function primaryImage(): HasOne
     {
         return $this->hasOne(CarImage::class)->orderBy('position')->limit(1);
     }

     public function favouredUsers(): BelongsToMany
     {
         return $this->belongsToMany(User::class, 'favourite_cars');
     }

     public function getCreatedDate(): String
     {
         return (new Carbon($this->created_at))->format('Y-m-d');
     }
}