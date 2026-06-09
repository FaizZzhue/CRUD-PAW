<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "dboptik";

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $db
);

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}