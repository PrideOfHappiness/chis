<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

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
        if($total < 10){
            $angka = '0000'.$total;
        }elseif ($total >= 10 && $total < 100) {
            $angka = '000'.$total;
        }elseif ($total >= 100 && $total < 1000) {
            $angka = '00'.$total;
        }elseif ($total >= 1000 && $total < 10000) {
            $angka = '0'.$total;
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
        return view('supplier.index', compact('data'))
        ->with('success', 'Data berhasil ditambahkan!');
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

        $data->supplierID = $request->input('supplierID');
        $data->code = $request->input('code');
        $data->supplierName = $request->input('supplierName');
        $data->address = $request->input('address');
        $data->contact = $request->input('contact');
        $data->phone = $request->input('phone');
        $data->phoneHP = $request->input('phoneHP');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->city = $request->input('city');
        $data->status = $request->input('status');
        $data->top = $request->input('top');
        $data->category = $request->input('category');
        $data->npwp = $request->input('npwp');
        $data->update();

        $data = Suppliers::paginate(10);
        return view('supplier.index', compact('data'))
        ->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = Suppliers::find($id);
        $data->delete();

        $data = Suppliers::paginate(10);
        return view('supplier.index', compact('data'))
        ->with('success', 'Data berhasil dihapus!');
    }
}
