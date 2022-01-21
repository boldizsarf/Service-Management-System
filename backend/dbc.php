<?php

ini_set('memory_limit', '-1');

require "config.php";

class DBC
{

    public $isConn;
    protected $datab;

    public function __construct($options = [])
    {
        require "config.php";
        $this->isConn = true;
        try {
            $this->datab = new PDO("mysql:host={$mysqlhost};dbname={$mysqldbname};charset=utf8mb4", $mysqlusername, $mysqlpassword, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Disconnect()
    {
        $this->datab = null;
        $this->isConn = false;
    }

    public function get($query, $params = [])
    {
        try {
            ini_set('memory_limit', '4024M');
            $this->datab->quote($query);
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchALL();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function set($query, $params = [])
    {
        try {
            $this->datab->quote($query);
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function numRows($query, $params = [])
    {
        try {
            $this->datab->quote($query);
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function lastInsertId()
    {
        return $this->datab->lastInsertId();
    }
}

$dbc = new DBC();
require "notify.php";
require 'addactivity.php';
?>