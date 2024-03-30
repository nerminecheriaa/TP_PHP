<?php

class Dbh {
    private $host = 'localhost';
    private $dbname = 'bookStore';
    private $username = 'root';
    private $password = '';

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Could not connect to the database $this->dbname :" . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>