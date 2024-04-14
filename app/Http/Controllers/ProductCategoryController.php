<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\ProductCategoryExport;
use Maatwebsite\Excel\Facades\Excel;

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

        $data = ProductCategory::paginate(10);
        $total = ProductCategory::count();
        return view('productCategory.index', compact('data', 'total'))->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = ProductCategory::find($id);
        $data->delete();

        return view('productCategory.index')
        ->with('success', 'Data berhasil dihapus!');
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

        if($dataCari != null && $pagination != null){
            $data = ProductCategory::where('nama', 'LIKE', '%' . $dataCari . '%')->paginate($pagination);
            $total = ProductCategory::count();
        }elseif ($dataCari != null) {
            $data =  ProductCategory::where('nama', 'LIKE', '%' . $dataCari . '%')->get();
            $total = ProductCategory::count();
        }else{
            $data =  ProductCategory::paginate(10);
            $total = ProductCategory::count();
        }


        return view('productCategory.hasil', compact('data', 'total'));
    }
}
