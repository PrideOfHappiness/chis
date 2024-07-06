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
                <form action="{{ route('supplier.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="supplierID">Supplier ID</label>
                            <input type="text" class="form-control" name="supplierID" id="supplierID" value="{{$gabungan}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="Code" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="supplierName">Supplier Name</label>
                            <input type="text" class="form-control" name="supplierName" id="supplierName" placeholder="Kategori" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Address" required></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Mobile Phone Number</label>
                            <input type="text" class="form-control" name="phoneHP" id="phoneHP" placeholder="Mobile Phone Number" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fax">Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Other Phone</label>
                            <input type="text" class="form-control" name="phone2" id="phone" placeholder="Phone 2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Other Mobile Phone Number</label>
                            <input type="text" class="form-control" name="phoneHP2" id="phoneHP" placeholder="Mobile Phone Number 2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fax">Other Fax</label>
                            <input type="text" class="form-control" name="fax2" id="fax" placeholder="Fax 2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Other Phone Number 2</label>
                            <input type="text" class="form-control" name="phone3" id="phone" placeholder="Phone 3">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneHP">Other Mobile Phone Number 2</label>
                            <input type="text" class="form-control" name="phoneHP3" id="phoneHP" placeholder=" #Mobile Phone Number3">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fax">Other Fax Number 2</label>
                            <input type="text" class="form-control" name="fax3" id="fax" placeholder="Fax 3">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="npwp">Category</label>
                            <select class="form-control custom-select" name="category" id="category">
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                                <option value="Import">Import</option>
                                <option value="Local">Local</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control custom-select" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
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