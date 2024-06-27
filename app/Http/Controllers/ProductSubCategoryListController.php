<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryListController extends Controller
{
    public function index(){
        $data = SubCategory::paginate(10);
        $total = SubCategory::count();
        return view('subCategoryList.index', compact('data', 'total'));
    }

    public function create(){
        return view('subCategoryList.create');
    }

    public function store(Request $request){
        $productCategoryList = $request->input('subCategory');
        SubCategory::create(['sub_category' => $productCategoryList]);

        return redirect()->route('subCategoryList.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData', 10);

        if($dataCari != null) {
            $data =  SubCategory::where('sub_category', 'LIKE', '%' . $dataCari . '%')
            ->take($pagination)
            ->get();
        }else{
            $data =  SubCategory::take($pagination)->get();
        }


        return response()->json($data);
    }
}
