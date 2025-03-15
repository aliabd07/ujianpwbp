<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" required><br>

        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br>

        <label>Jenis Buku:</label>
        <input type="text" name="jenis_buku" required><br>

        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required><br>

        <label>Sampul:</label>
        <input type="file" name="sampul"><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
