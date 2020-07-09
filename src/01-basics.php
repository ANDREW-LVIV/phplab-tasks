<?php

/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute) {
    if ($minute > 0 && $minute <= 15) {
        $result = 'first';
    } elseif ($minute > 15 && $minute <= 30) {
        $result = 'second';
    } elseif ($minute > 30 && $minute <= 45) {
        $result = 'third';
    } elseif ($minute > 45 && $minute <= 60 || $minute == 0) {
        $result = 'fourth';
    } else {
        throw new InvalidArgumentException('The minute is negative or greater than 60');
    }
    return $result;
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year) {
    if ($year < 1900) {
        throw new InvalidArgumentException('The year is less than 1900');
    }
    $leap = date('L', mktime(0, 0, 0, 1, 1, $year));
    $result = $leap ? true : false;
    return $result;
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input) {
    $str_length = strlen($input);
    if ($str_length > 6) {
        throw new InvalidArgumentException('Input contains more than 6 digits');
    }
    $a = 0;
    $b = 0;
    for ($i = 0; $i < $str_length; $i++) {
        if ($i < $str_length / 2) {
            $a += (int) $input[$i];
        } else {
            $b += (int) $input[$i];
        }
    }
    return $a == $b;
}
