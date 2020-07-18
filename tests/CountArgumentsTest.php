<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider argumentDataProvider
     */
    public function testCountArguments($expected, $input)
    {
        $this->assertEquals($expected, countArguments(...$input));
    }

    public function argumentDataProvider()
    {
        return [
            [['argument_count' => 1, 'argument_values' => [null]], [null]],
            [['argument_count' => 0, 'argument_values' => []], []],
            [['argument_count' => 1, 'argument_values' => ['one']], ['one']],
            [['argument_count' => 3, 'argument_values' => ['one', 'two', 'three']], ['one', 'two', 'three']]
        ];
    }
}
