<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forwarders;

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
}
