<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Produk</title>
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
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariProductType')}}" method="post">
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
                            <th>Code</th>
                            <th>Photo</th>
                            <th>Part No. </th>
                            <th>Item</th>
                            <th>Vehicle Type</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>
                                        @if($foto->count() === 0)
                                            <img src="{{asset('style/dist/img/avatar5.png')}}" alt="gambarUser" width="50px" height="50px">
                                        @else
                                            @foreach($product->setProductIDForFotoProduct as $gambar)
                                                <img width="50px" src="{{ asset('fotoProduct/'. $gambar->namaFile) }}" alt="Gambar Jenis">
                                            @endforeach
                                        @endif
                                </td>
                                <td>{{ $product->part_no }}</td>
                                <td>{{ $product->productName }}</td>
                                <td>{{ $product->getVehicleTypeFromVehicleType->type }}</td>
                                <td>{{ $product->getProductCategoryFromVehicleType->category }}</td>
                                <td>{{ $product->status }}</td>
                                <td>
                                    <a href="{{route('product.edit', $product->productID)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('product.destroy', $product->productID) }}" method="Post">
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
                <a class="btn btn-primary" href="{{route('product.export')}}"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/product/print"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>
                <a class="btn btn-info" href="{{route('importProduct')}}"> 
                    <i class="fa-solid fa-file-import"></i>
                        Import Data
                </a>
                {!! $data->links() !!}
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>