<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Approval Jabatan</title>
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
                <h4>Ubah Data Approval Jabatan</h4>
                <form action="{{ route('productCategory.store')}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="approval">Approval</label>
                            <input type="text" class="form-control" name="approval" id="approval" value="{{$data->approval}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sequence">Sequence</label>
                            <input type="integer" class="form-control" name="sequence" id="sequence" value="{{$data->sequence}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jabatan">Responsible As</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{$data->jabatan}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama">Name</label>
                            <select class="form-control" name="nama" id="nama">
                                <option value="{{$data->getUserIDFromUsers->userIDNo}}">{{$data->getUserIDFromUsers->userName}} - {{$data->getUserIDFromUsers->nama}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" id="status" value="{{$data->status}}" required>
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