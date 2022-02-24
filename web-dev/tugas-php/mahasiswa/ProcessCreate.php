<?php
session_start();
require "../Conn.php";
require "./MahasiswaService.php";
use mahasiswa\MahasiswaService;

$status = $_SESSION['status'] ?? null;
if(!(isset($status) && $status == 'login')){
    header('location:login.php');
}

$datas = [
    'name' => $_POST['name'] ?? null,
    'kelas' => $_POST['kelas'] ?? null,
    'nim' => $_POST['nim'] ?? null,
];

$processRegister = new MahasiswaService;
$processRegister->createMahasiswa($datas);