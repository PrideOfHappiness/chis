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

        return redirect()->route('forwarder.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = Forwarders::find($id);
        return view('forwarder.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $dataID = Forwarders::find($id);
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

        if($id != null){
            $dataID->code = $request->input('supplierID');
            $dataID->forwaderName = $request->input('forwarderName');
            $dataID->alamat = $request->input('address');
            $dataID->city = $request->input('city');
            $dataID->contact = $request->input('contact');
            $dataID->telepon = $request->input('phone');
            $dataID->teleponHP = $request->input('phone');
            $dataID->email = $request->input('email');
            $dataID->status = $request->input('status');
            $dataID->update();

            return redirect()->route('forwarder.index')->with('success', 'Data berhasil diubah!');
        }else{
            return view('forwarder.edit')->with('error', 'ID belum tersedia!');
        }
    }

    public function destroy($id){
        $dataID = Forwarders::find($id);
        $dataID->delete();

        return redirect()->route('forwarder.index')->with('success', 'Data berhasil dihapus!');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new ForwarderExport(), 'dataForwarderDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = Forwarders::all();
        $pdf = PDF::loadView('forwarder.print', compact('dataProduct'));
        return $pdf->download('Forwarder.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData', 10);

        if($dataCari != null ){
            $data = Forwarders::where('forwaderName', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('code', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('alamat', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('city', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('contact', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('telepon', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('teleponHP', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('email', 'LIKE', '%' . $dataCari. '%')
                ->orWhere('status', 'LIKE', '%' . $dataCari. '%')
                ->take($pagination)->get();
        }else{
            $data =  Forwarders::paginate(10);
        }


        return response()->json($data);
    }

    public function kopiData(){
        $data = Forwarders::all();
        return view('forwarder.copy', compact('data'));
    }

    public function copy($id){
        $data = Forwarders::find($id);
        return view('forwarder.copyData', compact('data'));
    }

    public function prosesData(Request $request){
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
        return redirect()->route('forwarder.index')->with('success', 'Data berhasil ditambahkan!');
    }


    
}
