<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
    * @dataProvider exceptionDataProvider
    */
    public function testSayHelloArgumentWrapper($input)
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper($input);
    }
    
    public function exceptionDataProvider()
    {
        return [
            [NULL],
            [[1,2,3]]
        ];
    }
}