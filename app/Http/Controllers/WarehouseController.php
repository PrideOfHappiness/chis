<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouses;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WarehouseExport;

class WarehouseController extends Controller
{
    public function index(){
        $data = Warehouses::paginate(10);
        $total = Warehouses::count();
        return view('warehouse.index', compact('data', 'total'));
    }

    public function create(){
        return view('warehouse.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'contact' => 'required',
            'tel' => 'required',
            'telHP' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        $code = $request->input('code');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $contact = $request->input('contact');
        $telepon = $request->input('tel');
        $nomorHP = $request->input('telHP');
        $email = $request->input('email');
        $status = $request->input('status');

        Warehouses::create([
            'warehouseIDs' => $code,
            'warehouseName' => $nama,
            'alamat' => $alamat,
            'contact' => $contact,
            'telepon' => $telepon,
            'teleponHP' => $nomorHP,
            'email' => $email,
            'status' => $status,
        ]);

        $data = Warehouses::paginate(10);
        $total = Warehouses::count();
        return view('warehouse.index', compact('data', 'total'))
        ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = Warehouses::find($id);
        return view('warehouse.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $dataID = Warehouses::find($id);
        $this->validate($request, [
            'code' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'contact' => 'required',
            'tel' => 'required',
            'telHP' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        $dataID->code = $request->input('code');
        $dataID->nama = $request->input('nama');
        $dataID->alamat = $request->input('alamat');
        $dataID->contact = $request->input('contact');
        $dataID->telepon = $request->input('tel');
        $dataID->nomorHP = $request->input('telHP');
        $dataID->email = $request->input('email');
        $dataID->status = $request->input('status');
        $dataID->update();

        $data = Warehouses::paginate(10);
        $total = Warehouses::count();
        return view('warehouse.index', compact('data', 'total'))
        ->with('success', 'Data berhasil diubah!');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new WarehouseExport(), 'dataVehicleTypeDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = Warehouses::all();
        $pdf = PDF::loadView('warehouse.print', compact('dataProduct'));
        return $pdf->download('Warehouses.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData');

        if($dataCari != null && $pagination != null){
            $data = Warehouses::where('nama', 'LIKE', '%' . $dataCari . '%')->paginate($pagination);
            $total = Warehouses::count();
        }elseif ($dataCari != null) {
            $data =  Warehouses::where('nama', 'LIKE', '%' . $dataCari . '%')->get();
            $total = Warehouses::count();
        }else{
            $data =  Warehouses::paginate(10);
            $total = Warehouses::count();
        }


        return view('warehouse.hasil', compact('data', 'total'));
    }
}
