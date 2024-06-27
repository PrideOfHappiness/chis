<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <h1>Brand Dashboard</h1>
                <a class="btn btn-success" href="{{ route('brand.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Brand
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariProductCategory')}}" id="searchForm" method="post">
                        @csrf
                        <label for="searchByData" id="searchByData">Cari berdasarkan: </label>
                        <select name="searchByData" id="searchByData">
                                <option value=10>10</option>
                                <option value=25>25</option>
                                <option value=50>50</option>
                                <option value=100>100</option>
                        </select>
                        <label for="search">Cari berdasarkan: </label>
                        <input type="text" name="search" id="search" placeholder="Cari dengan nama...">
                    </form>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($data as $productCategory)
                            <tr>
                                <td>{{ $productCategory->brandID }}</td>
                                <td>{{ $productCategory->brand }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Menampilkan {{$data->count()}} dari {{$total}} data</p>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="{{route('productCategory.export')}}"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/productCategory/print"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>
                <a class="btn btn-info" href="{{route('imporProductCategory')}}"> 
                    <i class="fa-solid fa-file-import"></i>
                        Import Data
                </a>
                {!! $data->links() !!}
            </main>
        </div>
    </div>
</body>
@include('template/footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

        fetch('/admin/brand/cari', {
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
                const newTableHTML = data.map((brand, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${brand.brand}</td>
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