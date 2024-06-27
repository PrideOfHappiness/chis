<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory_Sub extends Model
{
    use HasFactory;

    protected $table='product_category_list';
    protected $primaryKey = 'productCategoryListID';
    public $incerementing = true;
    protected $fillable = ['product_category'];

    public function setProductCategoryID(){
        return $this->hasMany(ProductCategory::class, 'productCategoryList', 'productCategoryID');
    }
}
