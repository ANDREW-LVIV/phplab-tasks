<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider argumentDataProvider
     */
    public function testCountArguments($input, $expected)
    {
        $this->assertEquals($expected, countArguments(...$input));
    }

    public function argumentDataProvider()
    {
        return [
            [[null], ['argument_count' => 1, 'argument_values' => [null]]],
            [[], ['argument_count' => 0, 'argument_values' => []]],
            [['one'], ['argument_count' => 1, 'argument_values' => ['one']]],
            [['one', 'two', 'three'], ['argument_count' => 3, 'argument_values' => ['one', 'two', 'three']]]
        ];
    }
}
