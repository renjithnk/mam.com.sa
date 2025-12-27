<?php
global $db;
global $username;
global $password;
global $dbname;
if($_SERVER['HTTP_HOST'] == "localhost.mam.com.sa" || $_SERVER['HTTP_HOST'] == "localhost")
{
		 $username = 'root';
		 $password = '';
		 $dbname = 'mamgroup_logistics_international_movers';
		 
		 $blogHost="localhost";
		 $blogDBUsername='root';
		 $blogDBPassword='';
		 $blogDBName='mamgroup_blog';
}
else
{
		$username = 'mamgroup_logistics_international';
		$password = 'dRa.Asd(76Xp';
		$dbname = 'mamgroup_logistics_international_movers';
		
		$blogHost="localhost";
		$blogDBUsername='mamgroup_blog';
		$blogDBPassword='J&jEo,ppdi2k';
		$blogDBName='mamgroup_blog';
		$blogURL=$blogHost . "/logistics/blog";
}
class Database {
    
    private $host = 'localhost';
//    private $conn;
	public $conn;

    public function __construct() {
		global $username;
		global $password;
		global $dbname;
        $this->conn = new mysqli($this->host,$username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function fetchAssoc($result) {
        return $result->fetch_assoc();
    }

    public function escape($value) {
        return $this->conn->real_escape_string($value);
    }

    public function close() {
        $this->conn->close();
    }
}
?>