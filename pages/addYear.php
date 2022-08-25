<?php

$yearAgeProfile = '';
$yearExperienceProfile = '';

function addYearProfile($year, $property) {
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

function addYearAll($person, $property) {
    $year = '';
    if (($person[$property] >= 10 && $person[$property] <= 19)) {
        $year = ' лет';
    } elseif (substr((string)$person[$property], -1) == 0) {
        $year = ' лет';
    } elseif (substr((string)$person[$property], -1) == 1) {
        $year = ' год';
    } elseif (substr((string)$person[$property], -1) >= 2 && substr((string)$person[$property], -1) <= 4) {
        $year = ' года';
    } elseif (substr((string)$person[$property], -1) >= 5 && substr((string)$person[$property], -1) <= 9) {
        $year = ' лет';
    }
    return $year;
}

$yearAgeProfile = addYearProfile($yearAgeProfile, 'age');
$yearExperienceProfile = addYearProfile($yearExperienceProfile, 'experience');
















