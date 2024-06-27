<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\ProductCategoryExport;
use App\Imports\ProductCategoryImport;
use App\Models\ProductCategory_Sub;
use App\Models\SubCategory;
use Maatwebsite\Excel\Facades\Excel;

class ProductCategoryController extends Controller
{
    public function index(){
        $data = ProductCategory::paginate(10);
        $total = ProductCategory::count();
        return view('productCategory.index', compact('data', 'total'));
    }

    public function create(){
        $data = ProductCategory_Sub::all();
        $data2 = SubCategory::all();
        return view('productCategory.create', compact('data', 'data2'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'sub_category' => 'required',
            'category' => 'required',
            'product_list' => 'required',
        ]);

        if($request->input('sub_category') || $request->input('category') == '--') {
            return redirect()->route('category.create')->with('error', 'Data Kategori atau Sub Kategori wajib diisi!');
        }

        $category = $request->input('category');
        $subCategory = $request->input('sub_category');
        $productList = $request->input('product_list');
        $remarks = $request->input('remarks');

        ProductCategory::create([
            'category' => $category,
            'sub_category' => $subCategory,
            'product_list' => $productList,
            'remarks' => $remarks,
        ]);

        return redirect('/admin/productCategory')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = ProductCategory::find($id);
        $data2 = ProductCategory_Sub::all();
        $data3 = SubCategory::all();
        return view('productCategory.edit', compact('data', 'data2', 'data3'));
    }

    public function update(Request $request, $id){
        $data = ProductCategory::find($id);
        $this->validate($request, [
            'category' => 'required',
        ]);

        $data->category = $request->input('category');
        $data->update();

        return redirect('/admin/productCategory')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = ProductCategory::find($id);
        $data->delete();

        return redirect('/admin/productCategory')->with('success', 'Data berhasil dihapus!');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new ProductCategoryExport(), 'dataProductCategoryDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = ProductCategory::all();
        $pdf = PDF::loadView('vehicleType.print', compact('dataProduct'));
        return $pdf->download('Product Category.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData');

        if($dataCari){
            $data = ProductCategory::where('brand', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('category', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('sub_category', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('product_list', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('remarks', 'LIKE', '%' . $dataCari . '%')
            ->take($pagination)->get();
        }else{
            $data =  ProductCategory::paginate($pagination);
        }

        $total = ProductCategory::count();
        return response()->json($data);
    }

    public function getImport(){
        return view('productCategory.imporData');
    }
    
    public function imporData(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,pdf',
        ]);

        Excel::import(new ProductCategoryImport, $request->file('file'));

        return redirect('/admin/productCategory')->with('success', 'Data imported successfully');
    }
}
