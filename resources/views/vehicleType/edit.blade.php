<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Tipe Kendaraan</title>
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
                <h4>Tambah Data Kategori Produk</h4>
                <form action="{{ route('vehicleType.update', $data->vehicleTypeID)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="id">Brand Kendaraan</label>
                            <select class="form-control custom-select" name="category" id="category">
                                <option value="{{$data->nama}}">{{$data->getMerkFromMerkKendaran->inisial}} - {{$data->getMerkFromMerkKendaran->namaKendaraan}}</option>
                                @foreach($brand as $dt)
                                    <option value="{{$dt->merkID}}">{{$dt->inisial}} - {{$dt->namaKendaraan}}</option>
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" id="type" value="{{$data->vehicle_type}}">
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