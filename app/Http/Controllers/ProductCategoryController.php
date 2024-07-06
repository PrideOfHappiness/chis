<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\ProductCategoryExport;
use App\Imports\ProductCategoryImport;
use App\Models\Product;
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

        $category = $request->input('category');
        $subCategory = $request->input('sub_category');
        $productList = $request->input('product_list');
        $remarks = $request->input('remarks');

        ProductCategory::create([
            'productCategoryList' => $category,
            'subCategoryList' => $subCategory,
            'productList' => $productList,
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

        $data->productCategoryList = $request->input('category');
        $data->subCategoryList = $request->input('sub_category');
        $data->productList = $request->input('product_list');
        $data->remarks = $request->input('remarks');
        $data->update();

        return redirect('/admin/productCategory')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = ProductCategory::find($id);
        $id = $data->productCategoryID;
        $product = Product::where('productCategory', $id)->get();

        if(sizeof($product)>0){
            redirect('/admin/productCategory')
                ->with('error', 'Data tidak dapat dihapus!');
        }else{
            $data->delete();
            return redirect('/admin/productCategory')->with('success', 'Data berhasil dihapus!');
        }
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
            $data = ProductCategory::with('getProductCategoryList', 'getSubCategoryList')
            ->whereHas('getProductCategoryList', function($query) use($dataCari){
                $query->where('product_category', 'LIKE', '%' . $dataCari . '%');
            })
            ->orWhereHas('getSubCategoryList', function($query) use($dataCari){
                $query->where('sub_category', 'LIKE', '%' . $dataCari . '%');
            })
            ->orWhere('productList', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('remarks', 'LIKE', '%' . $dataCari . '%')
            ->paginate($pagination);
        }else{
            $data =  ProductCategory::paginate($pagination);
        }

        $total = ProductCategory::count();
        return view('productCategory.index', compact('data', 'total'));
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

    public function kopiData(){
        $data = ProductCategory::all();
        return view('productCategory.copy', compact('data'));
    }

    public function copy($id){
        $data = ProductCategory::find($id);
        $subCategory = SubCategory::all();
        $productCategory= ProductCategory_Sub::all();
        return view('productCategory.copyData', compact('data', 'productCategory', 'subCategory'));
    }

    public function prosesData(Request $request){

        $category = $request->input('category');
        $subCategory = $request->input('sub_category');
        $productList = $request->input('product_list');
        $remarks = $request->input('remarks');

        ProductCategory::create([
            'productCategoryList' => $category,
            'subCategoryList' => $subCategory,
            'productList' => $productList,
            'remarks' => $remarks,
        ]);
        return redirect('/admin/productCategory')->with('success', 'Data berhasil ditambahkan!');
    } 

    public function getFileDownload(){
        $filePath = public_path('fileDownload/formatProductCategory.xlsx');

        if(file_exists($filePath)){
            return response()->download($filePath);
        }else{
            abort(404, 'File tidak tersedia');
        }
    }
}
