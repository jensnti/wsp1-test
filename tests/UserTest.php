<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test **/
    public function it_should_create_a_user() {

      $user = new User('Jens');

      $this->assertInstanceOf(
        User::class,
        $user
      );
    }

    /** @test **/
    public function it_can_persist_to_db() {
      $user = new User('Jens');

      $res = $user->save();
      
      $this->assertEquals(
        true,
        $res
      );
    }
  }