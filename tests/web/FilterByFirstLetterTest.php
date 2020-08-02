<?php

use PHPUnit\Framework\TestCase;

class FilterByFirstLetterTest extends TestCase {

    /**
     * @dataProvider airportsDataProvider
     */
    public function testFilterByFirstLetter($input, $letter, $expected) {
        $this->assertEquals($expected, filterByFirstLetter($input, $letter));
    }

    public function airportsDataProvider() {
        $array = [
            ['name' => 'Albuquerque Sunport International Airport'],
            ['name' => 'Atlanta Hartsfield International Airport'],
            ['name' => 'Austin Bergstrom International Airport'],
            ['name' => 'Nashville Metropolitan Airport 1'],
            ['name' => 'Boston Logan International Airport']
        ];
        return [
            [
                $array,
                'A',
                [
                    ['name' => 'Albuquerque Sunport International Airport'],
                    ['name' => 'Atlanta Hartsfield International Airport'],
                    ['name' => 'Austin Bergstrom International Airport']
                ]
            ],
            [
                $array,
                'B',
                [
                    ['name' => 'Boston Logan International Airport']
                ]
            ],
            [
                $array,
                'n',
                [
                    ['name' => 'Nashville Metropolitan Airport 1']
                ]
            ],
            [
                $array,
                'AA',
                [
                    ['name' => 'Albuquerque Sunport International Airport'],
                    ['name' => 'Atlanta Hartsfield International Airport'],
                    ['name' => 'Austin Bergstrom International Airport']
                ]
            ],
            [
                $array,
                '',
                []
            ]
        ];
    }

}
