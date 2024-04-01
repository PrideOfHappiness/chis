<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserApproval;
use App\Models\User;

class ApprovalController extends Controller
{
    public function index(){
        $data = UserApproval::paginate(10);
        $total = UserApproval::count();
        return view('approval.index', compact('data', 'total'));
    }

    public function create(){
        $data = User::all();
        return view('approval.create', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'approval' => 'required',
            'sequence' => 'integer|required',
            'jabatan' => 'string|required',
            'nama' => 'required',
            'status' => 'string|required',
        ]);

        $data = $request->input('approval');
        $sequence = $request->input('sequence');
        $jabatan = $request->input('jabatan');
        $nama = $request->input('nama');
        $status = $request->input('status');

        $cekData = UserApproval::where('userID', $nama)->where('approval', $data)->where('sequence', $sequence)->exists();
        if($cekData){
            $sequence = $sequence + 1;
        }
        
        UserApproval::create([
            'approval' => $data,
            'userID' => $nama,
            'sequence' => $sequence,
            'jabatan' => $jabatan,
            'status' => $status,
        ]);

        return view('approval.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = UserApproval::find($id);
        return view('approval.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = UserApproval::find($id);
        $this->validate($request, [
            'approval' => 'required',
            'sequence' => 'integer|required',
            'jabatan' => 'string|required',
            'nama' => 'required',
            'status' => 'string|required',
        ]);

        $data->approval = $request->input('approval');
        $data->sequence = $request->input('sequence');
        $data->jabatan = $request->input('jabatan');
        $data->userID = $request->input('nama');
        $data->status = $request->input('status');
        $data->update();

        return view('approval.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Request $request, $id){
        $data = UserApproval::find($id);
        $data->delete();

        return view('approval.index')->with('success', 'Data berhasil dihapus!');
    }
}
