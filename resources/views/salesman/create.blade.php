<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Salesman</title>
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
                <h4>Tambah Data Salesman</h4>
                <form action="{{ route('salesman.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="salesmanID">Salesman ID</label>
                            <input type="text" class="form-control" name="salesmanID" id="salesmanID" placeholder="ID Sales" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="salesmanName">Salesman Name</label>
                            <input type="text" class="form-control" name="salesmanName" id="salesmanName" placeholder="Nama Sales" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="salesmanCode">Salesman Code</label>
                            <input type="text" class="form-control" name="salesmanCode" id="salesmanCode" placeholder="Kode Sales" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
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