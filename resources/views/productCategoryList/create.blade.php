<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Sub Kategori</title>
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
                <h4>Tambah Data Sub Kategori</h4>
                <form action="{{ route('productCategoryList.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="form-group col-md-4">
                            <label for="prodductCategoryList">Product Category</label>
                            <input type="text" class="form-control" name="prodductCategoryList" id="prodductCategoryList" placeholder="Nama Produk Kategori" required>
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