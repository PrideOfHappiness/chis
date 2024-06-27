<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Forwarder</title>
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
                <h1>Forwarder Dashboard</h1>
                <a class="btn btn-success" href="{{ route('forwarder.create') }}"> 
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
                    </form>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Forwarder</th>
                            <th>City</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $forwarder)
                            <tr>
                                <td>{{ $forwarder->forwaderID }}</td>
                                <td>{{ $forwarder->forwaderName }}</td>
                                <td>{{ $forwarder->city }}</td>
                                <td>{{ $forwarder->contact }}</td>
                                <td>{{ $forwarder->telepon }}</td>
                                <td>{{ $forwarder->teleponHP }}</td>
                                <td>{{ $forwarder->email }}</td>
                                <td>{{ $forwarder->status }}</td>
                                <td>
                                    <a href="{{route('forwarder.edit', $forwarder->forwaderID)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('forwarder.destroy', $forwarder->forwaderID) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
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
                const newTableHTML = data.map((forwarder, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${forwarder.forwaderName}</td>
                        <td>${forwarder.city}</td>
                        <td>${forwarder.contact}</td>
                        <td>${forwarder.telepon}</td>
                        <td>${forwarder.teleponHP}</td>
                        <td>${forwarder.email}</td>
                        <td>${forwarder.status}</td>
                        <td>
                            <a href="/admin/forwarder/${forwarder.customerID}/edit" class="btn btn-success">
                                <i class="fa-solid fa-file-pen"></i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="/admin/forwarder/${forwarder.customerID}" method="post">
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