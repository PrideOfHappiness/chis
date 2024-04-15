<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouses;

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
}
