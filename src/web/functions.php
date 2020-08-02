<?php

define("SHOW_ON_PAGE", 5);

/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports): array {
    $arr = array();
    foreach ($airports as $value) {
        $arr[] = strtoupper($value['name'][0]);
    }
    $arr = array_unique($arr);
    sort($arr);

    return $arr;
}

/**
 * Safe filter for URL parameters 
 * @param  string $str
 * @return string
 */
function safe_var(string $str): string {
    return trim(stripslashes(htmlspecialchars($str)));
}

/**
 * Filter by Parameters
 * @param  array $input
 * @return array
 */
function filterByParam(array $input): array {
    if (isset($_GET['filter_by_first_letter'])) {
        $input = filterByFirstLetter($input, safe_var($_GET['filter_by_first_letter']));
    }
    if (isset($_GET['sort'])) {
        $input = sortByParam($input, safe_var($_GET['sort']));
    }
    if (isset($_GET['filter_by_state'])) {
        $input = filterByState($input, safe_var($_GET['filter_by_state']));
    }

    return $input;
}

/**
 * Filter by First Letter
 * @param  array  $input
 * @param  srting $letter
 * @return array
 */
function filterByFirstLetter(array $input, string $letter): array {
    return array_filter($input, function($a) use ($letter) {
        return strtolower($a['name'][0]) == strtolower($letter);
    });
}

/**
 * Sort by Parameters
 * @param  array  $input
 * @param  srting $param
 * @return array
 */
function sortByParam(array $input, string $param): array {
    $param = strtolower($param);
    usort($input, function($a, $b) use ($param) {
        return $a[$param] <=> $b[$param];
    });

    return $input;
}

/**
 * Filter by Parameters
 * @param  array  $input
 * @param  srting $param
 * @return array
 */
function filterByState(array $input, string $param): array {
    $param = strtolower($param);
    return array_filter($input, function($a) use ($param) {
        return strtolower($a['state']) == $param;
    });
}

/**
 * Items Limitation
 * @param  array   $input
 * @param  integer $page
 * @return array
 */
function limitItems(array $input, int $page): array {
    if (empty($input)) {
        return [];
    }
    $pages = (int) ceil(count($input) / SHOW_ON_PAGE);
    if ($page > $pages || $page <= 0) {
        $page = 1;
    }
    $block_of_items = array_chunk($input, SHOW_ON_PAGE);

    return $block_of_items[$page - 1];
}

/**
 * Pagination
 * @param  array   $input
 * @param  integer $page
 * @return string
 */
function pagination(array $input, int $page): string {
    $pages = (int) ceil(count($input) / SHOW_ON_PAGE);
    if ($page > $pages || $page <= 0) {
        $page = 1;
    }
    $asd = $page - 4;
    $asd2 = $page + 5;

    if ($page > 5) {
        $result .= '<li class="page-item"><a class="page-link" href="' . urlGenerator('page', 1) . '">1</a></li>';
    }
    if ($page > 6) {
        $result .= '<li class="page-item"><span class="page-link">...</span></li>';
    }
    for ($i = $asd; $i < $asd2; $i++) {
        if ($i <= $pages && $i > 0) {
            if ($i > $pages) {
                break;
            }
            if ($page == $i) {
                $result .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
            } else {
                $result .= '<li class="page-item"><a class="page-link" href="' . urlGenerator('page', $i) . '">' . $i . '</a></li>';
            }
        }
    }
    if ($page < $pages - 5) {
        $result .= '<li class="page-item"><span class="page-link">...</span></li>';
    }
    if ($asd2 <= $pages) {
        $result .= '<li class="page-item"><a class="page-link" href="' . urlGenerator('page', $pages) . '">' . $pages . '</a></li>';
    }

    return $result;
}

/**
 * Generates URL with  parameters
 * @param  srting $parameter
 * @param  srting $value
 * @return string
 */
function urlGenerator(string $parameter = '', string $value = ''): string {
    $page_0 = isset($_GET['page']) ? '&page=' . intval($_GET['page']) : '';
    $page = ($parameter == 'page') ? '&page=' . intval($value) : $page_0;

    $filter_by_first_letter_0 = isset($_GET['filter_by_first_letter']) ? '&filter_by_first_letter=' . safe_var($_GET['filter_by_first_letter']) : '';
    $filter_by_first_letter = ($parameter == 'filter_by_first_letter') ? '&filter_by_first_letter=' . safe_var($value) : $filter_by_first_letter_0;

    $sort_0 = isset($_GET['sort']) ? '&sort=' . safe_var($_GET['sort']) : '';
    $sort = ($parameter == 'sort') ? '&sort=' . safe_var($value) : $sort_0;

    $filter_by_state_0 = isset($_GET['filter_by_state']) ? '&filter_by_state=' . safe_var($_GET['filter_by_state']) : '';
    $filter_by_state = ($parameter == 'filter_by_state') ? '&filter_by_state=' . safe_var($value) : $filter_by_state_0;

    return '/?' . trim($page . $filter_by_first_letter . $sort . $filter_by_state, '&');
}
