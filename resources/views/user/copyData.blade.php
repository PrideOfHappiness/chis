<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Pengguna</title>
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
                <h4>Kopi Data Pengguna</h4>
                <form action="{{ route('user.prosesData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5><b>Data Perusahaan<b></h5>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="code">Code</label>
                            <input type="string" class="form-control" name="code" id="code" value="{{$value}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="perusahaan">Perusahaan</label>
                            <input type="text" class="form-control" name="perusahaan" id="perusahaan" value="{{$data->perusahaan}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" name="department" id="department" value="{{$data->department}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="branch">Branch</label>
                            <input type="text" class="form-control" name="branch" id="branch" value="{{$data->branch}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
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
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value={{ $data->status}}>{{$data->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Not Active</option>
                            </select>
                        </div>
                    </div>
                    <h5><b>Data Pengguna<b></h5>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fileFoto">File Foto</label>
                            <input type="file" class="form-control" name="fileFoto" id="fileFoto" placeholder="Nama Ruangan" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>