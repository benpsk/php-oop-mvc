<?php

namespace App;

use PDO;
use PDOException;

class Database
{
  private static $instance = null;
  private $connection;

  private function __construct()
  {
    $config = require '../app/config.php';
    $dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'];
    $user = $config['database']['user'];
    $password = $config['database']['password'];

    try {
      $this->connection = new PDO($dsn, $user, $password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die('Database connection failed: ' . $e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }
}
