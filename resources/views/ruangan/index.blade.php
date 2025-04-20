<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan</title>
</head>
<body>

    <h1>Daftar Ruangan</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('ruangans.create') }}">Tambah Ruangan</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_ruangan }}</td>
                    <td>{{ $item->kapasitas }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('ruangans.edit', $item->id) }}">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('ruangans.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus ruangan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
