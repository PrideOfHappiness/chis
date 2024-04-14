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
                        <input type="text" class="form-control" name="code" id="code" placeholder="Product Code" required>
                    </div>
                    <div class="mb-3">
                        <label for="partNumber">Part Number</label>
                        <input type="text" class="form-control" name="partNumber" id="partNumber" placeholder="Part Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="productname">Product Name</label>
                        <input type="text" class="form-control" name="productname" id="productname" placeholder="Department" required>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleType">Vehicle Type</label>
                        <select class="form-control" name="vehicleType" id="vehicleType">
                            <option value="">Silahkan pilih data terlebih dahulu!</option>
                            @foreach($vehicleType as $product)
                                <option value="{{$product->vehicleTypeID}}">{{$product->kendaraan}}-{{$product->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productCategory">Product Category</label>
                        <select class="form-control" name="productCategory" id="productCategory">
                            <option value="">Silahkan pilih data terlebih dahulu!</option>
                            @foreach($data as $product)
                                <option value="{{$product->productCategoryID}}">{{$product->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hargabeli">Harga Beli (Rp.)</label>
                        <input type="number" class="form-control" name="hargabeli" id="hargabeli" placeholder="Department" required>
                    </div>
                    <div class="mb-3">
                        <label for="hpp">HPP (Rp.)</label>
                        <input type="number" class="form-control" name="hpp" id="hpp" placeholder="Stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargaJual">Harga Jual (Rp.)</label>
                        <input type="number" class="form-control" name="hargaJual" id="hargaJual" placeholder="Department" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_stock">Minimum Stock</label>
                        <input type="number" class="form-control" name="min_stock" id="min_stock" placeholder="Minimum Stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="satuan">Satuan</label>
                        <select class="form-control" name="satuan" id="satuan">
                            <option value="">Silahkan pilih data terlebih dahulu!</option>
                            <option value="PCS">PCS</option>
                            <option value="DOZ">Dozen</option>
                            <option value="BOX">Box</option>
                            <option value="DUS">DUS</option>
                            <option value="KG">KG</option>
                            <option value="KIT">KIT</option>
                            <option value="LSN">Lusinan</option>
                            <option value="MTR">MTR</option>
                            <option value="PC">PC (Pieces)</option>
                            <option value="PSC">PSC</option>
                            <option value="ROLL">ROLL</option>
                            <option value="SET">SET</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Not Active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" required></textarea>
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