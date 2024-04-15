<?php

namespace App\Http\Controllers;

use App\Exports\ForwarderExport;
use Illuminate\Http\Request;
use App\Models\Forwarders;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;

class ForwarderController extends Controller
{
    public function index(){
        $data = Forwarders::paginate(10);
        $total = Forwarders::count();
        return view('forwarder.index', compact('data', 'total'));
    }

    public function create(){
        $awal = 'FOR-';
        $angka = rand(100000,199999);
        $string = $awal.$angka;
        return view('forwarder.create', compact('string'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'supplierID' => 'required',
            'forwarderName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        $id = $request->input('supplierID');
        $name = $request->input('forwarderName');
        $alamat = $request->input('address');
        $city = $request->input('city');
        $contact = $request->input('contact');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $status = $request->input('status');

        if($id != null){
            Forwarders::create([
                'code' => $id,
                'forwaderName' => $name,
                'alamat' => $alamat,
                'city' => $city,
                'contact' => $contact,
                'telepon'=> $phone,
                'teleponHP' => $phone,
                'email' => $email,
                'status' => $status,
            ]);
        }

        $data = Forwarders::paginate(10);
        $total = Forwarders::count();
        return view('forwarder.index', compact('data', 'total'))->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = Forwarders::find($id);
        return view('forwarder.edit', compact('data'));
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function exportToCSV(Request $request){
        return Excel::download(new ForwarderExport(), 'dataSupplierDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = Forwarders::all();
        $pdf = PDF::loadView('supplier.print', compact('dataProduct'));
        return $pdf->download('Supplier.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData');

        if($dataCari != null && $pagination != null){
            $data = Forwarders::where('nama', 'LIKE', '%' . $dataCari . '%')->paginate($pagination);
            $total = Forwarders::count();
        }elseif ($dataCari != null) {
            $data =  Forwarders::where('nama', 'LIKE', '%' . $dataCari . '%')->get();
            $total = Forwarders::count();
        }else{
            $data =  Forwarders::paginate(10);
            $total = Forwarders::count();
        }


        return view('supplier.hasil', compact('data', 'total'));
    }
}
