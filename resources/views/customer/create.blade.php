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
                <form action="{{ route('customer.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="customerID">Customer ID</label>
                            <input type="text" class="form-control" name="customerID" id="customerID" value="{{$gabungan}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="Code" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="customerName">Customer Name</label>
                            <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Customer Name" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Address" required></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliveryAddress">Delivery Address</label>
                            <textarea class="form-control" name="deliveryAddress" id="deliveryAddress" placeholder="Address" required></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Mobile Phone Number</label>
                            <input type="text" class="form-control" name="phoneHP" id="phoneHP" placeholder="Mobile Phone Number" required>
                    </div>
                    </div>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                                <label for="fax">Fax</label>
                                <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="phone">Other Phone</label>
                                <input type="text" class="form-control" name="phone2" id="phone" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Other Mobile Phone Number</label>
                            <input type="text" class="form-control" name="phoneHP2" id="phoneHP" placeholder="Mobile Phone Number">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="fax">Other Fax</label>
                            <input type="text" class="form-control" name="fax2" id="fax" placeholder="Fax">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Other Phone Number 2</label>
                            <input type="text" class="form-control" name="phone3" id="phone" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Other Mobile Phone Number 2</label>
                            <input type="text" class="form-control" name="phoneHP3" id="phoneHP" placeholder="Mobile Phone Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fax">Other Fax Number 2</label>
                            <input type="text" class="form-control" name="fax3" id="fax" placeholder="Fax">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="area">Area</label>
                            <select class="form-control" name="area" id="area">
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
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="statusPKP">Status PKP</label>
                            <select class="form-control" name="statusPKP" id="statusPKP">
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="salesmanID">Salesman</label>
                            <select class="form-control" name="salesmanID" id="salesmanID">
                                <option value="">--</option>
                                @foreach ($sales as $person)
                                    <option value="{{$person->id}}">{{$person->getUserIDFromUsers2->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="top">Term of Payment</label>
                            <input type="text" class="form-control" name="top" id="top" placeholder="Term of Payment" required>
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