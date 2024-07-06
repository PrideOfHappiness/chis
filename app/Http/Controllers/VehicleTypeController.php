<?php

namespace App\Http\Controllers;

use App\Exports\VehicleTypeExport;
use App\Models\Brand;
use App\Models\MerkKendaraan;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\VehicleType;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;

class VehicleTypeController extends Controller
{
    public function index(){
        $data = VehicleType::paginate(10);
        $total = VehicleType::count();
        return view('vehicleType.index', compact('data', 'total'));
    }

    public function create(){
        $brand = MerkKendaraan::all();
        return view('vehicleType.create', compact('brand'));
    }

    public function store(Request $request){
        $id = $request->input('category');
        $type = $request->input('type');

        VehicleType::create([
            'nama' => $id,
            'vehicle_type' => $type,
        ]);

        return redirect()->route('vehicleType.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = VehicleType::find($id);
        $brand = MerkKendaraan::all();
        return view('vehicleType.edit', compact('data', 'brand'));
    }

    public function update(Request $request, $id){
        $data = VehicleType::find($id);

        $data->nama = $request->input('category');
        $data->vehicle_type = $request->input('type');
        $data->save();

        return redirect()->route('vehicleType.index')
            ->with('success', 'Data berhasil diubah!');

    }

    public function destroy($id){
        $data = VehicleType::find($id);

        $product = Product::where('vehicleType', $data)->get();
        if(sizeof($product) > 0){
            return redirect()->route('vehicleType.index')
            ->with('error', 'Data tidak dapat dihapus karena data terikat dengan data lain!');
        }else{
            $data->delete();
        }

        return redirect()->route('vehicleType.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new VehicleTypeExport(), 'dataVehicleTypeDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = VehicleType::all();
        $pdf = PDF::loadView('vehicleType.print', compact('dataProduct'));
        return $pdf->download('Vehicle Type.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData', 10);

        if($dataCari != null){
            $data = VehicleType::with('getMerkFromMerkKendaran')
            ->whereHas('getMerkFromMerkKendaran', function($query) use($dataCari){
                $query->where('namaKendaraan', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('inisial', 'LIKE', '%' . $dataCari . '%');
            })
            ->orwhere('vehicle_type', 'LIKE', '%' . $dataCari . '%')
            ->paginate($pagination);
        }else{
            $data =  VehicleType::paginate(10);        
        }

        $total = VehicleType::count();

        return view('vehicleType.index', compact('data', 'total'));
    }

    public function kopiData(){
        $data = VehicleType::all();

        return view('vehicleType.copy', compact('data'));
    }

    public function copy($id){
        $data = VehicleType::find($id);
        $productCategory = MerkKendaraan::all();
        return view('vehicleType.copyData', compact('data', 'productCategory'));
    }

    public function prosesData(Request $request){
        $id = $request->input('category');
        $type = $request->input('type');

        VehicleType::create([
            'nama' => $id,
            'vehicle_type' => $type,
        ]);


        return redirect()->route('vehicleType.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }
}
