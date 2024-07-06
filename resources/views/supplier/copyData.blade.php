<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Supplier</title>
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
                <h4>Tambah Data supplier</h4>
                <form action="{{ route('supplier.prosesData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="supplierID">Supplier ID</label>
                            <input type="text" class="form-control" name="supplierID" id="supplierID" value="{{$gabungan}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code" value="{{$data->code}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="supplierName">Supplier Name</label>
                            <input type="text" class="form-control" name="supplierName" id="supplierName" value="{{$data->supplierName}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" value="Address" required>{{$data->alamat}}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control" name="contact" id="contact" value="{{$data->contact}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$data->telepon}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Mobile Phone Number</label>
                            <input type="text" class="form-control" name="phoneHP" id="phoneHP" value="{{$data->teleponHP}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fax">Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{$data->teleponFax}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">NPWP</label>
                            <input type="text" class="form-control" name="npwp" id="city" value="{{$data->npwp}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="npwp">Category</label>
                            <select class="form-control custom-select" name="category" id="category">
                                <option value="{{$data->kategori}}">{{$data->kategori}}</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                                <option value="Import">Import</option>
                                <option value="Local">Local</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="{{$data->status}}">{{$data->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="top">Term of Payment</label>
                            <input type="text" class="form-control" name="top" id="top" value="{{$data->bayarPer}}" required>
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