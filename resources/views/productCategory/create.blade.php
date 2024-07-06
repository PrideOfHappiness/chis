<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Kategori Produk</title>
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
                <h4>Tambah Data Kategori Produk</h4>
                <form action="{{ route('productCategory.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="category">Category</label>
                            <select class="form-control custom-select" name="category" id="category" required>
                                <option value="--">Silahkan pilih data!</option>
                                @foreach($data as $dt)
                                    <option value="{{$dt->productCategoryListID}}">{{$dt->product_category}}</option>
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sub_category">Sub Category</label>
                            <select class="form-control custom-select" name="sub_category" id="sub_category" required>
                                <option value="--">Silahkan pilih data!</option>
                                @foreach($data2 as $dt)
                                    <option value="{{$dt->subCategoryListID}}">{{$dt->sub_category}}</option>
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Product List</label>
                            <input type="text" class="form-control" name="product_list" id="product_list" placeholder="List Product" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Remarks</label>
                            <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks" required>
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