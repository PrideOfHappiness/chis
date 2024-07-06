<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserApproval;
use App\Models\User;
use App\Exports\ApprovalExport;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel; 

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

        if($sequence != ''){
            $jabatan2 = UserApproval::where('jabatan', $jabatan)->where('approval', $data)->first();
            if($jabatan2){
                $sequence += 1;
            }
        }
        
        UserApproval::create([
            'approval' => $data,
            'userID' => $nama,
            'sequence' => $sequence,
            'jabatan' => $jabatan,
            'status' => $status,
        ]);

        return redirect()->route('userApproval.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = UserApproval::find($id);
        $users = User::all();
        return view('approval.edit', compact('data', 'users'));
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

        return redirect()->route('userApproval.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Request $request, $id){
        $data = UserApproval::find($id);
        $data->delete();

        return redirect()->route('userApproval.index')->with('success', 'Data berhasil dihapus!');
    }

    public function cari(Request $request){
        $dataCari = $request->input('search');
        $pagination = $request->input('searchByData');

        if(empty($dataCari)){
            return response()->json([
                'data' => [],
                'total' => 0,
            ]);
        }

        $query = UserApproval::with(['getUserIDFromUsers']);

        if (!empty($dataCari)) {
            $query->where('approval', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('sequence', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('jabatan', 'LIKE', '%' . $dataCari . '%')
            ->orWhere('status', 'LIKE', '%' . $dataCari . '%');
    }

        $data = $query->paginate($pagination);
        $total = UserApproval::count();

        return view('approval.index', compact('data', 'total'));
    }

    public function exportToCSV(Request $request){
        return Excel::download(new ApprovalExport(), 'dataApprovalDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataProduct = UserApproval::all();
        $pdf = PDF::loadView('approval.print', compact('dataProduct'));
        return $pdf->download('Approval.pdf');
    }

    public function kopiData(){
        $data = UserApproval::all();
        return view('approval.copy', compact('data'));
    }

    public function copy($id){
        $data = UserApproval::find($id);
        $users = User::all();
        return view('approval.kopidata', compact('data', 'users'));
    }

    public function prosesData(Request $request){
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

        if($sequence != ''){
            $jabatan2 = UserApproval::where('jabatan', $jabatan)->where('approval', $data)->first();
            if($jabatan2){
                $sequence += 1;
            }
        }
        
        UserApproval::create([
            'approval' => $data,
            'userID' => $nama,
            'sequence' => $sequence,
            'jabatan' => $jabatan,
            'status' => $status,
        ]);
            return redirect()->route('userApproval.index')
            ->with('success', 'Data berhasil ditambahkan!');
        }
    }
