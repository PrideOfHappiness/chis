<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Kategori Produk</title>
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
                <h4>Tambah Data Approval Jabatan</h4>
                <form action="{{ route('userApproval.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="approval">Approval</label>
                            <input type="text" class="form-control" name="approval" id="approval" placeholder="Approval Sebagai" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sequence">Sequence</label>
                            <input type="integer" class="form-control" name="sequence" id="sequence" placeholder="Sequence" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jabatan">Responsible As</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama">Name</label>
                            <select class="form-control custom-select" name="nama" id="nama">
                                @foreach($data as $data)
                                    <option value="{{$data->userIDNo}}">{{$data->userName}} - {{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control custom-select">
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
                            </select>
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