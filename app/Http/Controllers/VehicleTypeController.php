<?php

namespace App\Http\Controllers;

use App\Exports\VehicleTypeExport;
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
        return view('vehicleType.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'merk' => 'required',
            'type' => 'required',
        ]);

        $id = $request->input('id');
        $merk = $request->input('merk');
        $type = $request->input('type');

        VehicleType::create([
            'ID' => $id,
            'kendaraan' => $merk,
            'type' => $type,
        ]);

        $data = VehicleType::paginate(10);
        $total = VehicleType::count();
        return view('vehicleType.index', compact('data', 'total'))
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = VehicleType::find($id);
        return view('vehicleType.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = VehicleType::find($id);
        $this->validate($request, [
            'id' => 'required',
            'merk' => 'required',
            'type' => 'required',
        ]);

        $data->id = $request->input('id');
        $data->kendaraan = $request->input('merk');
        $data->type = $request->input('type');
        $data->update();

        $data = VehicleType::paginate(10);
        $total = VehicleType::count();
        return view('vehicleType.index', compact('data', 'total'))
            ->with('success', 'Data berhasil diubah!');

    }

    public function destroy($id){
        $data = VehicleType::find($id);
        $data->delete();

        return view('vehicleType.index')
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
            $data = VehicleType::where('kendaraan', 'LIKE', '%' . $dataCari . '%')
            ->orwhere('type', 'LIKE', '%' . $dataCari . '%')
            ->take($pagination)->get();
        }else{
            $data =  VehicleType::paginate(10);        }


        return response()->json($data);
    }
}
