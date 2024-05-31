<?php

namespace App\Http\Controllers;

use App\Exports\SupplierExport;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuppliersExcelExport;

class SupplierController extends Controller
{
    public function index(){
        $data = Suppliers::paginate(10);
        $total = Suppliers::count();
        return view('supplier.index', compact('data', 'total'));
    }

    public function create(){
        $string = 'SUP-';
        $total = Suppliers::count();
        if($total == 0){
            $angka = '00001';
        }elseif($total !=0 && $total < 10){
            $angka = $total + 1;
            $angka = '0000'.$angka;
        }elseif ($total >= 10 && $total < 100) {
            $angka = $total + 1;
            $angka = '000'.$angka;
        }elseif ($total >= 100 && $total < 1000) {
            $angka = $total + 1;
            $angka = '000'.$angka;
        }elseif ($total >= 1000 && $total < 10000) {
            $angka = $total + 1;
            $angka = '000'.$angka;
        }else{
            $angka = $total;
        }

        $gabungan = $string.$angka; 
        return view('supplier.create', compact('gabungan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'supplierID' => 'required',
            'code' => 'required',
            'supplierName' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'phoneHP' => 'required',
            'fax'=> 'required',
            'status' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'top' => 'required',
            'category' => 'required',
        ]);

        $supplierID = $request->input('supplierID');
        $code = $request->input('code');
        $supplierName = $request->input('supplierName');
        $address = $request->input('address');
        $contact = $request->input('contact');
        $phone = $request->input('phone');
        $phoneHP = $request->input('phoneHP');
        $fax = $request->input('fax');
        $email = $request->input('email');
        $city = $request->input('city');
        $status = $request->input('status');
        $top = $request->input('top');
        $category = $request->input('category');
        $npwp = $request->input('npwp');

        Suppliers::create([
            'supplierIDs' => $supplierID,
            'code' => $code,
            'supplierName' => $supplierName,
            'alamat' => $address,
            'contact' => $contact,
            'telepon' => $phone,
            'teleponHP' => $phoneHP,
            'email' => $email,
            'kategori' => $category,
            'status' => $status,
            'bayarPer' => $top,
            'npwp' => $npwp,
            'teleponFax' => $fax,
        ]);

        $data = Suppliers::paginate(10);
        $total = Suppliers::count();
        return view('supplier.index', compact('data', 'total'))
            ->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id){
        $data = Suppliers::find($id);
        return view('supplier.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Suppliers::find($id);
        $this->validate($request, [
            'supplierID' => 'required',
            'code' => 'required',
            'supplierName' => 'required',
            'category'=> 'required',
            'status' => 'required',
            'npwp' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'phoneHP' => 'required',
            'fax'=> 'required',
            'email' => 'required',
            'address' => 'required',
            'city'=> 'required',
            'top' => 'required',
        ]);

        $data->test = $request->input('test');
        $data->supplierID = $request->input('supplierID');
        $data->code = $request->input('code');
        $data->supplierName = $request->input('supplierName');
        $data->address = $request->input('address');
        $data->contact = $request->input('contact');
        $data->phone = $request->input('phone');
        $data->phoneHP = $request->input('phoneHP');
        $data->fax = $request->input('fax');
        $data->phone2 = $request->input('phone2');
        $data->phoneHP2 = $request->input('phoneHP2');
        $data->fax2 = $request->input('fax2');
        $data->phone3 = $request->input('phone3');
        $data->phoneHP3 = $request->input('phoneHP3');
        $data->fax3 = $request->input('fax3');
        $data->email = $request->input('email');
        $data->city = $request->input('city');
        $data->status = $request->input('status');
        $data->top = $request->input('top');
        $data->category = $request->input('category');
        $data->npwp = $request->input('npwp');
        $data->update();

        $data = Suppliers::paginate(10);
        $total = Suppliers::count();
        return view('supplier.index', compact('data', 'total'))
            ->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = Suppliers::find($id);
        $data->delete();

        $data = Suppliers::paginate(10);
        $total = Suppliers::count();
        return view('supplier.index', compact('data', 'total'))
        ->with('success', 'Data berhasil dihapus!');
    }

    public function exportToCSV(){
        return Excel::download(new SupplierExport(), 'dataSupplierDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $PDFdata = Suppliers::all();
        $pdf = PDF::loadView('supplier.print', compact('PDFdata'));
        return $pdf->download('Supplier.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData');

        if($dataCari != null){
            $data = Suppliers::where('supplierName', 'LIKE', '%' . $dataCari . '%')
                ->orWhere('alamat', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('contact', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('telepon', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('teloponHP', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('email', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('kategori', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('status', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('bayarPer', 'LIKE', '%'. $dataCari . '%')
                ->orWhere('teleponFax', 'LIKE', '%'. $dataCari . '%')
                ->take($pagination)->get();
        }else{
            $data =  Suppliers::paginate($pagination);
        }
        return response()->json($data);
    }

    public function exportToExcel(Request $request){
        return Excel::download(new SuppliersExcelExport, 'Supplier.xlsx');
    }
}
