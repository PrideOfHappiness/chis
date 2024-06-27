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
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\ProductCategory_Sub;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index(){
        $data = Product::paginate(10);
        $foto = Product::with('fotoProducts')->get();
        $total = Product::count();
        return view('product.index', compact('data', 'total', 'foto'));
    }

    public function create(){
        $brand = Brand::all();
        $data = ProductCategory_Sub::all();
        $vehicleType = VehicleType::all();
        $subCategory = SubCategory::all();
        return view('product.create', compact('data', 'vehicleType', 'brand', 'subCategory'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'partNumber' => 'required',
            'productname' => 'required',
            'productCategory' => 'required',
            'vehicleType' => 'required',
            'status' => 'required',
            'hargabeli' => 'required',
            'hpp' => 'required',
            'hargaJual' => 'required',
            'satuan' => 'required',
            'min_stock' => 'required',
            'stock' => 'required',
            'notes' => 'required',
            'subcategory' => 'required',
        ]);

        $brand = $request->input('brand');
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
        $subCategory = $request->input('subcategory');

        $data = Product::create([
            'brand' => $brand,
            'code' => $code,
            'part_no' => $partNumber,
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
            'subCategory' => $subCategory,
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
        $subCategory = SubCategory::all();
        $vehicleType = VehicleType::all();
        $brand = Brand::all();
        $foto = $data->fotoProducts;
        return view('product.edit', compact('data', 'productCategory','vehicleType', 'subCategory','foto', 'brand'));
    }

    public function update(Request $request, $id){
        $data = Product::find($id);

        try{
            $data->code =  $request->input('code');
            $data->part_no = $request->input('partnumber');
            $data->productName = $request->input('productname');
            $data->vehicleType = $request->input('vehicleType');
            $data->productCategory = $request->input('productCategory');
            $data->status = $request->input('status');
            $data->min_stock = $request->input('min_stock');
            $data->stock = $request->input('stock');
            $data->satuan = $request->input('satuan');
            $data->harga_beli = $request->input('hargabeli');
            $data->hpp = $request->input('hpp');
            $data->harga_jual = $request->input('hargaJual');
            $data->notes = $request->input('notes');
            $data->subCategory = $request->input('subcategory');
            $data->update();

            if($request->hasFile('fileFoto')){
                $file = $request->file('fileFoto');
                $uniqueFileName = $file->getClientOriginalName();
                
                // Cari atau buat baru FotoProduct
                $model = FotoProduct::where('productID', $data->productID)->first();
                if($model == null){
                    $model = new FotoProduct();
                    $model->productID = $data->productID;
                }
        
                $model->namaFile = $uniqueFileName;
                $model->save();
        
                // Pindahkan file ke folder tujuan
                $file->move('fotoProduct/', $uniqueFileName);
            }
            return redirect('admin/product')->with('success', 'Data berhasil diubah!');
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
    }

    public function destroy($id){
        $data = Product::find($id);
        $data->delete();
        return view('product.index')->with('success', 'Data berhasil dihapus!');
    }

    public function print(Request $request){
        ini_set('max_execution_time', 1000);
        $dataProduct = Product::all();
        $foto = Product::with('fotoProducts')->get();
        $pdf = PDF::loadView('product.print', compact('dataProduct', 'foto'));
        return $pdf->download('Product.pdf');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new ProductExport(), 'dataProductDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function cari(Request $request){
        $countData = $request->input('searchByData', 10);
        $dataCari = $request->input('search');

        if(empty($dataCari)){
            return response()->json([
                'data' => [],
                'total' => 0,
            ]);
        }

        $query = Product::with(['fotoProducts', 'getVehicleTypeFromVehicleType', 
        'getProductCategoryFromVehicleType', 'getSubCategoryFromSubCategory', 'getBrand']);

        if (!empty($dataCari)) {
        $query->where('productName', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('code', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('part_no', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('hpp', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('status', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('min_stock', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('stock', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('satuan', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('harga_beli', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('harga_jual', 'LIKE', '%' . $dataCari . '%');
    }

        $data = $query->paginate($countData);
        $total = Product::count();

        return view('product.index', compact('data', 'total'));
    }


    public function impor(){
        return view('product.imporData');
    }

    public function imporData(Request $request){
        $request->validate([
            'fileProduk' => 'required|mimes:xlsx,csv,pdf',
        ]);
        Excel::import(new ProductImport, $request->file('fileProduk'));

        return redirect('/admin/product')->with('success', 'Data imported successfully');
    }

    public function kopiData(){
        $data = Product::all();
        $foto = Product::with('fotoProducts')->get();

        return view('product.copy', compact('data', 'foto'));
    }

    public function copy($id){
        $data = Product::find($id);
        $productCategory = ProductCategory::all();
        $brand = Brand::all();
        $subCategory = SubCategory::all();
        $vehicleType = VehicleType::all();
        $foto = $data->fotoProducts;
        return view('product.copyData', compact('data', 'productCategory', 'brand', 'subCategory', 'vehicleType', 'foto'));
    }

    public function prosesData(Request $request){
        $brand = $request->input('brand');
        $code = $request->input('code');
        $partNumber = $request->input('partnumber');
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
        $subCategory = $request->input('subcategory');

        $data = Product::create([
            'brand' => $brand,
            'code' => $code,
            'part_no' => $partNumber,
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
            'subCategory' => $subCategory,
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
}
