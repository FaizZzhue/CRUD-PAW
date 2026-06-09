<?php

require_once dirname(__DIR__) . '/config/database.php';

function query($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    $rows = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
    }
    return $rows;
}

function formatDateIndonesia($dateStr)
{
    if (!$dateStr || $dateStr == '0000-00-00') return '-';
    $time = strtotime($dateStr);
    if (!$time) return '-';
    
    $months = [
        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
        5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
        9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
    ];
    $day = date('d', $time);
    $month = $months[(int)date('m', $time)];
    $year = date('Y', $time);
    return "$day $month $year";
}

function getStatusClass($status)
{
    switch ($status) {
        case 'DIPROSES': return 'status-process';
        case 'SELESAI': return 'status-success';
        case 'DIAMBIL': return 'status-info';
        case 'BATAL': return 'status-danger';
        default: return 'status-process';
    }
}