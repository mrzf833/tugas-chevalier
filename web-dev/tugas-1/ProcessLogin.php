<?php
session_start();
require './Conn.php';
use tugas\Conn;

$username = $_POST['username'];
$password = $_POST['password'];

$processLogin = new ProcessLogin;
$processLogin->login($username, $password);

class ProcessLogin {
    protected $table = 'users';
    public function login($username, $password)
    {
        $table = $this->table;
        $password = md5($password);

        $query = Conn::query("SELECT * FROM $table WHERE username='$username' AND password='$password'");
        
        $user = mysqli_num_rows($query);
        

        if($user > 0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            return header('location:mahasiswa.php');
        }

        return header('location:login.php');
    }

    public function checkLogin()
    {
        $status = $_SESSION['status'];
        if(!(isset($status) && $status == 'login')){
            header('location:login.php');
        }
    }
}