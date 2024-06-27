<?php

namespace App\Imports;

use App\Models\Brand;

use App\Models\ProductCategory;
use App\Models\ProductCategory_Sub;
use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductCategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brandName = $row['brand'] ?? null;
        $category = $row['category'] ?? null;
        $subCategory = $row['sub_category'] ?? null;
        $listProduk = $row['product_items'] ?? null;

        if(!$brandName || !$category){
            return null;
        }else{
            $productCategory = ProductCategory_Sub::firstOrCreate(['product_category' => $category]);
            $subCategories = SubCategory::firstOrCreate(['sub_category' => $subCategory]);
            return new ProductCategory([
                'productCategoryList' => $productCategory->productCategoryListID,
                'subCategoryList' => $subCategories->subCategoryListID,
                'productList' => $listProduk,
                'remarks' => $row['remarks'],
            ]);
        }
        
    }
}
