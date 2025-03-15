<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}">Tambah Buku</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Jenis Buku</th>
            <th>Tahun Terbit</th>
            <th>Sampul</th>
        </tr>
        @foreach($buku as $b)
        <tr>
            <td>{{ $b->id_buku }}</td>
            <td>{{ $b->judul_buku }}</td>
            <td>{{ $b->pengarang }}</td>
            <td>{{ $b->jenis_buku }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td>
                @if($b->sampul)
                    <img src="{{ asset('storage/sampul/' . $b->sampul) }}" width="50">
                @else
                    Tidak ada sampul
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
