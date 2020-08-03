<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider helloDataProvider
     */
    public function testSayHelloArgument($expected, $input)
    {
        $this->assertEquals('Hello ' . $expected, sayHelloArgument($input));
    }

    public function helloDataProvider()
    {
        return [
            ['Andrew', 'Andrew'],
            [0, 0],
            [5, 5],
            [false, false],
            [true, true]
        ];
    }
}
