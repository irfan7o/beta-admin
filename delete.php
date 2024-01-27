<?php
include 'connection.php';

// Menyimpan data id kedalam variabel
$id = $_GET['id'];

// Query SQL untuk insert data
$query="DELETE FROM translate WHERE id ='$id'";
mysqli_query($con, $query);

// Set session sukses
$_SESSION["sukses"] = 'Data Berhasil Dihapus';

// Alihkan ke halaman dataset.php
header("location:dataset.php");
?>