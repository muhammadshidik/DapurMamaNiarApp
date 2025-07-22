<?php

$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "catering";
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);
if (!$config) {
    echo "Koneksi gagal";
}
