<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $table = 'vehicle_type';
    protected $primaryKey = 'vehicleTypeID';
    public $incrementing = true;
    protected $fillable = [
        'ID',
        'kendaraan',
        'type',
    ];

    public function setVehicleTypeForProduct(){
        return $this->hasMany(Product::class, 'vehicleType', 'productID');
    }
}
