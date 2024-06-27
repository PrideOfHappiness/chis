<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\InventoryReturn;
use App\Models\Suppliers;
use App\Models\Product;

class InventoryReturnController extends Controller
{
    public function index(){
        $data  = InventoryReturn::all();
        $total = InventoryReturn::count();
        return view('inventory.inventoryReturn', compact('data', 'total')); // Buat file baru di dalam folder resources/views/inventory dengan nama inventoryReturn, dengan memanggil dua variabel di dalam view
    }

    public function createIn(){
        $data     = Product::all();
        $customer = Customers::all();
        return view('inventory.createReturnIn', compact('data', 'customer'));
    }

    public function createOut(){
        $data     = Product::all();
        $supplier = Suppliers::all();
        return view('inventory.createReturnOut', compact('data', 'supplier'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'customerIDs' => 'required',
            'supplierIDs' => 'required',
            'type'        => 'required',
            'productID'   => 'required',
            'qty'         => 'required',
            'keterangan'  => 'required',
        ]); 
        // validate untuk variabel persyaratan.

        $customer   = $request->input('customerIDs');
        $supllier   = $request->input('supplierIDs');
        $type       = $request->input('type');
        $product    = $request->input('productID');
        $qty        = $request->input('qty');
        $keterangan = $request->input('keterangan');
        if($type == 'IN'){
            $dataProduct = Product::where('productID', $product)->first();
            $qtyAwal     = $dataProduct->stock;
            $stockAkhir  = (int) $qty + $qtyAwal;

            InventoryReturn::create([
                'customerIDs'            => $customer,
                'supplierIDs'            => $supllier,
                'productIDs'             => $product,
                'adjustment_code'        => 'IN',
                'productQuantity_Return' => $qty,
                'satuan_adjustmets'      => $dataProduct->satuan,
                'userID_adjustment'      => 2,
                'keterangan_return'      => $keterangan,
                'adjustment_created'     => now(),
            ]);

            if($dataProduct){
                $dataProduct->stock = $stockAkhir;
                $dataProduct->save();
            }
        }else{
            $dataProduct = Product::where('productID', $product)->first();
            $qtyAwal = $dataProduct->stock;
            $stockAkhir = (int) $qtyAwal - $qty;
            InventoryReturn::create([
                'customerIDs'            => $customer,
                'supplierIDs'            => $supllier,
                'productIDs'             => $product,
                'adjustment_code'        => 'OUT',
                'productQuantity_Return' => $qty,
                'satuan_adjustmets'      => $dataProduct->satuan,
                'userID_adjustment'      => 2,
                'keterangan_return'      => $keterangan,
                'adjustment_created'     => now(),
            ]);

            if($dataProduct){
                $dataProduct->stock = $stockAkhir;
                $dataProduct->save();
            }
        }
    }
        public function cari(Request $request){
            $dataCari = $request->input('search');
            $data     = InventoryReturn::whereHas('getProductID', function($query) use ($dataCari){
                $query->where('productName', 'like',  '%' . $dataCari . '%');
            })->get();
            if($data->isEmpty()){
                $data = InventoryReturn::where('return_code', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('satuan', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('hpp', 'LIKE', '%' . $dataCari . '%')
                ->get();
            }    
            return view('inventory.hasilReturn', compact('data'));
        }
    }
    
