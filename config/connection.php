<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "modul9";

$koneksi = new mysqli($host, $username, $password, $database);
