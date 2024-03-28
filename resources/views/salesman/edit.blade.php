<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Salesman</title>
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
                <h4>Ubah Data Salesman {{$data->getUserIDFromUsers2->nama}}</h4>
                <form action="{{ route('salesman.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="salesmanID">Salesman ID</label>
                        <input type="text" class="form-control" name="salesmanID" id="salesmanID" value="{{$data->alias}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category">Salesman Name</label>
                        <input type="text" class="form-control" name="category" id="category" value="{{$data->getUserIDFromUsers2->nama}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category">Salesman Code</label>
                        <input type="text" class="form-control" name="category" id="category" pvalue="{{$data->alias}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category">Status</label>
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