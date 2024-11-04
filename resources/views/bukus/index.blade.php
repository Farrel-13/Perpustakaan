<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Data Buku</title>
    <style>
        body {
            background-color: #f0f5ff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .nav {
            background-color: #4a69bd;
            padding: 10px;
            border-radius: 5px;
        }

        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        .page-header {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            border-left: 5px solid #4a69bd;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .page-header h2 {
            color: #2c3e50;
            margin: 0;
        }

        .btn-success {
            background-color: #60a3bc;
            border-color: #60a3bc;
        }

        .btn-success:hover {
            background-color: #4a69bd;
            border-color: #4a69bd;
        }

        .alert-success {
            background-color: #c8e6c9;
            border-color: #a5d6a7;
            color: #2e7d32;
        }

        .table {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
        }

        .table th {
            background-color: #4a69bd;
            color: white;
            border: none;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-sm {
            margin: 2px;
        }

        .btn-primary {
            background-color: #60a3bc;
            border-color: #60a3bc;
        }

        .btn-primary:hover {
            background-color: #4a69bd;
            border-color: #4a69bd;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: #4a69bd;
            border-color: #4a69bd;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f0f5ff;
        }
    </style>
</head>
<body>
    <div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
            </li>
        </ul>
    </div>

    <div class="page-header d-flex justify-content-between align-items-center">
        <h2>Data Buku</h2>
        <a class="btn btn-success" href="{{ route('bukus.create') }}">Input Buku</a>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p class="m-0">{{ $message }}</p>
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th class="text-center">Kode Buku</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Kategori</th>
                <th width="200px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $buku->kode_buku }}</td>
                <td>{{ $buku->nama_buku }}</td>
                <td>{{ $buku->kode_kategori }}</td>
                <td class="text-center">
                    <form action="{{ route('bukus.destroy',$buku->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{ route('bukus.edit',$buku->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $bukus->links() !!}
</body>
</html>