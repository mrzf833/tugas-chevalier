<?php 

namespace tugas;

use mysqli;

class Conn {
    protected static $conn;
    protected static $dbHost = 'localhost';
    protected static $dbUser = 'homestead';
    protected static $dbPass = 'secret';
    protected static $db = 'kuliah';

    public static function createConnection(){
        self::$conn = mysqli_connect(self::$dbHost, self::$dbUser, self::$dbPass, self::$db);
        if(! self::$conn){
            return die("Gagal terhubung dengan database: " . mysqli_connect_error());
        }
    }

    public static function getConnection()
    {
        if(!self::$conn){
            self::createConnection();
        }
        return self::$conn;
    }

    public static function query($query)
    {
        $conn = self::getConnection();
        return mysqli_query($conn, $query);
    }
}