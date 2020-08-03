<?php

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
     public function testSayHello()
     {
         $this->assertEquals('Hello', sayHello());
     }
}