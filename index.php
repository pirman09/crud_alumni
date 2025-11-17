<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Data Alumni Sekolah</h2>
    <a href="tambah.php" class="btn_tambah">+ Tambah Data</a>

    <!-- Form Pencarian -->
    <form method="GET" action="index.php" style="margin-top: 10px; margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari nama, NIK, NISN, jurusan, atau tahun lulus..." />
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>NISN</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tahun Lulus</th>
            <th>Jurusan</th>
            <th>Ubah</th>
        </tr>
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        if ($search != '') {
            $query = "SELECT * FROM alumni WHERE 
                nama LIKE '%$search%' OR 
                nik LIKE '%$search%' OR 
                nisn LIKE '%$search%' OR 
                jurusan LIKE '%$search%' OR 
                tahun_lulus LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM alumni";
        }

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['nik']}</td>
                    <td>{$row['nisn']}</td>
                    <td>{$row['tempat_lahir']}</td>
                    <td>{$row['tanggal_lahir']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['tahun_lulus']}</td>
                    <td>{$row['jurusan']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> |
                        <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Data tidak ditemukan.</td></tr>";
        }
        ?>
    </table>
</body>

</html>
