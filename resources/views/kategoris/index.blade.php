<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Data Kategori</title>
    <style>
        body {
            background-color: #fff3e0;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .nav {
            background-color: #ff9800;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 20px;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .header-container {
            background-color: white;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-bottom: 3px solid #ff9800;
        }

        h2 {
            color: #e65100;
            margin: 0;
            font-size: 24px;
        }

        .btn-success {
            background-color: #ff9800;
            border-color: #ff9800;
        }

        .btn-success:hover {
            background-color: #f57c00;
            border-color: #f57c00;
        }

        .alert-success {
            background-color: #dcedc8;
            border-color: #c5e1a5;
            color: #33691e;
        }

        .table {
            background-color: white;
            border: 1px solid #ffe0b2;
        }

        .table th {
            background-color: #ff9800;
            color: white;
            border: none;
            font-weight: 500;
        }

        .table td {
            border-color: #ffe0b2;
        }

        .table tr:nth-child(even) {
            background-color: #fff8e1;
        }

        .table tr:hover {
            background-color: #ffecb3;
        }

        .btn-primary {
            background-color: #fb8c00;
            border-color: #fb8c00;
        }

        .btn-primary:hover {
            background-color: #f57c00;
            border-color: #f57c00;
        }

        .btn-danger {
            background-color: #ff5722;
            border-color: #ff5722;
        }

        .btn-danger:hover {
            background-color: #f4511e;
            border-color: #f4511e;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: #ff9800;
            border-color: #ff9800;
        }

        .page-link {
            color: #ff9800;
        }

        .page-link:hover {
            color: #f57c00;
        }

        .btn-sm {
            margin: 0 2px;
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

    <div class="header-container d-flex justify-content-between align-items-center">
        <h2>Data Kategori</h2>
        <a class="btn btn-success" href="{{ route('kategoris.create') }}">Input Kategori</a>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p class="m-0">{{ $message }}</p>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th class="text-center">Kode Kategori</th>
                    <th class="text-center">Nama Kategori</th>
                    <th width="200px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ $kategori->kode_kategori }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td class="text-center">
                        <form action="{{ route('kategoris.destroy',$kategori->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('kategoris.edit',$kategori->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $kategoris->links() !!}
</body>
</html>