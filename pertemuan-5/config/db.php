<?php

$DBHOST = 'localhost';
$DBUSER = 'root';
$PORT = 3307;
$DBPASSWORD = '';
$DBNAME = 'pemweb_db';

// Urutkan parameter dengan benar
$db_connect = mysqli_connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME, $PORT);

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit(); // Menghentikan eksekusi jika koneksi gagal
}
