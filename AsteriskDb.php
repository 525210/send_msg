<?php

class AsteriskDb
{
    public $user;
    public $password;
    public $db;
    public $host;
    public $dsn;
    public $conn;
    public $path;

    public function __construct()
    {
        $this->user = 'root';
        $this->password = 'Stas@525210';
        $this->db = 'asteriskcdrdb';
        $this->host = 'localhost';
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $this->conn = new PDO($this->dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->path = '/var/www/html/speech2text.mine.nu/public/sound_files/';
    }

    public function getCallDuration()
    {
        $sql = "SELECT * FROM `cdr` WHERE `lastapp` = 'Dial' ORDER BY `calldate` DESC";  //ORDER BY column_name(s) ASC|DESC
        $query = $this->conn->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}