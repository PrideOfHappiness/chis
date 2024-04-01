<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data User</title>
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
                <h1>User Dashboard</h1>
                <a class="btn btn-success" href="{{ route('user.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                    <form action="{{route('cari')}}" method="post">
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
                            <th>User ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Branch</th>
                            <th>Department</th>
                            <th>Access Group</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $user)
                            <tr>
                                <td>{{ $user->userIDNo }}</td>
                                <td>
                                    @if($foto->count() === 0)
                                        <img src="{{asset('style/dist/img/avatar5.png')}}" alt="gambarUser" width="50px" height="50px">
                                    @else
                                        @foreach($user->setUserIDForFotoUsers as $gambar)
                                            <img width="50px" src="{{ asset('fotoUsers/'. $gambar->namaFile) }}" alt="Gambar Jenis">
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->userName }}</td>
                                <td>{{ $user->branch }}</td>
                                <td>{{ $user->department }}</td>
                                <td>{{ $user->getUserAccessFromUserAccess->user_access }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="/admin/user/copy/{{$user->userIDNo}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Pilih Data
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>