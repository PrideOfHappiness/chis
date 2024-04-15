<?php

namespace App\Http\Controllers;

use App\Models\FotoProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\VehicleType;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

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
            'fileFoto' => 'required|mimes:jpg,jpeg,png|max:2048',
            'hargabeli' => 'required',
            'hpp' => 'required',
            'hargaJual' => 'required',
            'satuan' => 'required',
            'min_stock' => 'required',
            'stock' => 'required',
            'notes' => 'required',
        ]);

        $code = $request->input('code');
        $partNumber = $request->input('partNumber');
        $productName = $request->input('productname');
        $vehicleType = $request->input('vehicleType');
        $productCategory = $request->input('productCategory');
        //Harga
        $beli = $request->input('hargabeli');
        $hpp = $request->input('hpp');
        $jual = $request->input('hargaJual');
        //Stock
        $min_stock = $request->input('min_stock');
        $satuan = $request->input('satuan');
        $stock = $request->input('stock');
        $status = $request->input('status');
        $notes = $request->input('notes');

        $data = Product::create([
            'code' => $code,
            'partNo' => $partNumber,
            'productName' => $productName,
            'vehicleType' => $vehicleType,
            'productCategory' => $productCategory,
            'status' => $status,
            'min_stock' => $min_stock,
            'stock' => $stock,
            'satuan' => $satuan,
            'harga_beli' => $beli,
            'hpp' => $hpp,
            'harga_jual' => $jual,
            'notes' => $notes,
        ]);

        if($request->hasFile('fileFoto')){
            $file = $request->file('fileFoto');
            $model = new FotoProduct();
            $model->productID = $data->productID;
            $uniqueFileName = $file->getClientOriginalName();
            $model->namaFile = $uniqueFileName;
            $model->save();
            $file->move('fotoProduct/', $uniqueFileName);

            return redirect()->route('product.index')
                ->with('success', 'Data berhasil ditambahkan!');
        }else{
            return redirect()->route('product.create')
                ->with('error', 'Foto belum ditambahkan!');
        }
    }

    public function edit($id){
        $data = Product::find($id);
        $productCategory = ProductCategory::all();
        $vehicleType = VehicleType::all();
        $foto = $data->setProductIDForFotoProduct();
        return view('product.edit', compact('data', 'productCategory','vehicleType', 'foto'));
    }

    public function update($id, Request $request){
        $data = Product::find($id);
        $this->validate($request, [
            'code' => 'required',
            'partNumber' => 'required',
            'productname' => 'required',
            'productCategory' => 'required',
            'vehicleType' => 'required',
            'status' => 'required',
            'fileFoto' => 'required|mimes:jpg,jpeg,png|max:2048',
            'hargabeli' => 'required',
            'hpp' => 'required',
            'hargaJual' => 'required',
            'satuan' => 'required',
            'min_stock' => 'required',
            'stock' => 'required',
            'notes' => 'required',
        ]);

        if($request->hasFile('fileFoto') == null){
            $data->code = $request->input('code');
            $data->partNumber = $request->input('partNumber');
            $data->productName = $request->input('productname');
            $data->vehicleType = $request->input('vehicleType');
            $data->productCategory = $request->input('productCategory');
            //Harga
            $data->beli = $request->input('hargabeli');
            $data->hpp = $request->input('hpp');
            $data->jual = $request->input('hargaJual');
            //Stock
            $data->min_stock = $request->input('min_stock');
            $data->satuan = $request->input('satuan');
            $data->stock = $request->input('stock');
            $data->status = $request->input('status');
            $data->notes = $request->input('notes');
            $data->update();
        }else{
            $data->code = $request->input('code');
            $data->partNumber = $request->input('partNumber');
            $data->productName = $request->input('productname');
            $data->vehicleType = $request->input('vehicleType');
            $data->productCategory = $request->input('productCategory');
            //Harga
            $data->beli = $request->input('hargabeli');
            $data->hpp = $request->input('hpp');
            $data->jual = $request->input('hargaJual');
            //Stock
            $data->min_stock = $request->input('min_stock');
            $data->satuan = $request->input('satuan');
            $data->stock = $request->input('stock');
            $data->status = $request->input('status');
            $data->notes = $request->input('notes');
            $data->update();

            $file = $request->file('fileFoto');
            $model = FotoProduct::where('productID', $data->productID)->find('id');
            $model->productID = $data->productID;
            $uniqueFileName = $file->getClientOriginalName();
            $model->namaFile = $uniqueFileName;
            $model->update();
            $file->move('fotoProduct/', $uniqueFileName);
        }
    }

    public function destroy($id){
        $data = Product::find($id);
        $data->delete();
        return view('product.index')->with('success', 'Data berhasil dihapus!');
    }

    public function print(Request $request){
        $dataProduct = Product::all();
        $foto = Product::with('setProductIDForFotoProduct')->get();
        $pdf = PDF::loadView('product.print', compact('dataProduct', 'foto'));
        return $pdf->download('Product.pdf');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new ProductExport(), 'dataProductDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function cari(Request $request){
        $countData = $request->input('searchByData');
        $cari = $request->input('search');

        if($countData != null && $cari != null){
            $data = Product::where('nama', 'LIKE', '%' . $cari . '%')->paginate($countData);
            $foto = Product::with('setProductIDForFotoProduct')->get();
            $total = Product::count();
        }elseif ($cari != null) {
            $data =  Product::where('nama', 'LIKE', '%' . $cari . '%')->get();
            $foto = Product::with('setProductIDForFotoProduct')->get();
            $total = Product::count();
        }else{
            $data =  Product::paginate(10);
            $foto = Product::with('setProductIDForFotoProduct')->get();
            $total = Product::count();
        }


        return view('product.hasil', compact('data', 'foto', 'total'));
    }
}
