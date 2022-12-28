<?php 
session_start();
error_reporting(E_ALL); 
date_default_timezone_set('Asia/Bangkok');
/**
 * Connect Database
 */
class Database {
    /** DSN -> Data Source Name */
    private $host = "localhost";
    private $dbname = "w3schools";
    private $username = "root";
    private $password = "";
    // private $response;
    private $connect = null;

    public function connect() {
        try{
            $this->connect = new PDO("mysql:host={$this->host};
                                    dbname={$this->dbname}, 
                                    charset=utf8",
                                    $this->username, 
                                    $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
            exit();
        }
        return $this->connect;
    }
}

$database = new Database;
$conn = $database->connect();
print_r($conn);
?>