<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Salesman;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomersExcelExport;

class CustomerController extends Controller
{
    public function index(){
        $data = Customers::paginate(10);
        $total = Customers::count();
        return view('customer.index', compact('data', 'total'));
    }

    public function create(){
        $string = 'CUST-';
        $total = Customers::count();
        if($total === 0){
            $angka = '00001';
        }elseif($total != 0 && $total < 10){
            $angka = $total + 1;
            $angka = '000'.$angka;
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
        $sales = Salesman::all();
        return view('customer.create', compact('gabungan', 'sales'));

    }

    public function store(Request $request){
        $this->validate($request, [
            'customerID' => 'required',
            'code' => 'required',
            'customerName' => 'required',
            'address' => 'required',
            'deliveryAddress' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'phoneHP' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'city' => 'required',
            'area' => 'required',
            'status' => 'required',
            'statusPKP' => 'required',
            'salesmanID' => 'required',
            'top' => 'required',
        ]);

        $customerID = $request->input('customerID');
        $code = $request->input('code');
        $customerName = $request->input('customerName');
        $address = $request->input('address');
        $deliveryAddress = $request->input('deliveryAddress');
        $contact = $request->input('contact');
        $phone = $request->input('phone');
        $phoneHP = $request->input('phoneHP');
        $fax = $request->input('fax');
        $email = $request->input('email');
        $city = $request->input('city');
        $area = $request->input('area');
        $status = $request->input('status');
        $statusPKP = $request->input('statusPKP');
        $salesmanID = $request->input('salesmanID');
        $top = $request->input('top');

        Customers::create([
            'customerIDs' => $customerID,
            'code' => $code,
            'customerName' => $customerName,
            'alamat' => $address,
            'contact' => $contact,
            'telepon' => $phone,
            'teleponHP' => $phoneHP,
            'teleponFax' => $fax,
            'email' => $email,
            'kota' => $city,
            'area' => $area,
            'status' => $status,
            'statusPKP' => $statusPKP,
            'userIDSales' => $salesmanID,
            'deliveryAddress' => $deliveryAddress,
            'bayarPer' => $top,
        ]);

        $data = Customers::paginate(10);
        $total = Customers::count();
        return view('customer.index', compact('data', 'total'))
        ->with('success', 'Data customer behasil ditambahkan!');
    }

    public function edit($id){
        $data = Customers::find($id);
        $sales = Salesman::all();
        return view('customer.edit', compact('data', 'sales'));       
    }

    public function update(Request $request, $id){
        $data = Customers::find($id);
        $this->validate($request, [
            'customerID' => 'required',
            'code' => 'required',
            'customerName' => 'required',
            'address' => 'required',
            'deliveryAddress' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'phoneHP' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'city' => 'required',
            'area' => 'required',
            'status' => 'required',
            'statusPKP' => 'required',
            'salesmanID' => 'required',
            'top' => 'required',
        ]);
        
        $data->customerID = $request->input('customerID');
        $data->code = $request->input('code');
        $data->customerName = $request->input('customerName');
        $data->address = $request->input('address');
        $data->deliveryAddress = $request->input('deliveryAddress');
        $data->contact = $request->input('contact');
        $data->phone = $request->input('phone');
        $data->phoneHP = $request->input('phoneHP');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->city = $request->input('city');
        $data->area = $request->input('area');
        $data->status = $request->input('status');
        $data->statusPKP = $request->input('statusPKP');
        $data->salesmanID = $request->input('salesmanID');
        $data->top = $request->input('top');
        $data->update();

        return view('customer.index')
        ->with('success', 'Data customer behasil diubah!');
    }

    public function destroy($id){
        $dataHapus = Customers::find($id);
        $dataHapus->delete();

        $data = Customers::paginate(10);
        $total = Customers::count();
        return view('customer.index', compact('data', 'total'))
        ->with('success', 'Data customer behasil dihapus!');
    }

    public function exportToCSV(Request $request){
        return Excel::download(new CustomerExport(), 'dataCustomersDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = Customers::all();
        $pdf = PDF::loadView('customer.print', compact('dataProduct'));
        return $pdf->download('Customer.pdf');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData');

        if($dataCari != null && $pagination != null){
            $data = Customers::where('customerName', 'LIKE', '%' . $dataCari . '%')->paginate($pagination);
            $total = Customers::count();
        }elseif ($dataCari != null) {
            $data =  Customers::where('customerName', 'LIKE', '%' . $dataCari . '%')->get();
            $total = Customers::count();
        }else{
            $data =  Customers::paginate(10);
            $total = Customers::count();
        }


        return view('customer.hasil', compact('data', 'total'));
    }

    public function exportToExcel(Request $request){
        return Excel::download(new CustomersExcelExport, 'Customer.xlsx');
    }
}
