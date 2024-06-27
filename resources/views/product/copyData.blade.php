<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Produk</title>
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
                <h4>Ubah Data Produk</h4>
                <form action="{{ route('product.prosesData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="code">Product Code</label>
                            <input type="text" class="form-control" name="code" id="code" value="{{ $data->code }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="partNumber">Part Number</label>
                            <textarea type="text" class="form-control" name="partnumber" id="partnumber">{{$data->part_no}}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productname">Product Name</label>
                            <input type="text" class="form-control" name="productname" id="productname" value="{{ $data->productName }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="vehicleType">Vehicle Type</label>
                            <select class="form-control custom-select" name="vehicleType" id="vehicleType">
                                <option value="{{ $data->getVehicleTypeFromVehicleType->vehicleTypeID }}">{{$data->getVehicleTypeFromVehicleType->getMerkFromMerkKendaran->namaKendaraan}} {{$data->getVehicleTypeFromVehicleType->vehicle_type}}</option>
                                @foreach($vehicleType as $product)
                                    <option value="{{$product->vehicleTypeID}}">{{$product->getMerkFromMerkKendaran->namaKendaraan}}-{{$product->vehicle_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="brand">Brand</label>
                            <select class="form-control custom-select" name="brand" id="brand">
                                <option value="{{$data->getBrand->brandID}}">{{$data->getBrand->brand}}</option>
                                @foreach($brand as $product)
                                    <option value="{{$product->brandID}}">{{$product->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productCategory">Product Category</label>
                            <select class="form-control custom-select" name="productCategory" id="productCategory">
                                <option value="{{ $data->getProductCategoryFromVehicleType->productCategoryID }}">{{$data->getProductCategoryFromVehicleType->product_category}}</option>
                                @foreach($productCategory as $product)
                                    <option value="{{$product->productCategoryID}}">{{$product->getProductCategoryList->product_category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="subcategory">Sub Category</label>
                            <select class="form-control custom-select" name="subcategory" id="subcategory">
                                <option value="{{ $data->getSubCategoryFromSubCategory->subCategoryListID }}">{{$data->getSubCategoryFromSubCategory->sub_category}}</option>
                                @foreach($subCategory as $product)
                                    <option value="{{$product->subCategoryListID}}">{{$product->sub_category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hargabeli">Harga Beli (Rp.)</label>
                            <input type="number" class="form-control" name="hargabeli" id="hargabeli" value="{{ $data->harga_beli }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hpp">HPP (Rp.)</label>
                            <input type="number" class="form-control" name="hpp" id="hpp" value="{{ $data->hpp }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hargaJual">Harga Jual (Rp.)</label>
                            <input type="number" class="form-control" name="hargaJual" id="hargaJual" value="{{ $data->harga_jual }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="min_stock">Minimum Stock</label>
                            <input type="number" class="form-control" name="min_stock" id="min_stock" value="{{ $data->min_stock }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="satuan">Satuan</label>
                            <select class="form-control" name="satuan" id="satuan">
                                <option value="{{$data->satuan}}">{{ $data->satuan }}</option>
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
                        <div class="form-group col-md-4">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="{{ $data->stock }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="{{$data->status}}">{{$data->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Not Active</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="stock">Notes</label>
                            <textarea class="form-control" name="notes" id="notes" >{{$data->notes}}</textarea>
                        </div>
                        @if($foto->count() > 0)
                        <div class="form-group col-md-4">
                            <label for="gambar">Foto Awal</label>
                                @foreach($foto as $gambar)
                                    <img width="150px" src="{{ asset('fotoProduct/'. $gambar->namaFile) }}" alt="Gambar Plat Nomor">
                                @endforeach
                        </div>
                        @else
                            <div class="form-group col-md-4">
                                <label for="gambar">Foto Awal</label>
                                <p><img width="150px" src="{{ asset('style/dist/img/user1-128x128.jpg') }}" alt="Gambar Plat Nomor"></p>
                            </div>
                        @endif
                        <div class="form-group col-md-4">
                            <label for="fileFoto">File Produk</label>
                            <input type="file" class="form-control" name="fileFoto" id="fileFoto">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>