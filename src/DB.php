<?php

class DB {

  private $connection;
  private $user = "jens";
  private $password = "Secret123";
  private $database = "blog";

  public function __construct()
  {
    try {
      $this->connection = new PDO(
        'mysql:host=127.0.0.1;
        charset=utf8mb4;
        dbname=' . $this->database . '',
        $this->user,
        $this->password
      );
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function __get($name) {
    return $this->$name;
  }

  public function query($sql, $values)
  {
    $sth = $this->connection->prepare($sql);
    $sth->execute($values);
    return $sth->fetch(PDO::FETCH_ASSOC);
  }

}