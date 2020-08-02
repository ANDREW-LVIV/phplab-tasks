<?php

use PHPUnit\Framework\TestCase;

class FilterByStateTest extends TestCase {

    /**
     * @dataProvider airportsDataProvider
     */
    public function testFilterByState($input, $param, $expected) {
        $this->assertEquals($expected, filterByState($input, $param));
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
                "name" => "Hagerstown Regional Airport",
                "code" => "HGR",
                "city" => "Hagerstown",
                "state" => "Maryland",
                "address" => "18434 Showalter Rd, Hagerstown, MD 21742, USA",
                "timezone" => "America/New_York",
            ], 
            [
                // 4
                "name" => "Roswell International Air Center",
                "code" => "ROW",
                "city" => "Roswell",
                "state" => "New Mexico",
                "address" => "1 Jerry Smith Cir, Roswell, NM 88203, USA",
                "timezone" => "America/Denver",
            ]
        ];
        return [
            [
                $array,
                '',
                []
            ],
            [
                $array,
                'invalid_param',
                []
            ],
            [
                $array,
                'Georgia',
                [
                    $array[2]
                ]
            ],
            [
                $array,
                'New Mexico',
                [
                    $array[1],
                    $array[4]
                ]
            ]
        ];
    }

}
