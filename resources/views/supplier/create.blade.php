<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Supplier</title>
    <style>
        .column {
            float: left;
            width: 50%; 
        }
    </style>
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
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID">Supplier ID</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" value="{{$gabungan}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Code" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Supplier Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Supplier Name" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Code" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Supplier Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Supplier Name" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Code" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Supplier Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Supplier Name" required>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Code" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Supplier Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Supplier Name" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Code" required>
                        </div>
                    </div>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Supplier Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Supplier Name" required>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="column">
                        <div class="col-md-4">
                            <label for="supplierID" class="form-label">Code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="supplierID" id="supplierID" placeholder="Code" required>
                        </div>
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>