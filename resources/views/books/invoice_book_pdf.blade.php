<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice Buku - {{ $book->title }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 5px;
        }

        .cover {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h2>Invoice Buku</h2>
    <table>
        <tr>
            <th>Judul</th>
            <td>: {{ $book->title }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>: {{ $book->author }}</td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>: {{ $book->publisher }}</td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>: {{ $book->year }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>: {{ $book->category->name }}</td>
        </tr>
    </table>

    @if ($book->cover)
        <div class="cover">
            <img src="{{ public_path('storage/' . $book->cover) }}" alt="Cover" width="150">
        </div>
    @endif

    <p style="margin-top: 20px;">Tanggal Cetak: {{ date('d/m/Y') }}</p>
</body>

</html>
