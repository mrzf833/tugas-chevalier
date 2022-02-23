<?php
require './Conn.php';
use tugas\Conn;

class ProcessRegister {
    protected $values = [];
    protected $columns = [];

    protected $columnValidation = [
        'name', 'username', 'password'
    ];

    protected $columnUniques = [
        'username'
    ];

    protected $table = 'users';

    function __construct(array $datas)
    {
        $this->registerValidation($datas);
        $this->createAdmin();
    }

    public function createAdmin()
    {
        $table = $this->table;
        $value = join(',', $this->values);
        $column = join(',', $this->columns);
        $query = "INSERT INTO $table($column) VALUES ($value)";
        Conn::query($query);
        header("location:login.php");
    }

    public function registerValidation($datas)
    {
        $table = $this->table;
        foreach($this->columnValidation as $column){
            if(!isset($datas[$column])){
                return die("maaf column $column masih kosong");
            }
            array_push($this->values, "'$datas[$column]'");
            array_push($this->columns, $column);
        }

        foreach($this->columnUniques as $columnUnique){
            $count = Conn::query("SELECT * FROM $table WHERE $columnUnique='$datas[$columnUnique]'");
            $count = mysqli_num_rows($count);
            if($count > 0){
                return die("maaf data '$datas[$columnUnique]' di column $columnUnique sudah ada");
            }
        }


    }
}

$datas = [
    'name' => $_POST['name'] ?? null,
    'username' => $_POST['username'] ?? null,
    'password' => $_POST['password'] ? md5($_POST['password']) : null
];

$processRegister = new ProcessRegister($datas);