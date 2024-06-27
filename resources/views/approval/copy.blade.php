<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data User Approval</title>
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
                <h1>User Approval Dashboard</h1>
                <a class="btn btn-success" href="{{ route('userApproval.create') }}"> 
                    <i class="fa-solid fa-plus"></i>
                        Tambah Data
                </a>
            </header>
            <main>
                <br>
                <h6>Data</h6>
                <div class="table-controls">
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Approval</th>
                            <th>Sequence</th>
                            <th>Responsible As</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $productCategory)
                            <tr>
                                <td>{{ $productCategory->approvalID }}</td>
                                <td>{{ $productCategory->approval }}</td>
                                <td>{{ $productCategory->sequence }}</td>
                                <td>{{ $productCategory->jabatan }}</td>
                                <td>{{ $productCategory->getUserIDFromUsers->nama }}</td>
                                <td>{{ $productCategory->status }}</td>
                                <td>
                                    <a href="/admin/userApproval/copy/{{$productCategory->approvalID}}" class="btn btn-success">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Pilih Data
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <p>Menampilkan {{$data->count()}} dari {{$total}} data</p> --}}
                <a class="btn btn-primary" href="#"> 
                    <i class="fa-solid fa-copy"></i>
                        Copy
                </a>
                <a class="btn btn-primary" href="{{route('approval.export')}}"> 
                    <i class="fa-solid fa-file-export"></i>
                        Export to CSV
                </a>
                <a class="btn btn-primary" href="/admin/userApproval/print"> 
                    <i class="fa-solid fa-print"></i>
                        Print
                </a>
                {{-- {!! $data->links() !!} --}}
            </main>
        </div>
    </div>
</body>
@include('template/footer')
</html>