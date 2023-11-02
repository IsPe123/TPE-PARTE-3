<?php

class DBHelper {

    public $host;
    public $database;
    public $user;
    public $password;

    public function __construct() {
        $this->host = 'localhost';
        $this->database = 'noisyprints_db_tp';
        $this->user = 'root';
        $this->password = '';
    }

    public function connect() {
        $db = new PDO("mysql:host={$this->host};"."dbname={$this->database};charset=utf8", $this->user, $this->password);
        return $db;
    }
}