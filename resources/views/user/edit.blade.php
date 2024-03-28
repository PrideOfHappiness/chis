<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data {{ $data->userName }} - {{ $data->nama }}</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif 
                <h4>Ubah Data {{ $data->userName }} - {{ $data->nama }}</h4>
                <form action="{{ route('user.update', $data->userIDNo)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <h5><b>Data Perusahaan<b></h5>
                    <div class="mb-3">
                        <label for="code">Code</label>
                        <input type="string" class="form-control" name="code" id="code" value="{{$data->code}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="perusahaan">Perusahaan</label>
                        <select class="form-control" name="perusahaan" id="perusahaan">
                            <option value="{{$data->perusahaan}}">{{$data->perusahaan}}</option>
                            <option value="PT. Cipta Harapan Indah Strategi">PT. Cipta Harapan Indah Strategi</option>
                            <option value="Eka Nusa">PT. Eka Nusa</option>
                            <option value="PT. CHIS">PT. CHIS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" name="department" id="department" value="{{$data->department}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="branch">Branch</label>
                        <input type="text" class="form-control" name="branch" id="branch" value="{{$data->branch}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="userAccess">User Access</label>
                        <select class="form-control" name="userAccess" id="userAccess">
                            <option value={{ $data->user_access}}>{{$data->getUserAccessFromUserAccess->user_access}}</option>
                            <option value=3>Admin</option>
                            <option value=9>Admin Gudang</option>
                            <option value=8>Back Office</option>
                            <option value=7>Finance</option>
                            <option value=1>Master</option>
                            <option value=6>Production</option>
                            <option value=5>Sales</option>
                            <option value=2>Super Admin</option>
                            <option value=4>Warehouse</option>
                            <option value=10>Warehouse 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vv">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Not Active</option>
                        </select>
                    </div>
                    <h5><b>Data Pengguna<b></h5>
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{$data->userName}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{$data->password}}" required>
                    </div>
                    @if($foto->count() > 0)
                    <label for="gambar" class="form-label">Foto Awal</label>
                    <div class="form-control">
                        @foreach($data->setUserIDForFotoUsers as $gambar)
                            <div class="mb-3">
                                <img width="150px" src="{{ asset('fotoUsers/'. $gambar->namaFile) }}" alt="Gambar Plat Nomor">
                            </div>
                        @endforeach
                    </div>
                    @else
                        <p>Tidak ada gambar terkait.</p>
                    @endif
                    <div class="mb-3">
                        <label for="fileFoto">File Foto</label>
                        <input type="file" class="form-control" name="fileFoto" id="fileFoto">
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>