<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Salesman</title>
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
                <h1>Salesman Dashboard</h1>
                <a class="btn btn-success" href="{{ route('salesman.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariSalesmanType')}}" method="post">
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
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="tableBody">
                        @foreach($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->getUserIDFromUsers2->nama }}</td>
                                <td>{{ $user->alias }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="{{route('salesman.edit', $user->id)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('salesman.destroy', $user->id) }}" method="Post">
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
                <a class="btn btn-primary" href="{{route('salesman.export')}}"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/salesman/print"> 
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
    document.addEventListener('DOMContentLoaded', function(){
        const searchValue = document.getElementById('search');
        const tableBody = document.getElementById('tableBody');

        searchValue.addEventListener('input', function() {
            const searchValueSendToSql = searchValue.value;
            fetchSearchResults(searchValueSendToSql);
        });

        function fetchSearchResults(searchQuery) {
            const searchByData = document.getElementById('searchByData').value;
            fetch('/admin/customer/cari', {
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
                const newTableHTML = data.map((salesman, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${salesman.get_user_i_d_from_users2.nama}</td>
                        <td>${salesman.alias}</td>
                        <td>${salesman.status}</td>
                        <td>
                            <a href="/admin/salesman/${salesman.id}/edit" class="btn btn-success">
                                <i class="fa-solid fa-file-pen"></i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="/admin/salesman/${salesman.id}" method="post">
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