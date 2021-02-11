<?php

use PHPUnit\Framework\TestCase;

class BlogControllerTest extends TestCase
{
    /** @test **/
    public function can_create_a_new_blog_post()
    {
      BlogController::create(
        [1, 'Hej Jonatan']
      );
    }
  }