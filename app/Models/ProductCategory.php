<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_category';
    protected $primaryKey = 'productCategoryID';
    public $incrementing = true;
    protected $fillable = [
        'category',
    ];

    public function setProductCategoryForProduct(){
        return $this->hasMany(Product::class, 'productCategory', 'productID');
    }
    

}
