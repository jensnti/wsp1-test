<?php

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /** @test **/
    public function it_should_be_able_to_create_a_new_blogpost() {

      $post = new Post('Meddelande', 0);

      $this->assertInstanceOf(
        Post::class,
        $post
      );
    }

    /** @test **/
    public function it_should_have_a_body_property()
    {
      $msg = 'This is a test tweet';
      $post = new Post($msg, 0);

      $this->assertEquals(
        $msg,
        $post->body
      );
    }

    /** @test **/
    public function it_should_have_an_author()
    {

      $post = new Post('asfksdkf', 0);

      $this->assertEquals(
        0,
        $post->userId
      );
    }


    /** @test **/
    public function it_can_persist_to_db() {
      $dbh = new DB();
      $user = $dbh->query("SELECT * FROM users ORDER BY id LIMIT 1", []);

      $post = new Post('Tweet', $user['id']);

      $res = $post->save();

      $this->assertEquals(
        true,
        $res
      );
    }
    // /** @test **/
    // public function userLaravelORM() {
    //   $dbh = new DB();
    //   $username = "Isak";
    //   $dbh->query("INSERT INTO users (name) VALUES (?)", [$username]);

    //   $userid = $dbh->connection->lastInsertId();
    //   $testpost = "Sträng text";

    //   $sql = "INSERT INTO posts (user_id, body) VALUES (? , ?)";
    //   $values = [$userid,$testpost];
    //   $dbh->query($sql, $values);

    //   $post = new Post($username, $testpost);

    //   $this->assertEquals(
    //     $post->user()['name'],
    //     $username
    //   );
    // }
}