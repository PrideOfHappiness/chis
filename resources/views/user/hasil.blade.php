<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Hasil User</title>
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
                <h1>User Dashboard Searches</h1>
                <a class="btn btn-success" href="{{ route('user.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Branch</th>
                            <th>Department</th>
                            <th>Access Group</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                                    <a href="{{route('user.edit', $user->userIDNo)}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action = "{{ route('user.destroy', $user->userIDNo) }}" method="Post">
                                        @csrf
                                        <button type="submit" class="badge bg-danger"> 
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus Data
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Menampilkan {{$data->count()}} dari {{$total}} data</p>
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="/admin/user/export"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/user/print"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>
                {!! $data->links() !!}
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>