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
    <div class="d-flex justify-content-center align-items-center vh-100 wh-100">
        <div style="max-width: 500px; width: 100%">
            <div class="text-center mb-3">
                <h1>Register</h1>
                <i class="fa-solid fa-user" style="font-size: 100px;color: #00a8ff;"></i>
            </div>
            <form action="./ProcessRegister.php" method="post">
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" placeholder="nama" name="name" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Username</label>
                    <input type="text" placeholder="username" name="username" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" placeholder="password" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary mx-1">Register</button>
                    <a href="./login.php" class="mx-1">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>