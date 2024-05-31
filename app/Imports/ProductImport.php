<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\VehicleType;
use App\Models\ProductCategory;
use App\Models\Brand;
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
        $modelType = $row['model_type'] ?? null;
        $unit = $row['unit'] ?? null;
        $beli = $row['buy_price'] ?? null;
        $jual = $row['sell_price'] ?? null;
        $hpp = $row['hpp'] ?? null;
        $stock = $row['stock'] ?? null;
        $min = $row['min_stock'] ?? null;

        if($brandname && $categoryName){
            $productCategory = ProductCategory::where('brand', $brandname)
                ->orWhere('category', $categoryName)
                ->first();
            $vehicleT = VehicleType::firstOrCreate([
                'ID' => $vehicle,
                'kendaraan' => $modelType,
            ]);

            $codes = $code ?? Str::random(3);

            return new Product([
                'code' => $codes,
                'part_no' => $partNo,
                'productName' => $product,
                'vehicleType' => $vehicleT->vehicleTypeID,
                'productCategory' => $productCategory->productCategoryID,
                'status' => 'Active',
                'min_stock' => $min,
                'stock' => $stock,
                'satuan' => $unit,
                'harga_beli' => $beli,
                'hpp' => $hpp,
                'harga_jual' => $jual,
                'notes' => "Test",
                'sub_categoryProduct' => $sub_category,
            ]);
        }else{
            return null;
        }
    }
}
