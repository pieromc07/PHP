<?php

namespace Core;

use Config\GlobalConfig;

class MyDatabase
{
  // Conección a la base de datos. patrón Singleton.

  private static $instance = null;
  private $connection;

  public function __construct()
  {
    $db = GlobalConfig::$db;

    $this->connection = new \PDO(
      $db['driver'] . ':host=' . $db['host'] . ';dbname=' . $db['database'],
      $db['username'],
      $db['password']
    );

    $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  }

  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }

  public function __destruct()
  {
    $this->connection = null;
  }

  public function all(string $table): array
  {
    $sql = "SELECT * FROM $table";
    $query = $this->connection->query($sql);
    return $query->fetchAll();
  }

  public function findBy(string $table, array $where): array
  {
    $sql = "SELECT * FROM $table WHERE ";
    $sql .= implode(' AND ', array_map(fn($k) => "$k = :$k", array_keys($where)));
    $query = $this->connection->prepare($sql);
    $query->execute($where);
    return $query->fetch();
  }

  public function select(string $table, array $where): array
  {
    $sql = "SELECT * FROM $table WHERE ";
    $sql .= implode(' AND ', array_map(fn($k) => "$k = :$k", array_keys($where)));
    $query = $this->connection->prepare($sql);
    $query->execute($where);
    return $query->fetchAll();
  }

  public function insert(string $table, array $data): bool
  {
    $sql = "INSERT INTO $table (";
    $sql .= implode(', ', array_keys($data));
    $sql .= ') VALUES (';
    $sql .= implode(', ', array_map(fn($k) => ":$k", array_keys($data)));
    $sql .= ')';

    $query = $this->connection->prepare($sql);
    return $query->execute($data);
  }

  public function update(string $table, array $data, array $where): bool
  {
    $sql = "UPDATE $table SET ";
    $sql .= implode(', ', array_map(fn($k) => "$k = :$k", array_keys($data)));
    $sql .= ' WHERE ';
    $sql .= implode(' AND ', array_map(fn($k) => "$k = :$k", array_keys($where)));

    $query = $this->connection->prepare($sql);
    return $query->execute(array_merge($data, $where));
  }

  public function delete(string $table, array $where): bool
  {
    $sql = "DELETE FROM $table WHERE ";
    $sql .= implode(' AND ', array_map(fn($k) => "$k = :$k", array_keys($where)));

    $query = $this->connection->prepare($sql);
    return $query->execute($where);
  }
}
