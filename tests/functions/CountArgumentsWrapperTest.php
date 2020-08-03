<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
    * @dataProvider exceptionDataProvider
    */
    public function testCountArgumentsWrapper($input)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input);
    }
    
    public function exceptionDataProvider()
    {
        return [
            [NULL],
            [111],
            [true],
            [false],
            [[1, 2, 3]]
        ];
    }
}