<!DOCTYPE html>
<html lang="id">
<head>
  <title>Data User</title>
  <style>
    body {
        font-family: sans-serif;
        font-size: 16px;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #f6f6f6;
        padding: 20px;
        text-align: center;
        font-size: 12px;
    }

    header img {
        width: 25px;
        height: 25px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 0;
    }

    h2 {
        text-align: center;
    }

    .p-Periode {
        text-align: center;
    }

    p {
        margin-bottom: 10px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 5px;
    }

    th {
        text-align: center;
    }

    .logo {
        width:75px;
        height: 75px;
    }

    .right-align{
        text-align: right;
    }
  </style>
</head>
<body> 
    <header>
    </header>
    <main>
        <h2>Data User</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Approval</th>
                    <th>Sequence</th>
                    <th>Responsible As</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataProduct as $productCategory)
                    <tr>
                        <td>{{ $productCategory->productCategoryID }}</td>
                        <td>{{ $productCategory->approval }}</td>
                        <td>{{ $productCategory->sequence }}</td>
                        <td>{{ $productCategory->jabatan }}</td>
                        <td>{{ $productCategory->getUserIDFromUsers->nama }}</td>
                        <td>{{ $productCategory->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>