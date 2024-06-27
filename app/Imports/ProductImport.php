<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\VehicleType;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\MerkKendaraan;
use App\Models\ProductCategory_Sub;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brandname = $row['brand'] ?? null;
        $categoryName = $row['category'] ?? null;
        $sub_category = $row['sub_category'] ?? null;
        $code = $row['code'] ?? uniqid();
        $partNo = $row['part_no'] ?? null;
        $product = $row['product_description'] ?? null;
        $vehicle = $row['vehicle'] ?? null;
        $merk = $row['brand_kendaraan'] ?? null;
        $modelType = $row['model_type'] ?? null;
        $unit = $row['unit'] ?? null;
        $beli = $row['buy_price'] ?? null;
        $jual = $row['sell_price'] ?? null;
        $hpp = $row['hpp'] ?? null;
        $stock = $row['stock'] ?? null;
        $min = $row['min_stock'] ?? null;
        

        //dd($merk);

        if($brandname && $categoryName){
            $brand = Brand::firstOrCreate(['brand' => $brandname]);
            $category = ProductCategory_Sub::firstOrCreate(['product_category' => $categoryName]);
            $subCategory = SubCategory::firstOrCreate(['sub_category' => $sub_category]);
            $vehicle = MerkKendaraan::firstOrCreate(
                ['inisial' => $vehicle], 
                ['namaKendaraan' => $merk]
            );
            $codes = $code ?? Str::random(3);

            $test = VehicleType::firstOrCreate(
                ['nama' => $vehicle->merkID],
                ['vehicle_type' => $modelType]
            );

            return new Product([
                'brand' => $brand->brandID,
                'code' => $codes,
                'part_no' => $partNo,
                'productName' => $product,
                'vehicleType' => $test->vehicleTypeID,
                'productCategory' => $category->productCategoryListID,
                'subCategory' => $subCategory->subCategoryListID,
                'status' => 'Active',
                'min_stock' => $min,
                'stock' => $stock,
                'satuan' => $unit,
                'harga_beli' => $beli,
                'harga_jual' => $jual,
                'hpp' => $hpp,
                'notes' => $row['notes'] ?? null,
            ]);
        }else{
            return null;
        }
    }
}
