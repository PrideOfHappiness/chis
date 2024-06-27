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
        'brand',
        'code',
        'part_no',
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
        'subCategory',
    ];

    public function getBrand(){
        return $this->belongsTo(Brand::class, 'brand', 'brandID');
    }

    public function getVehicleTypeFromVehicleType(){
        return $this->belongsTo(VehicleType::class, 'vehicleType', 'vehicleTypeID');
    }

    public function getProductCategoryFromVehicleType(){
        return $this->belongsTo(ProductCategory::class, 'productCategory', 'productCategoryID');
    }

    public function getSubCategoryFromSubCategory(){
        return $this->belongsTo(SubCategory::class, 'subCategory', 'subCategoryListID');
    }

    public function fotoProducts(){
        return $this->hasMany(FotoProduct::class, 'productID');
    }
}
