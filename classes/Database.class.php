<?php 
session_start();
error_reporting(E_ALL); 
date_default_timezone_set('Asia/Bangkok');
/**
 * Connect Database Class
 */
class Database {
    /** DSN -> Data Source Name */
    private static $host = 'localhost';
    private static $dbname = 'w3schools';
    private static $username = 'root';
    private static $password = '';
    private static $response;
    private static $connect = null;

    private static function connect() {
        try{
            self::$connect = new PDO('mysql:host='.self::$host.';
                                        dbname='.self::$dbname.'; 
                                        charset=utf8', 
                                        self::$username, 
                                        self::$password);
            self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ตั้งค่า ตัวเลขใน SQL ได้
            self::$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return self::$connect;
        }catch(PDOException $e){
            echo 'Database could not be connected: ' . $e->getMessage();
            exit();
        }
    }
}

$conn = Database::connect();
?>