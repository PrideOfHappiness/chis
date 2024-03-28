<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\VehicleType;

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
        return view('vehicleType.index', compact('data'))
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = VehicleType::find($id);
        return view('vehicleType.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = VehicleType::find($id);
        $this->validateRequest($request, [
            'id' => 'required',
            'merk' => 'required',
            'type' => 'required',
        ]);

        $data->id = $request->input('id');
        $data->merk = $request->input('merk');
        $data->type = $request->input('type');
        $data->update();

        return view('vehicleType.index')
        ->with('success', 'Data berhasil diubah!');

    }

    public function destroy($id){
        $data = VehicleType::find($id);
        $data->delete();

        return view('vehicleType.index')
        ->with('success', 'Data berhasil dihapus!');
    }
}
