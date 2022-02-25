<?php
session_start();

require "../Conn.php";
require "./MahasiswaService.php";
use mahasiswa\MahasiswaService;

    $status = $_SESSION['status'] ?? null;
    if(!(isset($status) && $status == 'login')){
        header('location:../login.php');
    }

    $id = $_GET['id'];
    $processRegister = new MahasiswaService;
    $datas = $processRegister->getMahasiswaId($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid ">
            <span class="navbar-brand mb-0 h1 text-white">Kuliah</span>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle text-white" type="button" id="profile-dropdown" data-bs-toggle="dropdown" aria-expanded="true">
                    <i class="fa-solid fa-user text-white"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile-dropdown">
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 class="text-center mt-5">Edit Mahasiswa</h2>

    <div class="d-flex justify-content-center my-5">
        <div style="width: 100%; max-width: 500px">
            <form action="./ProcessEdit.php" method="post">
                <input type="text" name="id" value="<?= $datas['id'] ?>" hidden>
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" placeholder="nama" name="name" value="<?= $datas['name'] ?>" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">Kelas</label>
                    <input type="text" placeholder="kelas" name="kelas" value="<?= $datas['kelas'] ?>" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">Nim</label>
                    <input type="text" placeholder="nim" name="nim" value="<?= $datas['nim'] ?>" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning" style="width: 100%;">Edit</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>