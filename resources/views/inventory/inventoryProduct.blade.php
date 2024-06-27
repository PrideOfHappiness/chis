<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Inventori Produk</title>
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
                <h1>Product Inventory Dashboard</h1>                
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariProductInventory')}}" method="post">
                        @csrf
                        <label for="searchByData" id="searchByData">Jumlah Data Yang Ditampilkan : </label>
                        <select name="searchByData" id="searchByData">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                        </select>
                        <label for="FilterByData" id="FilterByData">Kategori Pencarian Data : </label>
                        <select name="FilterByData" id="FilterByData">
                                <option value="stocknbr">Stock Nbr.</option>
                                <option value="partnbr">Part Nbr.</option>
                                <option value="prdctname">Product Name</option>
                                <option value="vehicletp">Vehicle Type</option>
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
                            <th>Stock Number</th>
                            <th>Part No. </th>
                            <th>Item Name</th>
                            <th>Vehicle Type</th>
                            <th>Qty</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->part_no }}</td>
                                <td>{{ $product->productName }}</td>
                                <td>{{ $product->getVehicleTypeFromVehicleType->kendaraan }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->satuan }}</td>
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
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>