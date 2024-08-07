<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Tipe Kendaraan</title>
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
                <h1>Vehicle Type Dashboard</h1>
                <a class="btn btn-success" href="{{ route('vehicleType.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariVehicleType')}}" method="post">
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
                    </form>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Brand Kendaraan</th>
                            <th>Nama Kendaraan</th>
                            <th>Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($data as $vehicleType)
                            <tr>
                                <td>{{ $vehicleType->vehicleTypeID }}</td>
                                <td>{{ $vehicleType->getMerkFromMerkKendaran->inisial }}</td>
                                <td>{{ $vehicleType->getMerkFromMerkKendaran->namaKendaraan }}</td>
                                <td>{{ $vehicleType->vehicle_type }}</td>
                                <td>
                                    <a href="/admin/vehicleType/copy/{{$vehicleType->vehicleTypeID}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Pilih Data
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="{{route('vehicleType.export')}}"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/vehicleType/print"> 
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

        fetch('/admin/vehicleType/cari', {
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
                const newTableHTML = data.map((vehicleType, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${vehicleType.kendaraan}</td>
                        <td>${vehicleType.type}</td>
                        <td>
                            <a href="/admin/vehicleType/${vehicleType.vehicleTypeID}/edit" class="btn btn-success">
                                <i class="fa-solid fa-file-pen"></i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="/admin/vehicleType/${vehicleType.vehicleTypeID}" method="post">
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