<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\ProductCategory;
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
        $productList = $row['product_items'] ?? null;

        if(!$brandName || !$category){
            return null;
        }
        return new ProductCategory([
            'brand' => $brandName,
            'category' => $category,
            'sub_category' => $subCategory,
            'product_list' => $productList,
            'remarks' => $row['remarks'],
        ]);
    }
}
