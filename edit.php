<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM alumni WHERE id=$id"));

$pesan = ""; // variabel untuk menampung pesan

if (isset($_POST['update'])) {
    $sql = "UPDATE alumni SET
        nama='{$_POST['nama']}', nik='{$_POST['nik']}', nisn='{$_POST['nisn']}',
        tempat_lahir='{$_POST['tempat_lahir']}', tanggal_lahir='{$_POST['tanggal_lahir']}',
        alamat='{$_POST['alamat']}', tahun_lulus='{$_POST['tahun_lulus']}', jurusan='{$_POST['jurusan']}'
        WHERE id=$id";
    mysqli_query($conn, $sql);
    $pesan = "Data berhasil diupdate! <a href='index.php'>Kembali</a>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Edit Data Alumni</h2>
    <form method="POST" class="data11">
        <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?>" required>
        <input type="text" name="nik" placeholder="Nik" value="<?= $data['nik'] ?>" required>
        <input type="text" name="nisn" placeholder="Nisn" value="<?= $data['nisn'] ?>" required>
        <input type="text" name="tempat_lahir" placeholder="Tempat lahir" value="<?= $data['tempat_lahir'] ?>" required>
        <input type="date" name="tanggal_lahir" placeholder="Tanggal lahir" value="<?= $data['tanggal_lahir'] ?>"
            required>
        <select name="jurusan" required>
            <option value="<?= $data['jurusan'] ?>"><?= $data['jurusan'] ?></option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
            <option value="Teknik Jaringan Akses Telekomunikasi">Teknik Jaringan Akses Telekomunikasi</option>
            <option value="Animasi">Animasi</option>
        </select>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
        <input type="number" name="tahun_lulus" placeholder="Tahun lulus" value="<?= $data['tahun_lulus'] ?>" required>
        <button type="submit" name="update">Update</button>
    </form>

    <?php if ($pesan): ?>
    <p><?= $pesan ?></p>
    <?php endif; ?>
</body>

</html>
