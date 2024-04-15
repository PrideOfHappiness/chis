<!DOCTYPE html>
<html lang="id">
<head>
  <title>Data Supplier</title>
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
        <h2>Data Supplier</h2>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Supplier Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Phone</th>
                    <th>HP</th>
                    <th>Email</th>       
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($PDFdata as $supplier)
                    <tr>
                        <td>{{ $supplier->supplierID }}</td>
                        <td>{{ $supplier->supplierIDs }}</td>
                        <td>{{ $supplier->code }}</td>
                        <td>{{ $supplier->supplierName }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->contact }}</td>
                        <td>{{ $supplier->telepon }}</td>
                        <td>{{ $supplier->teleponHP }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>