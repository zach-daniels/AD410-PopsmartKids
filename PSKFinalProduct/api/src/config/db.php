<?php

class db {
  // properties
  private $dbhost = 'mysql.zakbrinlee.com';
  private $dbuser = 'goldteam1';
  private $dbpassword = 'gold!team';
  private $dbname = 'smart1';

  // connect
  public function connect() {
    $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
    $dbconnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpassword);
    $dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbconnection;
  }
}
