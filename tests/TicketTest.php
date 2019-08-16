<?php

use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{

    /** @test **/
    public function it_should_return_the_correct_price_for_children()
    {
        $this->assertEquals(
            10,
            Ticket::ticketPrice(15)
        );
    }

    /** @test **/
    public function it_should_return_the_correct_price_for_adults()
    {
        $this->assertEquals(
            20,
            Ticket::ticketPrice(35)
        );        
    }

    /** @test **/
    // public function it_should_return_the_correct_price_for_seniors()
    // {
    //     // Your code
    // }
}