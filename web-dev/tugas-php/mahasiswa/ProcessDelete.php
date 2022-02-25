<?php
session_start();
require "../Conn.php";
require "./MahasiswaService.php";
use mahasiswa\MahasiswaService;

$status = $_SESSION['status'] ?? null;
if(!(isset($status) && $status == 'login')){
    header('location:../login.php');
}

$data = $_GET['id'];

$processRegister = new MahasiswaService;
$processRegister->deleteMahasiswa($data);