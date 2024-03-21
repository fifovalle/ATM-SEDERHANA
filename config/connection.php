<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "atm";

$koneksi = new mysqli($host, $username, $password, $database);
