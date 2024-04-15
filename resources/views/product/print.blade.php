<!DOCTYPE html>
<html lang="id">
<head>
  <title>Data Product</title>
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
        <h2>Data Product</h2>
        <thead>
            <tr>
                <th>Code</th>
                <th>Photo</th>
                <th>Part No. </th>
                <th>Item</th>
                <th>Vehicle Type</th>
                <th>Category</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataProduct as $product)
                <tr>
                    <td>{{ $product->code }}</td>
                    <td>
                            @if($foto->count() === 0)
                                <img src="{{asset('style/dist/img/avatar5.png')}}" alt="gambarUser" width="50px" height="50px">
                            @else
                                @foreach($product->setProductIDForFotoProduct as $gambar)
                                    <img width="50px" src="{{ asset('fotoProduct/'. $gambar->namaFile) }}" alt="Gambar Jenis">
                                @endforeach
                            @endif
                    </td>
                    <td>{{ $product->partNo }}</td>
                    <td>{{ $product->productName }}</td>
                    <td>{{ $product->getVehicleTypeFromVehicleType->type }}</td>
                    <td>{{ $product->getProductCategoryFromVehicleType->category }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a href="{{route('product.edit', $product->productID)}}" class="btn btn-success">
                            <i class="fa-solid fa-file-pen"></i>
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action = "{{ route('product.destroy', $product->productID) }}" method="Post">
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
    </main>
</body>
</html>