<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Return In</title>
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
                <h4>Tambah Data Product New Return In</h4>
                <form action="{{ route('returnIn.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" id="type" value="IN">
                    <div class="mb-3">
                        <label for="perusahaan">Warehouse | Product | Stock</label>
                        <select class="form-control custom-select" name="productID" id="productID">
                            @foreach($data as $list)
                                <option value="{{$list->productID}}">{{$list->code}} {{$list->partNo}} {{$list->productName}} Kendaraan : {{$list->getVehicleTypeFromVehicleType->kendaraan}}  {{$list->getVehicleTypeFromVehicleType->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department">Qty</label>
                        <input type="number" class="form-control" name="qty" id="qty" required>
                    </div>
                    <div class="mb-3">
                        <label for="branch">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>