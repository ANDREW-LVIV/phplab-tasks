<?php

use PHPUnit\Framework\TestCase;

class UrlGeneratorTest extends TestCase {

    /**
     * @dataProvider dataProvider
     * @dataProvider dataProvider2 
     */
    public function testUrlGenerator($parameter, $value, $expected) {
        $this->assertEquals($expected, urlGenerator($parameter, $value));
    }

    public function dataProvider() {
        return [
            ['', '', '/?page=1'],
            ['page', '1', '/?page=1'],
            ['page', '2', '/?page=2'],
            ['filter_by_first_letter', 'C', '/?page=1&filter_by_first_letter=C'],
            ['sort', 'name', '/?page=1&sort=name'],
            ['filter_by_state', 'Illinois', '/?page=1&filter_by_state=Illinois']
        ];
    }

    public function dataProvider2() {
        // $_GET['filter_by_first_letter'] = 'B';
        // return [
        //     ['page', '5', '/?page=5&filter_by_first_letter=B'],
        //     ['sort', 'name', '/?page=1&filter_by_first_letter=B&sort=name'],
        //     ['filter_by_state', 'Illinois', '/?page=1&filter_by_first_letter=B&filter_by_state=Illinois']
        // ];
    }

}
