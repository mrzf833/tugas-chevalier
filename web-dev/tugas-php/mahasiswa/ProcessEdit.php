<?php
require "../Conn.php";
require "./MahasiswaService.php";
use mahasiswa\MahasiswaService;

$datas = [
    'name' => $_POST['name'] ?? null,
    'kelas' => $_POST['kelas'] ?? null,
    'nim' => $_POST['nim'] ?? null,
];

$id = $_POST['id'];

$processRegister = new MahasiswaService;
$processRegister->editMahasiswa($id, $datas);