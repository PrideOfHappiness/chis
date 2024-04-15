<!DOCTYPE html>
<html lang="id">
<head>
  <title>Data Customers</title>
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
        <h2>Data Customers</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Customer</th>
                    <th>Delivery Address</th>
                    <th>Contact</th>
                    <th>Phone</th>
                    <th>HP</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>PKP</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataProduct as $customer)
                    <tr>
                        <td>{{ $customer->customerID }}</td>
                        <td>{{ $customer->customerIDs }}</td>
                        <td>{{ $customer->code }}</td>
                        <td>{{ $customer->customerName }}</td>
                        <td>{{ $customer->deliveryAddress }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ $customer->telepon }}</td>
                        <td>{{ $customer->teleponHP }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->kota }}</td>
                        <td>{{ $customer->area }}</td>
                        <td>{{ $customer->status }}</td>
                        <td>{{ $customer->statusPKP }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>