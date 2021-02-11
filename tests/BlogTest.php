<?php

use PHPUnit\Framework\TestCase;

class BlogTest extends TestCase
{
    /** @test **/
    public function can_create() {

      $blog = new BlogPost();

      $this->assertInstanceOf(
        BlogPost::class,
        $blog
      );
    }

    /** @test **/
    public function it_should_have_a_body_property()
    {
      $blog = new BlogPost();
      $blog->body = 'hej';

      $this->assertEquals(
        'hej',
        $blog->body
      );
    }

    /** @test **/
    public function it_should_have_a_author_property()
    {
      $blog = new BlogPost();
      $blog->author = 'Jens';

      $this->assertEquals(
        'Jens',
        $blog->author
      );
    }

    /** @test **/
    public function ItShouldBeAbleToCreateAPost()
    {
      $blog = new BlogPost('Jens', 'Tweet');

      $this->assertEquals(
        [0, 'Jens', 'Tweet'],
        $blog->getPost()
      );
    }

    /** @test **/
    public function userLaravelORM() {
      $dbh = new DB();

      $username = "Isak";
      $dbh->query("INSERT INTO users (name) VALUES (?)", [$username]);

      $userid = $dbh->connection->lastInsertId();
      $testpost = "Sträng text";

      $sql = "INSERT INTO posts (user_id, body) VALUES (? , ?)";
      $values = [$userid,$testpost];
      $dbh->query($sql, $values);

      $blog = new BlogPost($username, $testpost, $userid);

      $this->assertEquals(
        $blog->user()['name'],
        $username
      );
    }
}