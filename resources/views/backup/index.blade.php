<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Backup Database</title>
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
                <h1>Backup Dashboard</h1>
                <a class="btn btn-warning" href="/admin/home"> 
                    <i class="fa-solid fa-rotate-left"></i>
                        Back
                </a>
            </header>
            <main>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fileFoto">File Database</label>
                        <input type="file" class="form-control" name="dbupload" id="dbupload" required>
                    </div>
                    <button type="submit" class="btn btn-info">Unggah database</button>
                </form>
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>