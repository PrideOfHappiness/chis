<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Customer</title>
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
                <h4>Tambah Data Customer</h4>
                <form action="{{ route('customer.update', $data->customerID)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="customerID">Customer ID</label>
                        <input type="text" class="form-control" name="customerID" id="customerID" value="{{$data->customerIDs}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code" id="code" value="{{$data->code}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="customerName">Customer Name</label>
                        <input type="text" class="form-control" name="customerName" id="customerName" value="{{$data->customername}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" required>{{$data->alamat}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deliveryAddress">Delivery Address</label>
                        <textarea class="form-control" name="deliveryAddress" id="deliveryAddress" required>{{$data->deliveryAddress}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="{{$data->contact}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{$data->telepon}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phoneHP">Mobile Phone Number</label>
                        <input type="text" class="form-control" name="phoneHP" id="phoneHP" value="{{$data->teleponHP}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" name="fax" id="fax" value="{{$data->teleponFax}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{$data->kota}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="area">Area</label>
                        <select class="form-control" name="area" id="area">
                            <option value="{{$data->area}}">{{$data->area}}</option>
                            <option value="Bali">Bali</option>
                            <option value="Jabodetabek">Jabodetabek</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Kalimantan">Kalimantan</option>
                            <option value="NTB">Nusa Tenggara Barat</option>
                            <option value="NTT">Nusa Tenggara Timur</option>
                            <option value="Sumatera">Sumatera</option>
                            <option value="Sulawesi">Sulawesi</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Papua">Papua</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="{{$data->status}}">{{$data->status}}</option>
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="statusPKP">Status PKP</label>
                        <select class="form-control" name="statusPKP" id="statusPKP">
                            <option value="{{$data->statusPKP}}">{{$data->statusPKP}}</option>
                            <option value="YES">Yes</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salesmanID">Salesman</label>
                        <select class="form-control" name="salesmanID" id="salesmanID">
                            <option value="{{$data->userIDSales}}">{{$data->getUserIDFromUsers2->nama}}</option>
                            <option value="">--</option>
                            @foreach ($sales as $person)
                                <option value="{{$person->id}}">{{$person->getUserIDFromUsers2->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="top">Term of Payment</label>
                        <input type="text" class="form-control" name="top" id="top" value="{{$data->bayarPer}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>