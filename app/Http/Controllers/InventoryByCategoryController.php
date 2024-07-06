<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryByCategoryController extends Controller
{
    public function index(){
        return view('inventory.inventoryByCategory');
    }

    public function cari(Request $request){
        $dataAwal = Carbon::createFromDate($request->input('dataAwal'));
        $dataAkhir = Carbon::createFromDate($request->input('dataAkhir'));
        $tanggalAkhir = $dataAkhir->addDay();

        $query = Product::with('getProductCategoryFromVehicleType', 'getVehicleTypeFromVehicleType')
        ->whereBetween('created_at', [$dataAwal, $tanggalAkhir])->get();

        $total = Product::count();

        $data = $query->map(function($product) {
            $masuk = $product->setInventory()->where('adjustment_code', 'IN')->sum('productQuantity_adjustments')
                + $product->setInventoryReturn()->where('return_code', 'IN')->sum('productQuantity_return');
    
            $keluar = $product->setInventory()->where('adjustment_code', 'OUT')->sum('productQuantity_adjustments')
                + $product->setInventoryReturn()->where('return_code', 'OUT')->sum('productQuantity_return');
    
            return [
                'product' => $product,
                'masuk' => $masuk,
                'keluar' => $keluar,
            ];
        });

        return view('inventory.hasilInventoryByCategory', compact('data', 'dataAwal', 'dataAkhir', 'total'));
    }


}
