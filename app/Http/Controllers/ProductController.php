<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\VehicleType;

class ProductController extends Controller
{
    public function index(){
        $data = Product::paginate(10);
        $foto = Product::with('setProductIDForFotoProduct')->get();
        $total = Product::count();
        return view('product.index', compact('data', 'total', 'foto'));
    }

    public function create(){
        $data = ProductCategory::all();
        $vehicleType = VehicleType::all();
        return view('product.create', compact('data', 'vehicleType'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'partNumber' => 'required',
            'productname' => 'required',
            'productCategory' => 'required',
            'vehicleType' => 'required',
            'status' => 'required',
            'fileFoto' => 'required',
        ]);

        $code = $request->input('code');
        $partNumber = $request->input('partNumber');
        $productName = $request->input('productname');
        $vehicleType = $request->input('vehicleType');
        $productCategory = $request->input('productCategory');
        $status = $request->input('status');
    }

    public function edit($id){
        $data = Product::find($id);
        $productCategory = ProductCategory::all();
        $vehicleType = VehicleType::all();
        return view('product.edit', compact('data', 'productCategory','vehicleType'));
    }

    public function update($id, Request $request){

    }

    public function destroy($id){
        $data = Product::find($id);
        $data->delete();
        return view('product.index')->with('success', 'Dtaa berhasil dihapus!');
    }
}
