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
                <h1>Product Adjustments Dashboard</h1>
                <a class="btn btn-info" href="{{route('adjustmentOut.create')}}"> 
                    <i class="fa-solid fa-minus"></i>
                        Adjustments OUT
                </a>
                <a class="btn btn-primary" href="{{route('adjustmentIn.create')}}"> 
                    <i class="fa-solid fa-plus"></i>
                        Adjustments IN
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cariAdjustment')}}" method="post">
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
                            <th>No.</th>
                            <th>Product </th>
                            <th>IN/OUT</th>
                            <th>Date</th>
                            <th>Qty</th>
                            <th>Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $product)
                            <tr>
                                <td>{{ $product->inventoryID }}</td>
                                <td>{{ $product->getProductIDs->partNo }} {{$product->getProductIDs->productName}}</td>
                                <td>{{ $product->adjustment_code }}</td>
                                <td>{{ $product->adjustment_created }}</td>
                                <td>{{ $product->productQuantity_adjustments }}</td>
                                <td>{{ $product->getUserIDs->nama }}</td>
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