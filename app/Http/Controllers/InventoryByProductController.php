<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryByProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('inventory.inventoryByProduct', compact('product'));
    }

    public function cari(Request $request){
        $dataAwal = Carbon::createFromDate($request->input('dataAwal'));
        $dataAkhir = Carbon::createFromDate($request->input('dataAkhir'));
        $tanggalAkhir = $dataAkhir->addDay();
        $produk = $request->input('product');
        // dd($dataAwal, $dataAkhir, $produk);


        $query = Product::with('getProductCategoryFromVehicleType', 'getVehicleTypeFromVehicleType')
        ->where('productName', $produk)
        ->whereBetween('created_at', [$dataAwal, $tanggalAkhir])->get();

        // dd($query);

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

        return view('inventory.hasilInventoryByProduct', compact('data', 'dataAwal', 'dataAkhir', 'total'));
    }
}
