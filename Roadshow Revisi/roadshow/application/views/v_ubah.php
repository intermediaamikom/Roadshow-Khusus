<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Siswa</title>
</head>
<body>
    <b>Ubah Data Siswa</b>
    <form action="<?= base_url('siswa/proses_ubah') ?>" method="POST">
        <table>
            <tr>
                <td>NIS</td>
                <td><?= $nis ?><input type="hidden" name="nis" value="<?= $nis ?>"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama" value="<?= $nama ?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select name="kelas">
                        <option value="X RPL 1" <?= ($kelas == "X RPL 1" ? "selected" : "") ?>>X RPL 1</option>
                        <option value="X RPL 2" <?= ($kelas == "X RPL 2" ? "selected" : "") ?>>X RPL 2</option>
                        <option value="XI RPL 1" <?= ($kelas == "XI RPL 1" ? "selected" : "") ?>>XI RPL 1</option>
                        <option value="XI RPL 2" <?= ($kelas == "XI RPL 2" ? "selected" : "") ?>>XI RPL 2</option>
                        <option value="XII RPL 1" <?= ($kelas == "XII RPL 1" ? "selected" : "") ?>>XII RPL 1</option>
                        <option value="XII RPL 2" <?= ($kelas == "XII RPL 2" ? "selected" : "") ?>>XII RPL 2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required><?= $alamat ?></textarea></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input  type="radio" 
                            name="jenis_kelamin" 
                            value="L" 
                            <?= ($jenis_kelamin == "L" ? "checked" : "")?>> Laki - Laki
                    <br>
                    <input  type="radio" 
                            name="jenis_kelamin" 
                            value="P" 
                            <?= ($jenis_kelamin == "P" ? "checked" : "")?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="telepon" value="<?= $telepon ?>" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="kirim">Simpan</button></td>
                <td><button type="reset" name="reset">Ulangi</button></td>
            </tr>
        </table>
    </form>
</body>
</html>