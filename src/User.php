<?php

class User {
  private int $id;
  private string $name;

  public function __construct(string $name, int $id = 0) 
  {
    $this->id = $id;
    $this->name = $name;
  }

  public function __set($name, $value) {
    $this->$name = $value;
  }

  public function __get($name) {
    return $this->$name;
  }

  public function save() {
    if ($this->id == 0) {
      $dbh = new DB();
      $dbh->query('INSERT INTO users (name, created_at, updated_at) VALUES (?, now(),now())', [$this->name]);
      
      $id = $dbh->connection->lastInsertID();

      if ($id != 0) {
        $this->id = $dbh->connection->lastInsertID();
      }

      return (bool) $this->id;
    }
  }
}