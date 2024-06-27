<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Adjusment Produk</title>
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
                <h1>Product Adjusment Dashboard</h1>
                
            </header>
            <main>
                <br>
                <h6>Data</h6>
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