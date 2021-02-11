<?php

use PHPUnit\Framework\TestCase;

class DBTest extends TestCase
{
    /** @test **/
    public function can_connect() {
      $dbh = new DB();

      $this->assertInstanceOf(
        PDO::class,
        $dbh->connection
      );
    }

    /** @test **/
    public function can_query() {
      $dbh = new DB();

      $sql = 'SELECT * FROM posts';
      $values = [];

      $result = $dbh->query($sql, $values);

      $this->assertArrayHasKey(
        'id',
        $result
      );
    }

    /** @test **/
    public function can_create_post() {
      $dbh = new DB();

      $sql = "INSERT INTO posts (user_id, body) VALUES (? , ?)";
      $values = [1,'Hej Jesper'];

      $dbh->query($sql, $values);

      $this->assertNotEquals(
        0,
        $dbh->connection->lastInsertId()
      );
    }

    /** @test **/
    public function can_update_post() {
      $dbh = new DB();

      $sql = "INSERT INTO posts (user_id, body) VALUES (? , ?)";
      $values = [1,'Hej Jesper'];
      $dbh->query($sql, $values);

      $id = $dbh->connection->lastInsertId();

      $sql = "UPDATE posts SET body = ? WHERE id = ?";

      $body = 'Hej Hampus';

      $dbh->query($sql, [$body, $id]);

      $result = $dbh->query('SELECT * FROM posts WHERE id = ?', [$id]);
      $this->assertEquals(
        $result['body'],
        $body
      );
    }
}
