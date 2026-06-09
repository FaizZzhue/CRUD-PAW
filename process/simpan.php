<?php

require_once '../config/database.php';

// Escape input variables with isset(), trim() and mysqli_real_escape_string()
$kode_pelanggan       = isset($_POST['kode_pelanggan']) ? mysqli_real_escape_string($conn, trim($_POST['kode_pelanggan'])) : '';
$nama                 = isset($_POST['nama_lengkap']) ? mysqli_real_escape_string($conn, trim($_POST['nama_lengkap'])) : '';
$alamat               = isset($_POST['alamat']) ? mysqli_real_escape_string($conn, trim($_POST['alamat'])) : '';
$telepon              = isset($_POST['nomor_telepon']) ? mysqli_real_escape_string($conn, trim($_POST['nomor_telepon'])) : '';
$jk                   = isset($_POST['jenis_kelamin']) ? mysqli_real_escape_string($conn, trim($_POST['jenis_kelamin'])) : '';

$sph_kanan            = isset($_POST['sph_kanan']) ? mysqli_real_escape_string($conn, trim($_POST['sph_kanan'])) : '';
$cyl_kanan            = isset($_POST['cyl_kanan']) ? mysqli_real_escape_string($conn, trim($_POST['cyl_kanan'])) : '';
$axis_kanan           = isset($_POST['axis_kanan']) ? mysqli_real_escape_string($conn, trim($_POST['axis_kanan'])) : '';
$add_kanan            = isset($_POST['add_kanan']) ? mysqli_real_escape_string($conn, trim($_POST['add_kanan'])) : '';

$sph_kiri             = isset($_POST['sph_kiri']) ? mysqli_real_escape_string($conn, trim($_POST['sph_kiri'])) : '';
$cyl_kiri             = isset($_POST['cyl_kiri']) ? mysqli_real_escape_string($conn, trim($_POST['cyl_kiri'])) : '';
$axis_kiri            = isset($_POST['axis_kiri']) ? mysqli_real_escape_string($conn, trim($_POST['axis_kiri'])) : '';
$add_kiri             = isset($_POST['add_kiri']) ? mysqli_real_escape_string($conn, trim($_POST['add_kiri'])) : '';

$pd                   = isset($_POST['pd']) ? mysqli_real_escape_string($conn, trim($_POST['pd'])) : '';
$catatan_resep        = isset($_POST['catatan_resep']) ? mysqli_real_escape_string($conn, trim($_POST['catatan_resep'])) : '';

$optometrist          = isset($_POST['optometrist']) ? mysqli_real_escape_string($conn, trim($_POST['optometrist'])) : '';
$tanggal_pemeriksaan  = isset($_POST['tanggal_pemeriksaan']) ? mysqli_real_escape_string($conn, trim($_POST['tanggal_pemeriksaan'])) : '';
$keluhan              = isset($_POST['keluhan']) ? mysqli_real_escape_string($conn, trim($_POST['keluhan'])) : '';
$diagnosa             = isset($_POST['diagnosa']) ? mysqli_real_escape_string($conn, trim($_POST['diagnosa'])) : '';

$id_transaksi         = isset($_POST['id_transaksi']) ? mysqli_real_escape_string($conn, trim($_POST['id_transaksi'])) : '';
$total_harga          = isset($_POST['total_harga']) ? (float)trim($_POST['total_harga']) : 0;
$status_pesanan       = isset($_POST['status_pesanan']) ? mysqli_real_escape_string($conn, trim($_POST['status_pesanan'])) : 'DIPROSES';

// Simple validation
if (empty($nama)) {
    die("Error: Nama lengkap wajib diisi!");
}

$query = "
INSERT INTO pelanggan
(
    kode_pelanggan,
    nama_lengkap,
    alamat,
    nomor_telepon,
    jenis_kelamin,
    sph_kanan,
    cyl_kanan,
    axis_kanan,
    add_kanan,
    sph_kiri,
    cyl_kiri,
    axis_kiri,
    add_kiri,
    pd,
    catatan_resep,
    optometrist,
    tanggal_pemeriksaan,
    keluhan,
    diagnosa,
    id_transaksi,
    total_harga,
    status_pesanan
)
VALUES
(
    '$kode_pelanggan',
    '$nama',
    '$alamat',
    '$telepon',
    '$jk',
    '$sph_kanan',
    '$cyl_kanan',
    '$axis_kanan',
    '$add_kanan',
    '$sph_kiri',
    '$cyl_kiri',
    '$axis_kiri',
    '$add_kiri',
    '$pd',
    '$catatan_resep',
    '$optometrist',
    '$tanggal_pemeriksaan',
    '$keluhan',
    '$diagnosa',
    '$id_transaksi',
    '$total_harga',
    '$status_pesanan'
)
";

mysqli_query($conn, $query);

header("Location: ../index.php");
exit;