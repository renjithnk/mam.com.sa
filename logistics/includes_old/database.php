<?php
global $db;
global $username;
global $password;
global $dbname;
if($_SERVER['HTTP_HOST'] == "localhost.alim" || $_SERVER['HTTP_HOST'] == "localhost")
{
		 $username = 'root';
		 $password = '';
		 $dbname = 'aegis_logistics_international_movers';
		 
		 $blogHost="localhost";
		 $blogDBUsername='root';
		 $blogDBPassword='';
		 $blogDBName='aegis_alimblog';
}
else
{
		$username = 'aegis_logistics_intnl_movers';
		$password = 'Y(V_Bu$o{Nrx';
		$dbname = 'aegis_logistics_international_movers';
		
		$blogHost="localhost";
		$blogDBUsername='aegis_alimblog';
		$blogDBPassword='adminaegis@2023';
		$blogDBName='aegis_alimblog';
		$blogURL=$blogHost . "/logistics/blog";
}
class Database {
    
    private $host = 'localhost';
    private $conn;

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