<?php

use PHPUnit\Framework\TestCase;

class SortByParamTest extends TestCase {

    /**
     * @dataProvider airportsDataProvider
     */
    public function testSortByParam($input, $param, $expected) {
        $this->assertEquals($expected, sortByParam($input, $param));
    }

    public function airportsDataProvider() {
        $array = [
            [
                // 0
                "name" => "Baltimore Washington Airport",
                "code" => "BWI",
                "city" => "Baltimore",
                "state" => "Maryland",
                "address" => "Baltimore, MD 21240, USA",
                "timezone" => "America/New_York",
            ],
            [
                // 1
                "name" => "Albuquerque Sunport International Airport",
                "code" => "ABQ",
                "city" => "Albuquerque",
                "state" => "New Mexico",
                "address" => "2200 Sunport Blvd, Albuquerque, NM 87106, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                // 2
                "name" => "Atlanta Hartsfield International Airport",
                "code" => "ATL",
                "city" => "Atlanta",
                "state" => "Georgia",
                "address" => "6000 N Terminal Pkwy, Atlanta, GA 30320, USA",
                "timezone" => "America/New_York",
            ],
            [
                // 3
                "name" => "Austin Bergstrom International Airport",
                "code" => "AUS",
                "city" => "Austin",
                "state" => "Texas",
                "address" => "3600 Presidential Blvd, Austin, TX 78719, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                // 4
                "name" => "Nashville Metropolitan Airport 1",
                "code" => "BNA",
                "city" => "Nashville",
                "state" => "Tennessee",
                "address" => "1 Terminal Dr, Nashville, TN 37214, USA",
                "timezone" => "America/Chicago",
            ],
            [
                // 5
                "name" => "Boise Airport",
                "code" => "BOI",
                "city" => "Boise",
                "state" => "Idaho",
                "address" => "3201 W Airport Way #1000, Boise, ID 83705, USA",
                "timezone" => "America/Denver",
            ],
            [
                // 6
                "name" => "Hollywood Burbank Airport",
                "code" => "BUR",
                "city" => "Burbank",
                "state" => "California",
                "address" => "2627 N Hollywood Way, Burbank, CA 91505, USA",
                "timezone" => "America/Los_Angeles",
            ]
        ];
        return [
            [
                $array,
                '',
                [
                    $array[0],
                    $array[1],
                    $array[2],
                    $array[3],
                    $array[4],
                    $array[5],
                    $array[6]
                ]
            ],
            [
                $array,
                'invalid_param',
                [
                    $array[0],
                    $array[1],
                    $array[2],
                    $array[3],
                    $array[4],
                    $array[5],
                    $array[6]
                ]
            ],
            [
                $array,
                'name',
                [
                    $array[1],
                    $array[2],
                    $array[3],
                    $array[0],
                    $array[5],
                    $array[6],
                    $array[4]
                   
                ]
            ],
            [
                $array,
                'code',
                [
                    $array[1],
                    $array[2],
                    $array[3],
                    $array[4],
                    $array[5],
                    $array[6],
                    $array[0]
                ]
            ],
            [
                $array,
                'city',
                [
                    $array[1],
                    $array[2],
                    $array[3],
                    $array[0],
                    $array[5],
                    $array[6],
                    $array[4]
                ]
            ],
            [
                $array,
                'state',
                [
                    $array[6],
                    $array[2],
                    $array[5],
                    $array[0],
                    $array[1],
                    $array[4],
                    $array[3]
                ]
            ],
            [
                $array,
                'STAte',
                [
                    $array[6],
                    $array[2],
                    $array[5],
                    $array[0],
                    $array[1],
                    $array[4],
                    $array[3]
                ]
            ]
        ];
    }

}
