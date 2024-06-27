<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory_Sub;
use Illuminate\Http\Request;

class ProductCategoryListController extends Controller
{
    public function index(){
        $data = ProductCategory_Sub::paginate(10);
        $total = ProductCategory_Sub::count();
        return view('productCategoryList.index', compact('data', 'total'));
    }

    public function create(){
        return view('productCategoryList.create');
    }

    public function store(Request $request){
        $productCategoryList = $request->input('productCategoryList');
        ProductCategory_Sub::create(['product_category' => $productCategoryList]);

        return redirect()->route('productCategoryList.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData', 10);

        if($dataCari != null) {
            $data =  ProductCategory_Sub::where('product_category', 'LIKE', '%' . $dataCari . '%')
            ->take($pagination)
            ->get();
        }else{
            $data =  ProductCategory_Sub::take($pagination)->get();
        }


        return response()->json($data);
    }
}
