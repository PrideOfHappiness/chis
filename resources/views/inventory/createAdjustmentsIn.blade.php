<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Adjustment In</title>
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
                <h4>Tambah Data Product New Adjustments In</h4>
                <form action="{{ route('adjustmentsIn.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" id="type" value="IN">
                    <div class="row g-2">
                        <div class="form-group col-md-6">
                            <label for="perusahaan">Warehouse | Product | Stock</label>
                            <select class="form-control custom-select" name="productID" id="productID">
                                @foreach($data as $list)
                                    <option value="{{$list->productID}}">{{$list->getWarehouseID->warehouseName}} | {{$list->partNo}} {{$list->productName}} ( Stock :{{$list->stock}} ) | Kendaraan: {{$list->getVehicleTypeFromVehicleType->getMerkFromMerkKendaran->namaKendaraan}}  {{$list->getVehicleTypeFromVehicleType->vehicle_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="branch">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
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