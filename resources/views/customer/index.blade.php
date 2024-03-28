<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Customer</title>
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
                <h1>Customer Dashboard</h1>
                <a class="btn btn-success" href="{{ route('customer.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
                <a class="btn btn-success" href="#"> 
                    <i class="fa-solid fa-file-excel"></i>
                        Excel
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cari')}}" method="post">
                        <label for="searchByData" id="searchByData">Cari berdasarkan: </label>
                        <select name="searchByData" id="searchByData">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                        </select>
                        <label for="search">Cari berdasarkan: </label>
                        <input type="text" name="search" id="search" placeholder="Cari dengan nama...">
                        <button type="submit" class="btn btn-primary" style="height: 40px;">Cari</button>
                    </form>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Customer</th>
                            <th>Delivery Address</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>HP</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th>PKP</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $customer)
                            <tr>
                                <td>{{ $customer->customerID }}</td>
                                <td>{{ $customer->customerIDs }}</td>
                                <td>{{ $customer->code }}</td>
                                <td>{{ $customer->customerName }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->telepon }}</td>
                                <td>{{ $customer->teleponHP }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->area }}</td>
                                <td>{{ $customer->status }}</td>
                                <td>{{ $customer->statusPKP }}</td>
                                <td>
                                    <a href="{{route('customer.edit', $customer->customerID)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('customer.destroy', $customer->customerID) }}" method="Post">
                                        @csrf
                                        <button type="submit" class="badge bg-danger"> 
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus Data
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Menampilkan {{$data->count()}} dari {{$total}} data</p>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>
                {!! $data->links() !!}
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>