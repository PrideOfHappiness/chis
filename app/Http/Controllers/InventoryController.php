<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function getProductInventory(){
        $data = Product::all();
        $total = Product::count();
        return view('inventory.inventoryProduct', compact('data', 'total'));
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $data = Product::where('productName', 'LIKE', '%' . $dataCari . '%')->get();
        if($data->isEmpty()){
            $data = Product::where('code', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('partNo', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('satuan', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('hpp', 'LIKE', '%' . $dataCari . '%')
            ->get();
        }

        return view('inventory.hasilProduct', compact('data'));
    }
}
