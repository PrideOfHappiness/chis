<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryAdjustmentController extends Controller
{
    public function index(){
        $data = Inventory::all();
        $total = Inventory::count();
        return view('inventory.inventoryAdjustments', compact('data', 'total')); // Buat file baru di dalam folder resources/views/inventory dengan nama inventoryAdjustments, dengan memanggil dua variabel di dalam view
    }

    public function createIn(){
        $data = Product::all();
        return view('inventory.createAdjustmentsIn', compact('data'));
    }

    public function createOut(){
        $data = Product::all();
        return view('inventory.createAdjustmentsOut', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'productID' => 'required',
            'qty' => 'required',
            'keterangan' => 'required',
        ]); 
        // validate untuk variabel persyaratan.

        $type = $request->input('type');
        $product = $request->input('productID');
        $qty = $request->input('qty');
        $keterangan = $request->input('keterangan');
        if($type == 'IN'){
            $dataProduct = Product::where('productID', $product)->first();
            $qtyAwal = $dataProduct->stock;
            $stockAkhir = (int) $qty + $qtyAwal;

            Inventory::create([
                'productIDs' => $product,
                'adjustment_code' => 'IN',
                'productQuantity_adjustments' => $qty,
                'satuan_adjustmets' => $dataProduct->satuan,
                'userID_adjustment' => 2,
                'keterangan_return' => $keterangan,
                'adjustment_created' =>now(),
            ]);

            if($dataProduct){
                $dataProduct->stock = $stockAkhir;
                $dataProduct->save();
            }
        }else{
            $dataProduct = Product::where('productID', $product)->first();
            $qtyAwal = $dataProduct->stock;
            $stockAkhir = (int) $qtyAwal - $qty;
            Inventory::create([
                'productIDs' => $product,
                'adjustment_code' => 'OUT',
                'productQuantity_adjustments' => $qty,
                'satuan_adjustmets' => $dataProduct->satuan,
                'userID_adjustment' => 2,
                'keterangan_return' => $keterangan,
                'adjustment_created' =>now(),
            ]);

            if($dataProduct){
                $dataProduct->stock = $stockAkhir;
                $dataProduct->save();
            }
        }
        return redirect('/admin/inventory/adjustments')->with('success', 'Data berhasil diubah');
    }
        public function cari(Request $request){
            $dataCari = $request->input('search');
            $data     = Inventory::whereHas('getProductIDs', function($query) use ($dataCari){
                $query->where('productName', 'like',  '%' . $dataCari . '%');
            })->get();
            if($data->isEmpty()){
                $data = Product::where('code', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('partNo', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('satuan', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('hpp', 'LIKE', '%' . $dataCari . '%')
                ->get();
            }
            return view('inventory.hasilAdjusment', compact('data'));
        }
    }
    











