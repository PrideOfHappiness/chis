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
                <h4>Tambah Data Supplier</h4>
                <form action="{{ route('forwarder.update', $data->forwaderID)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="supplierID">Code</label>
                            <input type="text" class="form-control" name="supplierID" id="supplierID" value="{{$data->code}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="forwarderName">Forwarder Name</label>
                            <input type="text" class="form-control" name="forwarderName" id="ForwarderName" value="{{$data->forwaderName}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" required>{{$data->alamat}}"</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" value="{{$data->city}}" required>
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
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control custom-select" name="status" id="status">
                                <option value="{{$data->status}}">{{$data->status}}</option>
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