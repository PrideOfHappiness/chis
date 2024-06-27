<!DOCTYPE html>
<html lang="en">

<head>
    @include('template/header')
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
                <h1>Product Dashboard</h1>
                <a class="btn btn-success" href="{{ route('product.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Data
                </a>
                <a class="btn btn-success" href="/admin/brand">
                    <i class="fa-solid fa-list"></i>
                    List Brand
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariProductType')}}" method="post" id="searchForm">
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
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <div id="results"></div>
                    </form>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Code</th>
                            <th>Part No. </th>
                            <th>Item</th>
                            <th>Vehicle Type</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($data as $product)
                            <tr>
                                <td>
                                    @if($product->fotoProducts->count() === 0)
                                        <img src="{{asset('style/dist/img/avatar5.png')}}" alt="gambarUser" width="50px" height="50px">
                                    @else
                                        @foreach($product->fotoProducts as $gambar)
                                            <img width="50px" src="{{ asset('fotoProduct/'. $gambar->namaFile) }}" alt="Gambar Jenis">
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->part_no }}</td>
                                <td>{{ $product->productName }}</td>
                                <td>{{ $product->getVehicleTypeFromVehicleType->getMerkFromMerkKendaran->namaKendaraan }} {{$product->getVehicleTypeFromVehicleType->vehicle_type}}</td>
                                <td>{{ $product->getProductCategoryFromVehicleType->getProductCategoryList->product_category }}</td>
                                <td>{{ $product->getSubCategoryFromSubCategory->sub_category }}</td>
                                <td>{{ $product->status }}</td>
                                <td>
                                    <a href="/admin/product/copy/{{$product->productID}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Pilih Data
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const searchByDataInput = document.getElementById('searchByData');
    const tableBody = document.getElementById('tableBody');
    const paginationInfo = document.getElementById('paginationInfo');
    const paginationLinks = document.getElementById('paginationLinks');

    let currentPage = 1;

    function fetchInitialData(page = 1) {
        fetch('{{ route('cariProductType') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                search: '',
                searchByData: searchByDataInput.value,
                page: page
            })
        })
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => {
            console.error('Error fetching initial data:', error);
        });
    }

    function fetchSearchResults(searchQuery, searchByData, page = 1) {
        fetch('{{ route('cariProductType') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                search: searchQuery,
                searchByData: searchByData,
                page: page
            })
        })
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
    }

    function updateTable(data) {
        tableBody.innerHTML = '';

        if (data.data.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="10" class="text-center">Data tidak ditemukan</td></tr>';
        } else {
            data.data.forEach(product => {
                const newRow = `
                    <tr>
                        <td>${product.fotoProducts.length === 0 ? '<img src="{{ asset('style/dist/img/avatar5.png') }}" alt="gambarUser" width="50px" height="50px">' : product.fotoProducts.map(gambar => `<img width="50px" src="{{ asset('fotoProduct/') }}/${gambar.namaFile}" alt="Gambar Jenis">`).join('')}</td>
                        <td>${product.code}</td>
                        <td>${product.part_no}</td>
                        <td>${product.productName}</td>
                        <td>${product.getVehicleTypeFromVehicleType ? product.getVehicleTypeFromVehicleType.vehicle_type : ''}</td>
                        <td>${product.getProductCategoryFromVehicleType ? product.getProductCategoryFromVehicleType.productCategoryList.product_category : ''}</td>
                        <td>${product.getSubCategoryFromSubCategory ? product.getSubCategoryFromSubCategory.sub_category : ''}</td>
                        <td>${product.status}</td>
                        <td>
                            <a href="/admin/product/${product.productID}/edit" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="/admin/product/${product.productID}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += newRow;
            });
            paginationLinks.innerHTML = '';
            
            for (let i = 1; i <= data.last_page; i++) {
                paginationLinks.innerHTML += `<a href="#" class="page-link" data-page="${i}">${i}</a> `;
            }

            document.querySelectorAll('.page-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentPage = parseInt(this.getAttribute('data-page'));
                    fetchSearchResults(searchInput.value, searchByDataInput.value, currentPage);
                });
            });
        }
    }

    searchInput.addEventListener('input', () => {
        currentPage = 1;
        fetchSearchResults(searchInput.value, searchByDataInput.value, currentPage);
    });

    searchByDataInput.addEventListener('change', () => {
        currentPage = 1;
        fetchSearchResults(searchInput.value, searchByDataInput.value, currentPage);
    });

    // Load initial data when page loads
    fetchInitialData(currentPage);
</script>
@include('template/footer')
</html>