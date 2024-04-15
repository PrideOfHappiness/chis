<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Gudang</title>
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
                <h4>Tambah Data Gudang</h4>
                <form action="{{ route('warehouse.update', $data->warehouseID)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code" id="code" value="{{$data->warehouseIDs}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama">Nama Gudang</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$data->warehouseName}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" required>{{$data->alamat}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="{{$data->contact}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tel"">Telepon</label>
                        <input type="text" class="form-control" name="tel" id="tel"" value="{{$data->telepon}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telHP">Nomor HP</label>
                        <input type="text" class="form-control" name="telHP" id="telHP" value="{{$data->teleponHP}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="{{$data->status}}" selected>{{$data->status}}</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Not Active</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>