<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $data = Brand::paginate(10);
        $total = Brand::count();
        return view('brand.index', compact('data', 'total'));
    }

    public function create(){
        return view('brand.create');
    }

    public function store(Request $request){
        $brand = $request->input('brand');
        Brand::create(['brand' => $brand]);

        return redirect()->route('brand.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData', 10);

        if($dataCari != null) {
            $data =  Brand::where('product_category', 'LIKE', '%' . $dataCari . '%')
            ->take($pagination)
            ->get();
        }else{
            $data =  Brand::take($pagination)->get();
        }


        return response()->json($data);
    }

    public function edit($id){
        $data = Brand::find($id);
        return view('brand.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Brand::find($id);
        $data->brand = $request->input('brand');
        $data->update();

        return redirect()->route('brand.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = Brand::find($id);
        $id = $data->brandID;
        $product = Product::where('brand',$id)->get();
        if(sizeof($product)>0){
            return redirect()->route('brand.index')
                ->with('error', 'Data tidak dapat dihapus karena data '. $data->brand .' terikat dengan ' . $product->count(). ' data di Master Data Produk!');
        }else{
            $data->delete();
        }
        $data->delete();
        return redirect()->route('brand.index')->with('success', 'Data berhasil dihapus!');
    }
}
