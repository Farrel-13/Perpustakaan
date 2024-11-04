<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Perpustakaan</title>
    <style>
        body {
            background-color: #e8f4ea;
            padding: 15px;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #2c5530;
            text-align: center;
            margin-bottom: 25px;
            padding: 10px;
            background-color: #b8d8ba;
            border-radius: 5px;
        }

        .button-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            background-color: #5b8a63;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin: 0 10px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #426b48;
        }

        .filter-box {
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #b8d8ba;
        }

        select {
            width: 200px;
            padding: 5px;
            border: 1px solid #b8d8ba;
        }

        .data-table {
            background-color: white;
            padding: 15px;
            border: 1px solid #b8d8ba;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #b8d8ba;
            color: #2c5530;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f7f3;
        }

        tr:hover {
            background-color: #e0eae1;
        }

        @media (max-width: 600px) {
            .button-container {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <h1>PERPUSTAKAAN</h1>

    <div class="button-container">
        <a class="btn" href="{{ route('bukus.index') }}">Data Buku</a>
        <a class="btn" href="{{ route('kategoris.index') }}">Data Kategori</a>
    </div>

    <div class="filter-box">
        <form action="{{ route('home.filter') }}" method="GET">
            <select name="kategori" onchange="this.form.submit()">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->nama_kategori }}"
                    {{ request('kategori') == $kategori->nama_kategori ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="data-table">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Buku</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bukus as $key => $buku)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$buku->nama_buku}}</td>
                    <td>{{$buku->nama_kategori}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>