<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Kategori Produk</title>
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
                <form action="{{ route('productCategory.update', $data->productCategoryID)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="category">Category</label>
                            <select class="form-control custom-select" name="category" id="category">
                                <option value="{{$data->productCategoryList}}">{{$data->getProductCategoryList->product_category}}</option>
                                @foreach($data2 as $dt)
                                    <option value="{{$dt->productCategoryListID}}">{{$dt->product_category}}</option>
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Sub Category</label>
                            <select class="form-control custom-select" name="sub_category" id="sub_category">
                                <option value="{{$data->subCategoryList}}">{{$data->getSubCategoryList->sub_category}}</option>
                                @foreach($data3 as $dt)
                                    <option value="{{$dt->subCategoryListID}}">{{$dt->sub_category}}</option>
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Product List</label>
                            <input type="text" class="form-control" name="product_list" id="product_list" value="{{$data->productList}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Remarks</label>
                            <input type="text" class="form-control" name="remarks" id="remarks" value="{{$data->remarks}}" required>
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