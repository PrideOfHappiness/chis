<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\FotoUsers;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{
    public function index(){
        $data = User::paginate(10);
        $total = User::count();
        $foto = User::with('setUserIDForFotoUsers')->get();
        return view('user.index', compact('data', 'foto', 'total'));
    }

    public function create(){
        $acak = rand(1,9999);
        if(!$acak){
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $length = strlen($characters);
            $value = '';

            for ($i = 0; $i < 4; $i++) {
                $value .= $characters[rand(0, $length - 1)];
            }
        }else{
            if($acak < 10){
                $value = '000'. $acak;
            }elseif($acak >= 10 && $acak < 100){
                $value = '00'. $acak;
            }elseif($acak >= 100 && $acak < 100){
                $value = '0'. $acak;
            }else{
                $value = $acak;
            }
        }
        return view('user.create', compact('value'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'perusahaan' => 'required',
            'department' => 'required',
            'branch' => 'required',
            'userAccess' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'fileFoto' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $code = $request->input('code');
        $perusahaan = $request->input('perusahaan');
        $department = $request->input('department');
        $branch = $request->input('branch');
        $user_access = $request->input('userAccess');
        $name = $request->input('nama');
        $username = $request->input('username');
        $email = $request->input('email');
        $status = $request->input('status');
        $password = $request->input('password');

        $checkCode = User::where('code', $code)->exists();
        if($checkCode){
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $length = strlen($characters);
            $value = '';

            for ($i = 0; $i < 4; $i++) {
                $value .= $characters[rand(0, $length - 1)];
                $code = $value;
            }
        }

        $data = User::create([
            'code' => $code,
            'userName' => $username,
            'nama' => $name,
            'perusahaan' => $perusahaan,
            'branch' => $branch,
            'department' => $department,
            'user_access' => $user_access,
            'status' => $status,
            'email' => $email,
            'password' => $password,
        ]);
        if($request->hasFile($request->input('fileFoto'))){
            $file = $request->file('fileFoto');
            $model = new FotoUsers();
            $model->userID = $data->userIDNo;
            $uniqueFileName = $file->getClientOriginalName();
            $model->namaFile = $uniqueFileName;
            $model->save();
            $file->move('fotoUsers/', $uniqueFileName);

            return redirect()->route('user.index')
            ->with('success', 'Data berhasil ditambahkan!');
        }else{
            return redirect()->route('user.create')
            ->with('error', 'Foto belum ditambahkan!');
        }
    }

    public function edit($id){
        $data = User::find($id);
        $foto = $data->setUserIDForFotoUsers;
        return view('user.edit', compact('data', 'foto'));    
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $this->validate($request, [
            'code' => 'required',
            'perusahaan' => 'required',
            'department' => 'required',
            'branch' => 'required',
            'userAccess' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'fileFoto' => 'mimes:jpg,png,jpeg|max:2048',
        ]);
        
        if($request->hasFile('fileFoto')){
            $data->code = $request->input('code');
            $data->perusahaan = $request->input('perusahaan');
            $data->department = $request->input('department');
            $data->branch = $request->input('branch');
            $data->user_access = $request->input('userAccess');
            $data->nama = $request->input('nama');
            $data->username = $request->input('username');
            $data->email = $request->input('email');
            $data->status = $request->input('status');
            $data->password = $request->input('password');
            $data->save();

            $file = $request->file('fileFoto');
            $model = new FotoUsers();
            $model->userID = $data->userIDNo;
            $uniqueFileName = $file->getClientOriginalName();
            $model->namaFile = $uniqueFileName;
            $model->update();
        }else{
            $data->code = $request->input('code');
            $data->perusahaan = $request->input('perusahaan');
            $data->department = $request->input('department');
            $data->branch = $request->input('branch');
            $data->user_access = $request->input('userAccess');
            $data->nama = $request->input('nama');
            $data->username = $request->input('username');
            $data->email = $request->input('email');
            $data->status = $request->input('status');
            $data->password = $request->input('password');
            $data->save();
        }
        return redirect()->route('user.index')
            ->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index')
        ->with('success', 'Data berhasil dihapus!');
    }

    public function kopiData(){
        $data = User::all();
        $foto = User::with('setUserIDForFotoUsers')->get();
        return view('user.copy', compact('data', 'foto'));
    }

    public function copy($id){
        $data = User::find($id);
        $acak = rand(1,9999);
        if(!$acak){
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $length = strlen($characters);
            $value = '';

            for ($i = 0; $i < 4; $i++) {
                $value .= $characters[rand(0, $length - 1)];
            }
        }else{
            if($acak < 10){
                $value = '000'. $acak;
            }elseif($acak >= 10 && $acak < 100){
                $value = '00'. $acak;
            }elseif($acak >= 100 && $acak < 100){
                $value = '0'. $acak;
            }else{
                $value = $acak;
            }
        }
        return view('user.copyData', compact('data', 'value'));
    }

    public function prosesData(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'perusahaan' => 'required',
            'department' => 'required',
            'branch' => 'required',
            'userAccess' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'fileFoto' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $code = $request->input('code');
        $perusahaan = $request->input('perusahaan');
        $department = $request->input('department');
        $branch = $request->input('branch');
        $user_access = $request->input('userAccess');
        $name = $request->input('nama');
        $username = $request->input('username');
        $email = $request->input('email');
        $status = $request->input('status');
        $password = $request->input('password');

        $checkCode = User::where('code', $code)->exists();
        if($checkCode){
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $length = strlen($characters);
            $value = '';

            for ($i = 0; $i < 4; $i++) {
                $value .= $characters[rand(0, $length - 1)];
                $code = $value;
            }
        }

        $data = User::create([
            'code' => $code,
            'userName' => $username,
            'nama' => $name,
            'perusahaan' => $perusahaan,
            'branch' => $branch,
            'department' => $department,
            'user_access' => $user_access,
            'status' => $status,
            'email' => $email,
            'password' => $password,
        ]);
        if($request->hasFile($request->input('fileFoto'))){
            $file = $request->file('fileFoto');
            $model = new FotoUsers();
            $model->userID = $data->userIDNo;
            $uniqueFileName = $file->getClientOriginalName();
            $model->namaFile = $uniqueFileName;
            $model->save();
            $file->move('fotoUsers/', $uniqueFileName);

            return redirect()->route('user.index')
            ->with('success', 'Data berhasil ditambahkan!');
        }else{
            return redirect()->route('user.create')
            ->with('error', 'Foto belum ditambahkan!');
        }
    }

    public function exportToCSV(Request $request){
        return Excel::download(new UserExport(), 'dataUserDownload.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function print(Request $request){
        $dataUser = User::all();
        $pdf = PDF::loadView('user.print', compact('dataUser'));
        return $pdf->download('User.pdf');
    }

    public function cari(Request $request){
        $countData = $request->input('searchByData');
        $cari = $request->input('search');

        if($countData != null && $cari != null){
            $data = User::where('nama', 'LIKE', '%' . $cari . '%')->paginate($countData);
            $foto = User::with('setUserIDForFotoUsers')->get();
            $total = User::count();
        }elseif ($cari != null) {
            $data =  User::where('nama', 'LIKE', '%' . $cari . '%')->get();
            $foto = User::with('setUserIDForFotoUsers')->get();
            $total = User::count();
        }else{
            $data =  User::paginate(10);
            $foto = User::with('setUserIDForFotoUsers')->get();
            $total = User::count();
        }


        return view('user.hasil', compact('data', 'foto', 'total'));
    }
}
