<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Inventori</title>
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
                <h1>Data dari {{$dataAwal}} hingga {{$dataAkhir}}</h1>
                <a class="btn btn-success" href="#"> 
                    <i class="fa-solid fa-file-excel"></i>
                        Excel
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="#" method="post">
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
                            <th>No</th>
                            <th>Date</th>
                            <th>Item Name</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Warehouse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item=>$productData)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $productData['product']->created_at }}</td>
                                <td>{{ $productData['product']->productName }}</td>
                                <td>{{ $productData['masuk'] }}</td>
                                <td>{{ $productData['keluar'] }}</td>
                                <td>Gudang Utama</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Menampilkan {{ $data->count() }} dari {{ $total }} data</p>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="#" method="POST"> 
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
