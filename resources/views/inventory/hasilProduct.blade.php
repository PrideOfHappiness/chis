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
                                <td>{{ $product->getVehicleTypeFromVehicleType->kendaraan }}-{{ $product->getVehicleTypeFromVehicleType->type }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->satuan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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