<?php
include 'koneksi.php';
mysqli_query($conn, "DELETE FROM alumni WHERE id={$_GET['id']}");
header("Location: index.php");
