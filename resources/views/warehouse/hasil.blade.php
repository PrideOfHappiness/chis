<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data warehouse</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        <div class="mt-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif 
            <header>
                <h1>warehouse Dashboard</h1>
                <a class="btn btn-success" href="{{ route('warehouse.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Warehouse</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>Email Group</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $warehouse)
                            <tr>
                                <td>{{ $warehouse->warehouseID }}</td>
                                <td>{{ $warehouse->warehouseIDs }}</td>
                                <td>{{ $warehouse->warehouseName }}</td>
                                <td>{{ $warehouse->alamat }}</td>
                                <td>{{ $warehouse->contact }}</td>
                                <td>{{ $warehouse->telepon }}</td>
                                <td>{{ $warehouse->email }}</td>
                                <td>{{ $warehouse->status }}</td>
                                <td>
                                    <a href="{{route('warehouse.edit', $warehouse->warehouseID)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Menampilkan {{$data->count()}} dari {{$total}} data</p>
                <a class="btn btn-primary" href="/admin/warehouse/pilihCopy"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="#" method="POST"> 
                    <i class="fa-solid fa-file-export"></i>
                    Export to CSV
                </a>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>

            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>