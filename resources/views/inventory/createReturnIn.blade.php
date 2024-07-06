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
                    <input type="hidden" name="userid" id="userid" value="{{$user}}">
                    <div class="row g-3">
                        <div class="form-group col-md-6">
                            <label for="perusahaan">Warehouse | Product | Stock</label>
                            <select class="form-control custom-select" name="productID" id="productID">
                                @foreach($data as $list)
                                    <option value="{{$list->productID}}">{{$list->getWarehouseID->warehouseName}} | {{$list->partNo}} {{$list->productName}} ( Stock :{{$list->stock}} ) | Kendaraan: {{$list->getVehicleTypeFromVehicleType->getMerkFromMerkKendaran->namaKendaraan}}  {{$list->getVehicleTypeFromVehicleType->vehicle_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="perusahaan">Customer Name</label>
                            <select class="form-control custom-select" name="customerID" id="customerID">
                                @foreach($customer as $list)
                                    <option value="{{$list->customerID}}">{{$list->customerName}} - {{$list->alamat}} {{$list->kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="department">Harga Retur</label>
                            <input type="number" class="form-control" name="hargaretur" id="hargaretur" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="department">Biaya Retur</label>
                            <input type="number" class="form-control" name="biayaretur" id="biayaretur" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="branch">Tanggal Retur</label>
                            <input type="date" class="form-control" name="tanggalretur" id="tanggalretur" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="department">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="branch">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required></textarea>
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