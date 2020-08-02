<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
    * @dataProvider airportsDataProvider
    */
    public function testGetUniqueFirstLetters($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function airportsDataProvider()
    {
        return [
            [
                [
                    ['name' => 'Albuquerque Sunport International Airport'],
                    ['name' => 'Atlanta Hartsfield International Airport'],
                    ['name' => 'Austin Bergstrom International Airport'],
                    ['name' => 'Nashville Metropolitan Airport 1'],
                    ['name' => 'Boston Logan International Airport']
                ], 
                ['A', 'B', 'N']
            ],
            [[],[]]
        ];
    }
}