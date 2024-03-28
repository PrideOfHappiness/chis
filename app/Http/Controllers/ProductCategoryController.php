<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index(){
        $data = ProductCategory::paginate(10);
        $total = ProductCategory::count();
        return view('productCategory.index', compact('data', 'total'));
    }

    public function create(){
        return view('productCategory.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = $request->input('category');

        ProductCategory::create([
            'category' => $category,
        ]);

        $data = ProductCategory::paginate(10);
        $total = ProductCategory::count();
        return view('productCategory.index', compact('data', 'total'))->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = ProductCategory::find($id);
        return view('productCategory.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = ProductCategory::find($id);
        $this->validate($request, [
            'category' => 'required',
        ]);

        $data->category = $request->input('category');
        $data->update();

        return view('productCategory.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = ProductCategory::find($id);
        $data->delete();

        return view('vehicleType.index')
        ->with('success', 'Data berhasil dihapus!');
    }
}
