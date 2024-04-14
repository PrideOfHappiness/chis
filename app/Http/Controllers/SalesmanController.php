<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesman;
use App\Models\User;

class SalesmanController extends Controller
{
    public function index(){
        $data = Salesman::paginate(10);
        $total = Salesman::count();
        return view('salesman.index', compact('data', 'total'));
    }

    public function create(){
        return view('salesman.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'salesmanID' => 'required',
            'salesmanName' => 'required',
            'salesmanCode' => 'required',
            'status' => 'required',
        ]);

        $salesmanID = $request->input('salesmanID');
        $salesmanName = $request->input('salesmanName');
        $salesmanCode = $request->input('salesmanCode');
        $status = $request->input('status');

        if($salesmanID == $salesmanCode){
            $data = User::where('nama', $salesmanName)->first();
            if(!$data){
                return view('salesman.create')
                ->with('error', 'Data Nama tidak tersedia!');
            }else{
                $userID = User::where('nama', $salesmanName)->value('userIDNo');
            }

            Salesman::create([
                'userID' => $userID,
                'alias' => $salesmanCode,
                'status' => $status,
            ]);

            $data = Salesman::paginate(10);
            return view('salesman.index', compact('data'))
                ->with('success', 'Data berhasil ditambahkan!');
        }
    }

    public function edit($id){
        $data = Salesman::find($id);
        return view('salesman.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Salesman::find($id);
        $this->validate($request, [
            'salesmanID' => 'required',
            'salesmanName' => 'required',
            'salesmanCode' => 'required',
            'status' => 'required',
        ]);

        $salesmanID = $request->input('salesmanID');
        $salesmanName = $request->input('salesmanName');
        $salesmanCode = $request->input('salesmanCode');
        $status = $request->input('status');

        if($salesmanID == $salesmanCode){
            $data2 = User::where('nama', $salesmanName)->first();
            if(!$data2){
                return view('salesman.create')
                ->with('error', 'Data Nama tidak tersedia!');
            }else{
                $userID = User::where('nama', $salesmanName)->value('userIDNo');
            }

            $data->userID = $userID;
            $data->alias = $salesmanCode;
            $data->status = $status;
            $data->update();

            $data = Salesman::paginate(10);
            return view('salesman.index', compact('data'))
                ->with('success', 'Data berhasil diubah!');
        }
    }

    public function destroy($id){
        $data = Salesman::find($id);
        $data->delete();
        return view('salesman.index', compact('data'))
                ->with('success', 'Data berhasil dihapuskan!');
    }

    public function exportToCSV(Request $request){
        
    }
}
