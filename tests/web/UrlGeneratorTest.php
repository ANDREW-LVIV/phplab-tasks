<?php

use PHPUnit\Framework\TestCase;

class UrlGeneratorTest extends TestCase {

    /**
     * @dataProvider dataProvider
     */
    public function testUrlGenerator($parameter, $value, $params, $expected) {
        $this->assertEquals($expected, urlGenerator($parameter, $value, $params));
    }

    public function dataProvider() {
        return [
            // param: page + empty value
            [
                '', '', [],
                '/?page=1'
            ],
            // param: page + value
            [
                'page', '1', [],
                '/?page=1'
            ],
            [
                'page', '2', [],
                '/?page=2'
            ],
            // param: filter_by_first_letter + empty value
            // param: sort + empty value
            // param: filter_by_state + empty value
            [
                'filter_by_first_letter', 'C', [],
                '/?page=1&filter_by_first_letter=C'
            ],
            [
                'sort', 'name', [],
                '/?page=1&sort=name'
            ],
            [
                'filter_by_state', 'Illinois', [],
                '/?page=1&filter_by_state=Illinois'
            ],
            // param: filter_by_first_letter + value
            [
                'page', '5', ['filter_by_first_letter' => 'B'],
                '/?page=5&filter_by_first_letter=B'
            ],
            [
                'sort', 'name', ['filter_by_first_letter' => 'B'],
                '/?page=1&filter_by_first_letter=B&sort=name'
            ],
            [
                'filter_by_state', 'Illinois', ['filter_by_first_letter' => 'B'],
                '/?page=1&filter_by_first_letter=B&filter_by_state=Illinois'
            ],
            // param: sort + value
            [
                'page', '5', ['sort' => 'name'],
                '/?page=5&sort=name'
            ],
            [
                'filter_by_first_letter', 'B', ['sort' => 'name'],
                '/?page=1&filter_by_first_letter=B&sort=name'
            ],
            [
                'filter_by_state', 'Illinois', ['sort' => 'name'],
                '/?page=1&sort=name&filter_by_state=Illinois'
            ],
            // param: filter_by_state + value
            [
                'page', '5', ['filter_by_state' => 'Illinois'],
                '/?page=5&filter_by_state=Illinois'
            ],
            [
                'filter_by_first_letter', 'B', ['filter_by_state' => 'Illinois'],
                '/?page=1&filter_by_first_letter=B&filter_by_state=Illinois'
            ],
            [
                'filter_by_first_letter', 'B', ['filter_by_state' => 'Illinois'],
                '/?page=1&filter_by_first_letter=B&filter_by_state=Illinois'
            ],
            // param: filter_by_first_letter/sort/filter_by_state + value
            [
                'page', '5', ['filter_by_first_letter' => 'B', 'sort' => 'name', 'filter_by_state' => 'Illinois'],
                '/?page=5&filter_by_first_letter=B&sort=name&filter_by_state=Illinois'
            ],
            [
                'filter_by_first_letter', 'B', ['sort' => 'name', 'filter_by_state' => 'Illinois'],
                '/?page=1&filter_by_first_letter=B&sort=name&filter_by_state=Illinois'
            ],
            [
                'sort', 'name', ['filter_by_first_letter' => 'B', 'filter_by_state' => 'Illinois'],
                '/?page=1&filter_by_first_letter=B&sort=name&filter_by_state=Illinois'
            ],
            [
                'filter_by_state', 'Illinois', ['filter_by_first_letter' => 'B', 'sort' => 'name'],
                '/?page=1&filter_by_first_letter=B&sort=name&filter_by_state=Illinois'
            ]
        ];
    }

}
