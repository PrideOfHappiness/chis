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
                <form action="{{ route('forwarder.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="supplierID">Code</label>
                        <input type="text" class="form-control" name="supplierID" id="supplierID" value="{{$string}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="forwarderName">Forwarder Name</label>
                        <input type="text" class="form-control" name="forwarderName" id="ForwarderName" placeholder="Forwarder Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>