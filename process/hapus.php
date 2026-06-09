<?php

require_once '../config/database.php';

// Escape input variable with isset(), trim() and mysqli_real_escape_string()
$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, trim($_GET['id'])) : '';

if ($id != '') {
    mysqli_query(
        $conn,
        "DELETE FROM pelanggan
        WHERE id = '$id'"
    );
}

header("Location: ../index.php");
exit;