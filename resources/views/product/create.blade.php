<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Produk</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif 
                <h4>Tambah Data Produk</h4>
                <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="code">Product Code</label>
                        <input type="string" class="form-control" name="code" id="code" placeholder="Product Code" required>
                    </div>
                    <div class="mb-3">
                        <label for="partNumber">Part Number</label>
                        <input type="string" class="form-control" name="partNumber" id="partNumber" placeholder="Part Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="productname">Product Name</label>
                        <input type="text" class="form-control" name="productname" id="productname" placeholder="Department" required>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleType">Vehicle Type</label>
                        <select class="form-control" name="productCategory" id="productCategory">
                            <option value="">Silahkan pilih data terlebih dahulu!</option>
                            @foreach($data as $product)
                                <option value="{{$product->vehicleTypeID}}">{{$product->kendaraan}}-{{$product->kendaraan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productCategory">Vehicle Type</label>
                        <select class="form-control" name="vehicleType" id="vehicleType">
                            <option value="">Silahkan pilih data terlebih dahulu!</option>
                            @foreach($data as $product)
                                <option value="{{$product->productCategoryID}}">{{$product->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vv">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Not Active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fileFoto">File Produk</label>
                        <input type="file" class="form-control" name="fileFoto" id="fileFoto" placeholder="Nama Ruangan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>