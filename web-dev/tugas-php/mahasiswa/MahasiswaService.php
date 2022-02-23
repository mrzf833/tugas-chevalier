<?php
namespace mahasiswa;

use tugas\Conn;

class MahasiswaService {
    protected $values = [];
    protected $columns = [];

    protected $columnValidation = [
        'name', 'kelas', 'nim'
    ];

    protected $columnUniques = [
        'nim'
    ];

    protected $table = 'mahasiswa';

    public function createMahasiswa(array $datas)
    {
        $this->registerValidation($datas);
        $table = $this->table;
        $value = join(',', $this->values);
        $column = join(',', $this->columns);
        $query = "INSERT INTO $table($column) VALUES ($value)";
        Conn::query($query);
        header("location:../mahasiswa.php");
    }

    public function getMahasiswa()
    {
        $table = $this->table;
        $query = "SELECT * FROM $table";
        $query = Conn::query($query);
        $datas = [];
        while($row = mysqli_fetch_assoc($query)){
            $datas[] = $row;
        }
        return $datas;
    }

    public function getMahasiswaId($id)
    {
        $table = $this->table;
        $query = "SELECT * FROM $table WHERE id='$id'";
        $query = Conn::query($query);
        $datas = mysqli_fetch_assoc($query);
        return $datas;
    }

    public function editMahasiswa($id, $datas)
    {
        $table = $this->table;
        $name = $datas['name'];
        $kelas = $datas['kelas'];
        $nim = $datas['nim'];
        $query = "UPDATE $table SET name='$name', kelas='$kelas', nim='$nim' WHERE id='$id'";
        $query = Conn::query($query);
        header("location:../mahasiswa.php");
    }

    public function deleteMahasiswa($id)
    {
        $table = $this->table;
        $query = "DELETE FROM $table WHERE id='$id'";
        $query = Conn::query($query);
        if($query){
            return header('location:../mahasiswa.php');
        }

        return die('maaf terjadi kesalahan atau id anda tidak ditemukan');
    }

    public function registerValidation($datas)
    {
        $table = $this->table;
        foreach($this->columnValidation as $column){
            if(!$datas[$column]){
                return die("maaf column $column masih kosong");
            }
            array_push($this->values, "'$datas[$column]'");
            array_push($this->columns, $column);
        }

        if(count($this->columnUniques) > 0){
            foreach($this->columnUniques as $columnUnique){
                $count = Conn::query("SELECT * FROM $table WHERE $columnUnique='$datas[$columnUnique]'");
                $count = mysqli_num_rows($count);
                if($count > 0){
                    return die("maaf data '$datas[$columnUnique]' di column $columnUnique sudah ada");
                }
            }
        }


    }
}