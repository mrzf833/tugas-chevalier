<?php
require "../Conn.php";
require "./MahasiswaService.php";
use mahasiswa\MahasiswaService;

$data = $_GET['id'];

$processRegister = new MahasiswaService;
$processRegister->deleteMahasiswa($data);