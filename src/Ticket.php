<?php

class Ticket
{

    static function ticketPrice($age): int {
        if ($age < 18) {
            return 10;
        } else {
            return 20;
        }
    }

}