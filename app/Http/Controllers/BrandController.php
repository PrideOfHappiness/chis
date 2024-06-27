<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
        Brand::create(['product_category' => $brand]);

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
}
