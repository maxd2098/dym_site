<?php

$yearAge = '';
$yearExperience = '';

function addYear($year, $property) {
    if (isset($_SESSION['email'])) {
        if (($_SESSION[$property] >= 10 && $_SESSION[$property] <= 19)) {
            $year = ' лет';
        } elseif (substr((string)$_SESSION[$property], -1) == 0) {
            $year = ' лет';
        } elseif (substr((string)$_SESSION[$property], -1) == 1) {
            $year = ' год';
        } elseif (substr((string)$_SESSION[$property], -1) >= 2 && substr((string)$_SESSION[$property], -1) <= 4) {
            $year = ' года';
        } elseif (substr((string)$_SESSION[$property], -1) >= 5 && substr((string)$_SESSION[$property], -1) <= 9) {
            $year = ' лет';
        }
    }
    return $year;
}

$yearAge = addYear($yearAge, 'age');
$yearExperience = addYear($yearExperience, 'experience');