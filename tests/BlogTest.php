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
      $blog = new BlogPost('author', 'body');

      $this->assertEquals(
        ['author', 'body'],
        $blog->getPost()
      );
    }

}