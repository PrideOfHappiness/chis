<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'productID';
    public $incrementing = true;
    protected $fillable = [
        'code',
        'part-no',
        'productName',
        'vehicleType',
        'productCategory',
        'status',
    ];

    public function getVehicleTypeFromVehicleType(){
        return $this->belongsTo(VehicleType::class, 'vehicleType', 'vehicleTypeID');
    }

    public function getProductCategoryFromVehicleType(){
        return $this->belongsTo(ProductCategory::class, 'productCategory', 'productCategoryID');
    }

    public function setProductIDForFotoProduct(){
        return $this->hasMany(FotoProduct::class, 'productID');
    }
}
