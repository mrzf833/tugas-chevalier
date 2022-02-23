<?php
session_start();

require "./Conn.php";
require "./mahasiswa/MahasiswaService.php";
use mahasiswa\MahasiswaService;

    $status = $_SESSION['status'];
    if(!(isset($status) && $status == 'login')){
        header('location:login.php');
    }

    $processRegister = new MahasiswaService;
    $datas = $processRegister->getMahasiswa();
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
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 class="text-center">Mahasiswa</h2>
    <div class="d-flex justify-content-end">
        <a href="./mahasiswa/create.php" class="btn btn-primary mx-3">Create</a>
    </div>

    <div class="mx-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nim</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($datas as $data){
                        
                ?>
                    <tr>
                        <td class="name"><?= $data['name'] ?></td>
                        <td class="kelas"><?= $data['kelas'] ?></td>
                        <td class="nim"><?= $data['nim'] ?></td>
                        <td>
                            <a href="./mahasiswa/edit.php?id=<?= $data['id'] ?>"  class="btn btn-warning m-1">Edit</a>
                            <button type="button" class="btn btn-danger m-1" id="<?= $data['id'] ?>" onclick="deleteMahasiswa(this)" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./mahasiswa/ProcessDelete.php" method="get">
                    <input type="text" name="id" id="id-mahasiswa" hidden>
                    <div class="modal-body">
                        Apakah Anda Yakin Menghapus data ini
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function deleteMahasiswa(e){
            let id = e.getAttribute('id')
            document.getElementById('id-mahasiswa').value = id
        }
    </script>
</body>
</html>