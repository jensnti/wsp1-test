<?php

class Post
{
  private string $body;
  private int $id;
  private int $userId;

  public function __construct(string $body, int $userId, int $id = 0)
  {
    $this->id = $id;
    $this->userId = $userId;
    $this->body = $body;
  }

  public function __set($name, $value) {
    $this->$name = $value;
  }

  public function __get($name) {
    return $this->$name;
  }

  public function user()
  {
    $dbh = new DB();
    $result = $dbh->query(
      'SELECT *
      FROM users
      WHERE id = ?',
      [$this->userId]
    );

    $this->userId = $result['id'];

    return $result;
  }

  public function save() {
    if ($this->id == 0) {
      $dbh = new DB();
      $sql = 'INSERT INTO posts (user_id, body, created_at, updated_at) VALUES (?,?,now(),now())';
      $dbh->query($sql, [$this->userId, $this->body]);

      $this->id = $dbh->connection->lastInsertID();

      return (bool)$this->id;
    }
    
    // this needs code to update if data exists

  }

}