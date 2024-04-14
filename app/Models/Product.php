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
        'partNo',
        'productName',
        'vehicleType',
        'productCategory',
        'status',
        'min_stock',
        'stock',
        'satuan',
        'harga_beli',
        'hpp',
        'harga_jual',
        'notes',
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
