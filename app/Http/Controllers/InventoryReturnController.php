<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\InventoryReturn;
use App\Models\Suppliers;
use App\Models\Product;
use App\Models\User;
use App\Models\Warehouses;
use Illuminate\Support\Facades\Auth;

class InventoryReturnController extends Controller
{
    public function index(){
        $data  = InventoryReturn::all();
        $total = InventoryReturn::count();
        return view('inventory.inventoryReturn', compact('data', 'total')); // Buat file baru di dalam folder resources/views/inventory dengan nama inventoryReturn, dengan memanggil dua variabel di dalam view
    }

    public function createIn(Request $request){
        $data     = Product::all();
        $customer = Customers::all();
        $warehouse = Warehouses::all();
        $user = $request->user()->userIDNo;
        return view('inventory.createReturnIn', compact('data', 'customer', 'warehouse', 'user'));
    }

    public function createOut(Request $request){
        $data     = Product::all();
        $supplier = Suppliers::all();
        $warehouse = Warehouses::all();
        $user = $request->user()->userIDNo;
        return view('inventory.createReturnOut', compact('data', 'supplier', 'warehouse', 'user'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'type' => 'required',
        ]); 
        // validate untuk variabel persyaratan.

        $customer   = $request->input('customerID');
        $supllier   = $request->input('supplierIDs');
        $type       = $request->input('type');
        $product    = $request->input('productID');
        $qty        = $request->input('qty');
        $userID     = $request->input('userid');
        $hargaretur = $request->input('hargaretur');
        $biayaretur = $request->input('biayaretur');
        $tglretur = $request->input('tanggalretur');
        $keterangan = $request->input('keterangan');

        if($type == 'IN'){
            $dataProduct = Product::where('productID', $product)->first();
            $qtyAwal     = $dataProduct->stock;
            $stockAkhir  = (int) $qty + $qtyAwal;

            InventoryReturn::create([
                'customerIDs'            => $customer,
                'productIDs'             => $product,
                'return_code'            => 'IN',
                'harga_retur'            => $hargaretur,
                'biaya_tambahan'         => $biayaretur,
                'productQuantity_return' => $qty,
                'satuan_return'      => $dataProduct->satuan,
                'userID_return'      => $userID,
                'keterangan_return'  => $keterangan,
                'return_created'     => $tglretur,
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
                'supplierIDs'            => $supllier,
                'productIDs'             => $product,
                'return_code'            => 'OUT',
                'harga_retur'            => $hargaretur,
                'biaya_tambahan'         => $biayaretur,
                'productQuantity_return' => $qty,
                'satuan_return'      => $dataProduct->satuan,
                'userID_return'      => $userID,
                'return_created'     => $tglretur,
                'keterangan_return'  => $keterangan,
            ]);

            if($dataProduct){
                $dataProduct->stock = $stockAkhir;
                $dataProduct->save();
            }
        }

        return redirect('admin/inventory/return')->with('success', 'Data berhasil ditambahkan!');
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
    
