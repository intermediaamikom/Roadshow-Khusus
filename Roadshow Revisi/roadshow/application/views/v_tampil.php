<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa SMK N 1 Purbalingga</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <h3>SMK Negeri 1 Bawang</h3>
    <p><a href="#">Tambah</a></p>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row['nis']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['tanggal_lahir']; ?></td>
            <td><?= ($row['jenis_kelamin'] == 'L' ? "Laki - Laki" : "Perempuan"); ?></td>
            <td><?= $row['telepon']; ?></td>
            <td>
                <a href="#">Ubah</a>
                |
                <a  href="#" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
    </table>
</body>
</html>