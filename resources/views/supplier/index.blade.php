<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Supplier</title>
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
                <h1>Supplier Dashboard</h1>
                <a class="btn btn-success" href="{{ route('supplier.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
                <a class="btn btn-success" href="{{route('supplier.excel')}}"> 
                    <i class="fa-solid fa-file-excel"></i>
                        Excel
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariSupplierType')}}" method="post">
                        @csrf
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
                            <th>Supplier Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>HP</th>
                            <th>Email</th>       
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $supplier)
                            <tr>
                                <td>{{ $supplier->supplierID }}</td>
                                <td>{{ $supplier->supplierIDs }}</td>
                                <td>{{ $supplier->code }}</td>
                                <td>{{ $supplier->supplierName }}</td>
                                <td>{{ $supplier->alamat }}</td>
                                <td>{{ $supplier->contact }}</td>
                                <td>{{ $supplier->telepon }}</td>
                                <td>{{ $supplier->teleponHP }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->status }}</td>
                                <td>
                                    <a href="{{route('supplier.edit', $supplier->supplierID)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('supplier.destroy', $supplier->supplierID) }}" method="Post">
                                        @csrf
                                        <button type="submit" class="badge bg-danger"> 
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus Data
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tbody id="tableBody">
                        @foreach($data as $supplier)
                            <tr>
                                <td>{{ $supplier->supplierID }}</td>
                                <td>{{ $supplier->supplierIDs }}</td>
                                <td>{{ $supplier->code }}</td>
                                <td>{{ $supplier->supplierName }}</td>
                                <td>{{ $supplier->alamat }}</td>
                                <td>{{ $supplier->contact }}</td>
                                <td>{{ $supplier->telepon }}</td>
                                <td>{{ $supplier->teleponHP }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->status }}</td>
                                <td>
                                    <a href="{{route('supplier.edit', $supplier->supplierID)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('supplier.destroy', $supplier->supplierID) }}" method="Post">
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
                <a class="btn btn-primary" href="{{route('supplier.export')}}"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/supplier/print"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>
                {!! $data->links() !!}
            </main>
        </div>
    </div>
</body>
@include('template/footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchValue = document.getElementById('search');
        const tableBody = document.getElementById('tableBody');

        searchValue.addEventListener('input', function() {
            const searchValueSendToSql = searchValue.value;
            fetchSearchResults(searchValueSendToSql);
        });

        function fetchSearchResults(searchTerms) {
            const searchByData = document.getElementById('searchByData').value;

            fetch('/admin/supplier/cari', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    search: searchQuery,
                    searchByData: searchByData
                })
            })
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = '';

                if (data.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="15" class="text-center">Data tidak ditemukan</td></tr>';
                } else {
                    const newTableHTML = data.map((supplier, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${supplier.supplierIDs}</td>
                        <td>${supplier.code}</td>
                        <td>${supplier.supplierName}</td>
                        <td>${supplier.alamat}</td>
                        <td>${supplier.contact}</td>
                        <td>${supplier.telepon}</td>
                        <td>${supplier.teleponHP}</td>
                        <td>${supplier.email}</td>
                        <td>${supplier.status}</td>
                        <td>
                            <a href="/admin/supplier/${supplier.supplierID}/edit" class="btn btn-success">
                                <i class="fa-solid fa-file-pen"></i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="/admin/supplier/${supplier.supplierID}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger"> 
                                    <i class="fa-solid fa-trash"></i>
                                    Hapus Data
                                </button>
                            </form>
                        </td>
                    </tr>
                    `).join('');
                    tableBody.innerHTML = newTableHTML;
                }
            })
            .catch(error => {
                console.error('Error fetching search results:', error); 
            });
        }
    });
</script>
</html>