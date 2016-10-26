<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Parser;

class ParseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckPhone()
    {
        $this->assertEquals('44332213531',Parser::checkPhoneNumber('4433221'));// 7 digits
        $this->assertEquals('35317654321',Parser::checkPhoneNumber('017654321'));// start by 0
        $this->assertEquals('15552223344',Parser::checkPhoneNumber('0015552223344'));// start by 00
        $this->assertEquals('35317654321',Parser::checkPhoneNumber('017654321'));// <= 9 digits start != 0
    }
}
