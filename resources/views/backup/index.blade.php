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
            </header>
            <main>
                <a class="btn btn-success" href="{{ route('backup') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Backup Database
                </a>
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>