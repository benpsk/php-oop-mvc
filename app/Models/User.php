<?php

namespace App\Models;

use App\Database;
use PDO;

class User
{
  private static $table = 'users';

  public static function all()
  {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->query('SELECT * FROM ' . self::$table);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function find($id)
  {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function create($data)
  {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare('INSERT INTO ' . self::$table . ' (name, email) VALUES (:name, :email)');
    $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $stmt->execute();
  }

  public static function update($id, $data)
  {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare('UPDATE ' . self::$table . ' SET name = :name, email = :email WHERE id = :id');
    $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public static function delete($id)
  {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare('DELETE FROM ' . self::$table . ' WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
