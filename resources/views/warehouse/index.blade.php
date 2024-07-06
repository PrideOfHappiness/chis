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
                <div class="table-controls">
                    <form action="{{route('cariWarehouseType')}}" method="post">
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
                            <th>Code</th>
                            <th>Warehouse</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>Email Group</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($data as $item=>$warehouse)
                            <tr>
                                <td>{{ $item + 1 }}</td>
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
                <a class="btn btn-primary" href="{{route('warehouse.export')}}" method="POST"> 
                    <i class="fa-solid fa-file-export"></i>
                    Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/warehouse/print"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>

            </main>
        </div>
    </div>
</body>
@include('template/footer')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchValue = document.getElementById('search');
    const tableBody = document.getElementById('tableBody');

    searchValue.addEventListener('input', function() {
        const searchValueSendToSql = searchValue.value;
        fetchSearchResults(searchValueSendToSql);
    });

    function fetchSearchResults(searchQuery) {
        const searchByData = document.getElementById('searchByData').value;

        fetch('/admin/forwarder/cari', {
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
                const newTableHTML = data.map((warehouse, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${warehouse.warehouseIDs}</td>
                        <td>${warehouse.warehouseName}</td>
                        <td>${warehouse.alamat}</td>
                        <td>${warehouse.contact}</td>
                        <td>${warehouse.telepon}</td>
                        <td>${warehouse.teleponHP}</td>
                        <td>${warehouse.email}</td>
                        <td>${warehouse.status}</td>
                        <td>
                            <a href="/admin/forwarder/${warehouse.warehouseID}/edit" class="btn btn-success">
                                <i class="fa-solid fa-file-pen"></i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="/admin/forwarder/${warehouse.warehouseID}" method="post">
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