<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Telepon</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($transaksis as $transaksi)

            <tr>
                <td>{{$no++}}</td>
                <td>{{$transaksi->address}}</td>
                <td>{{$transaksi->status}}</td>
                <td>{{$transaksi->telp}}</td>
                <td>{{$transaksi->total}}</td>
                <td><a href="{{Route('detail-transaksi',['transactions' => encrypt($transaksi->id) ])}}">Detail</a></td>
            </tr>
                            
            @endforeach
        </tbody>
    </table>
</body>
</html>