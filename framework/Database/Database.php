<?php

namespace Framework\Database;

use PDO;
use PDOException;

class Database
{
    protected $username;

    protected $password;

    protected $server;

    public function __construct($username, $password, $server)
    {
        $this->username = $username;
        $this->password = $password;
        $this->server = $server;
        try {
            $this->pdo = new PDO("mysql:host=$this->server;dbname=Scandiwoof", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully! ";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql)
    {
        try {
            $this->pdo->exec($sql);
            echo "New record created successfully";
            return true;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
